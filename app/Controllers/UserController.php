<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\RatingModel;
use App\Models\ReceiverModel;
use App\Models\LoanModel;

class UserController extends BaseController
{
    public function signUp()
    {
        $firstName = $this->request->getPost('FirstName');
        $lastName = $this->request->getPost('LastName');
        $email = $this->request->getPost('Email');
        $password = $this->request->getPost('Password');
        $confirmPassword = $this->request->getPost('ConfirmPassword');
        $gender = $this->request->getPost('Gender');
        $physicalAddress = $this->request->getPost('PhysicalAddress');
        $profession = $this->request->getPost('Profession');
        $cardNumber = hash('md5', $firstName . $lastName . $email . $password);

        if ($password == $confirmPassword) {
            $password = hash('md5', $password);
            $data = [
                'FirstName' => $firstName,
                'LastName' => $lastName,
                'Email' => $email,
                'Password' => $password,
                'Gender' => $gender,
                'PhysicalAddress' => $physicalAddress,
                'Profession' => $profession,
                'Amount' => 0,
                'CardNumber' => $cardNumber,
            ];
            $userModel = new UserModel();
            $userModel->insertUser($data);
            echo "<script> alert('User Successfully Registered !'); </script>";
            echo view('General/SignUpPage');
        } else {
            echo "<script> alert('Passwords do not match'); </script>";
            echo view('General/SignUpPage');
        }
    }

    public function signIn(){
        $email = $this->request->getPost('Email');
        $password = $this->request->getPost('Password');
        $userModel = new UserModel();
        $transactionModel = new TransactionModel();
        $notificationModel = new NotificationModel();
        $loanModel=new LoanModel();

        if ($email == 'admin@gmail.com' && $password == 'admin') {
            echo "<script> alert('Successful login !'); </script>";
            $users = $userModel->getAllUsers();
            $transactions = $transactionModel->getAllTransactions();
            $loans=$loanModel->getAllLoans();
            session()->set('loans', $loans);
            session()->set('users', $users);
            session()->set('transactions', $transactions);
            session()->set('userId', 0);
            return redirect()->to(base_url('admin_HomePage'));
        } else {
            $password = hash('md5', $password);
            $user = $userModel->getUserWhere(['Email' => $email, 'Password' => $password]);
            if ($user != 'No-User') {
                $userId = $user['UserId'];
                $amount = $user['Amount'];
                $userName = $user['FirstName'] . ' ' . $user['LastName'];
                $cardNumber = $user['CardNumber'];
                $loanAmount=$user['LoanAmount'];
                session()->set('userId', $userId);
                session()->set('userName', $userName);
                session()->set('amount', $amount);
                session()->set('cardNumber', $cardNumber);
                session()->set('loanAmount', $loanAmount);
                $notifications = $notificationModel->getNotificationsWhere(['UserId' => $userId]);
                $transactions=$transactionModel->getAllTransactionsWhere(['UserId'=>$userId]);
                $numberUserWithdrawals = $transactionModel->getAllTransactionsWhere(['UserId' => session()->get('userId'), 'Type' => 'Withdraw']);
                $numberUserDeposits = $transactionModel->getAllTransactionsWhere(['UserId' => session()->get('userId'), 'Type' => 'Deposit']);
                $avgDeposit = $transactionModel->getAverageDeposit(session()->get('userId'));
                $avgWithdrawal = $transactionModel->getAverageWithdrawal(session()->get('userId'));
                $loans=$loanModel->getLoansWhere(['UserId'=>$userId]);

                session()->set('notifications', $notifications);
                session()->set('numberUserWithdrawals', count($numberUserWithdrawals));
                session()->set('numberUserDeposits', count($numberUserDeposits));
                session()->set('averageUserDeposit', $avgDeposit);
                session()->set('averageUserWithdrawal', $avgWithdrawal);
                session()->set('transactions', $transactions);
                session()->set('loans', $loans);

                echo "<script> alert('User Successfully Signed In !'); </script>";
                return redirect()->route('user_HomePage');
            } else {
                echo "<script> alert('Invalid Email or Password'); </script>";
                echo view('General/SignInPage');
            }
        }
    }

    public function showHomePage(){
        echo view('User/HomePage');
    }

    public function showDepWithPage(){
        echo view('User/DepWithPage');
    }

    public function depositOrWithdraw(){
        $transactionModel = new TransactionModel();
        $userModel = new UserModel();
        $notificationModel = new NotificationModel();

        $amount = $this->request->getPost('Amount');
        $type = $this->request->getPost('Type');
        $wantToPayLoan=$this->request->getPost('WantToPayLoan');

        $userId = session()->get('userId');
        $userName = session()->get('userName');

        $data = [
            'UserId' => $userId,
            'Amount' => $amount,
            'Type' => $type,
            'Status' => 'Pending',
        ];
        if ($type == 'Deposit') {
            if($wantToPayLoan=='Yes'){
                $data=[
                    'UserId'=>$userId,
                    'Amount'=>$amount,
                    'Type'=>'LoanPayment',
                    'Status'=>'Pending',
                ];
                $transactionModel->insertTransaction($data);
                session()->set('transactions', $transactionModel->getAllTransactionsWhere(['UserId'=>$userId]));
                echo "<script> alert('Loan successfully paid ! This transaction may take time to reflect into your account !'); </script>";
            }
            else{
                $transactionModel->insertTransaction($data);
                session()->set('transactions', $transactionModel->getAllTransactionsWhere(['UserId'=>$userId]));
                echo "<script> alert('$amount successfully deposited to $userName\'s account. This transaction may take time to reflect into your account !'); </script>";
            }
        } else if ($type == 'Withdraw') {
            $user = $userModel->getUserWhere(['UserId' => $userId]);
            if ($user['Amount'] >= $amount) {
                $transactionModel->insertTransaction($data);
                session()->set('transactions', $transactionModel->getAllTransactionsWhere(['UserId'=>$userId]));
                echo "<script> alert('$amount successfully withdrawn from $userName\'s account. This transaction may take time to reflect into your account !'); </script>";
            } else {
                $notificationModel->insertNotification(['UserId' => $userId, 'Message' => 'Your withdrawal of $' . $amount . ' failed !', 'Status' => 'Failure']);
                echo "<script> alert('You cannot witthdraw that amount. Insufficient balance !'); </script>";
            }
        } else {
            echo "<script> alert('Invalid Type'); </script>";
        }
        echo view('User/DepWithPage');
    }

    public function showTransHistoryPage(){
        echo view('User/TransHistoryPage');
    }

    public function showLoansPage(){
        echo view('User/LoansPage');
    }

    public function sendMoney(){
        $userModel = new UserModel();
        $transactionModel = new TransactionModel();
        $currentUser = $userModel->getUserWhere(['UserId' => session()->get('userId')]);
        $userId = $currentUser['UserId'];
        $amount = $this->request->getPost('Amount');
        $cardNumber = $this->request->getPost('CardNumber');
        $receiverUser = $userModel->getUserWhere(['CardNumber' => $cardNumber]);
        if ($currentUser['Amount'] < $amount) {
            echo '<script> alert("You cannot send that amount ! Insufficient balance !"); </script>';
            echo view('User/DepWithPage');
        } else {
            $userModel->updateUser(['UserId' => $userId], ['Amount' => $currentUser['Amount'] - $amount]);
            $userModel->updateUser(['CardNumber' => $cardNumber], ['Amount' => $receiverUser['Amount'] + $amount]);
            $transactionModel->insertTransaction(['UserId' => $userId, 'Amount' => $amount, 'Type' => 'Transfer', 'Status' => 'Sent', 'ToId' => $receiverUser['UserId']]);
            echo '<script> Amount successfully transfered! </script>';
            $currentUser = $userModel->getUserWhere(['UserId' => session()->get('userId')]);
            session()->set('amount', $currentUser['Amount']);
            $transactions=$transactionModel->getAllTransactionsWhere(['UserId'=>$userId]);
            session()->set('transactions', $transactions);
            echo view('User/DepWithPage');
        }
    }

    public function reverseTransfer(){
        $transferId=$this->request->getPost('TransferId');
        $transactionModel=new TransactionModel();
        $transaction=$transactionModel->getAllTransactionsWhere(['Id'=>$transferId])[0];
        $transactionModel->updateTransaction(['Id'=>$transferId], ['Status'=>'Pending']);
        $transactions=$transactionModel->getAllTransactionsWhere(['UserId'=>session()->get('userId')]);
        session()->set('transactions', $transactions);
        echo view('User/DepWithPage');
    }

    public function logout(){
        $rating = $this->request->getPost('rating');
        $ratingModel = new RatingModel();
        $data = [
            'UserId' => session()->get('userId'),
            'Rating' => $rating,
        ];
        $ratingModel->insertRating($data);
        session()->destroy();
        echo "<script> alert('User Successfully Logged Out !'); </script>";
        echo view('General/WelcomePage');
    }

    public function takeLoan(){
        $loanModel=new LoanModel();
        $amount=$this->request->getPost('Amount');
        $userId=session()->get('userId');
        $data=[
            'UserId'=>$userId,
            'Amount'=>$amount,
            'Status'=>'Pending',
        ];
        $loanModel->insertLoan($data);
        echo '<script> alert("Successful operation ! "); </script>';
        session()->set('loans', $loanModel->getLoansWhere(['UserId'=>$userId]));
        return view('User/DepWithPage');
    }

}