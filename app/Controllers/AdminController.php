<?php

namespace App\Controllers;

use App\Models\LoanModel;
use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\NotificationModel;

class AdminController extends BaseController
{

    public function showHomePage()
    {
        return view('Admin/HomePage');
    }

    public function showTransactionsPage()
    {
        return view('Admin/ViewTransactionsPage');
    }

    public function showLoansPage()
    {
        return view('Admin/ViewLoansPage');
    }

    public function editTransaction()
    {
        $userModel = new UserModel();
        $notificationModel = new NotificationModel();
        $transactionModel = new TransactionModel();

        $userId = $this->request->getPost('UserId');
        $type = $this->request->getPost('Type');
        $amount = $this->request->getPost('Amount');
        $currentStatus = $this->request->getPost('CurrentStatus');
        $newStatus = $this->request->getPost('NewStatus');
        $transId = $this->request->getPost('TransId');

        if ($currentStatus != 'Pending') {
            echo "<script> This transaction cannot be edited ! </script>";
            session()->set('users', $userModel->getAllUsers());
            session()->set('transactions', $transactionModel->getAllTransactions());
            return view('Admin/ViewTransactionsPage');
        } else {
            if ($newStatus == 'Successful') {
                if ($type == 'Deposit') {
                    $currentAmount = $userModel->getUserWhere(['UserId' => $userId])['Amount'];
                    $newAmount = $amount + $currentAmount;
                    $userModel->updateUser(['UserId' => $userId], ['Amount' => $newAmount]);
                    $notificationModel->insertNotification(['UserId' => $userId, 'Message' => 'Your deposit of $' . $amount . ' was successful !', 'Status' => 'Success']);
                    $transactionModel->updateTransaction(['Id' => $transId], ['Status' => 'Successful']);
                    session()->set('users', $userModel->getAllUsers());
                    session()->set('transactions', $transactionModel->getAllTransactions());
                    return view('Admin/ViewTransactionsPage');
                } else if ($type == 'Withdraw') {
                    $currentAmount = $userModel->getUserWhere(['UserId' => $userId])['Amount'];
                    $newAmount = $currentAmount - $amount;
                    if ($currentAmount < $amount) {
                        $notificationModel->insertNotification(['UserId' => $userId, 'Message' => 'The amount could not be withdrawn due to an insufficient balance', 'Status' => 'Failure']);
                        $transactionModel->updateTransaction(['Id' => $transId], ['Status' => 'Failed']);
                        session()->set('users', $userModel->getAllUsers());
                        session()->set('transactions', $transactionModel->getAllTransactions());
                        return view('Admin/ViewTransactionsPage');
                    } else {
                        $userModel->updateUser(['UserId' => $userId], ['Amount' => $newAmount]);
                        $notificationModel->insertNotification(['UserId' => $userId, 'Message' => 'Your withdrawal of $' . $amount . ' was successful !', 'Status' => 'Success']);
                        $transactionModel->updateTransaction(['Id' => $transId], ['Status' => 'Successful']);
                        session()->set('users', $userModel->getAllUsers());
                        session()->set('transactions', $transactionModel->getAllTransactions());
                        return view('Admin/ViewTransactionsPage');
                    }
                } else if ($type == 'LoanPayment') {
                    $user = $userModel->getUserWhere(['UserId' => $userId]);
                    if ($amount >= $user['LoanAmount']) {
                        $transactionModel->updateTransaction(['Id' => $transId], ['Status' => 'Successful']);
                        $depositAmount = $amount - $user['LoanAmount'];
                        $userModel->updateUser(['UserId' => $userId], ['LoanAmount' => 0]);
                        $userModel->updateUser(['UserId' => $userId], ['Amount' => $user['Amount'] + $depositAmount]);
                        session()->set('amount', $userModel->getUserWhere(['UserId' => $userId])['Amount']);
                        session()->set('loanAmount', $userModel->getUserWhere(['UserId' => $userId])['LoanAmount']);
                        session()->set('users', $userModel->getAllUsers());
                        session()->set('transactions', $transactionModel->getAllTransactions());
                        return view('Admin/ViewTransactionsPage');
                    } else {
                        $transactionModel->updateTransaction(['Id' => $transId], ['Status' => 'Successful']);
                        $userModel->updateUser(['UserId' => $userId], ['LoanAmount' => $user['LoanAmount'] - $amount]);
                        session()->set('loanAmount', $userModel->getUserWhere(['UserId' => $userId])['LoanAmount']);
                        session()->set('users', $userModel->getAllUsers());
                        session()->set('transactions', $transactionModel->getAllTransactions());
                        return view('Admin/ViewTransactionsPage');
                    }
                }
            } else if ($newStatus == 'Failed') {
                $notificationModel->insertNotification(['UserId' => $userId, 'Message' => 'Your transaction failed ! Please try again...', 'Status' => 'Failure']);
                $transactionModel->updateTransaction(['Id' => $transId], ['Status' => 'Failed']);
                session()->set('users', $userModel->getAllUsers());
                session()->set('transactions', $transactionModel->getAllTransactions());
                return view('Admin/ViewTransactionsPage');
            } else if ($newStatus == 'Pending') {
                session()->set('users', $userModel->getAllUsers());
                session()->set('transactions', $transactionModel->getAllTransactions());
                return view('Admin/ViewTransactionsPage');
            }
        }
    }

    public function editUser()
    {
        $userModel = new UserModel();
        $userId = $this->request->getPost('UserId');
        $firstName = $this->request->getPost('FirstName');
        $lastName = $this->request->getPost('LastName');
        $physicalAddress = $this->request->getPost('PhysicalAddress');
        $profession = $this->request->getPost('Profession');
        $conditions = ['UserId' => $userId];
        $data = [
            'FirstName' => $firstName,
            'LastName' => $lastName,
            'PhysicalAddress' => $physicalAddress,
            'Profession' => $profession,
        ];
        $userModel->updateUser($conditions, $data);
        $users = $userModel->getAllUsers();
        session()->set('users', $users);
        return view('Admin/HomePage');
    }

    public function deleteUser()
    {
        $userModel = new UserModel();
        $userId = $this->request->getPost('UserId');
        $userModel->deleteUser(['UserId' => $userId]);
        $users = $userModel->getAllUsers();
        session()->set('users', $users);
        return view('Admin/HomePage');
    }

    public function reverseTransfer()
    {
        $transferId = $this->request->getPost('TransferId');
        $fromId = $this->request->getPost('FromId');
        $toId = $this->request->getPost('ToId');
        $amount = $this->request->getPost('Amount');
        $newStatus = $this->request->getPost('NewStatus');

        $userModel = new UserModel();
        $transactionModel = new TransactionModel();

        $receiverUser = $userModel->getUserWhere(['UserId' => $toId]);
        $fromUser = $userModel->getUserWhere(['UserId' => $fromId]);
        $userId = $fromUser['UserId'];

        if ($newStatus == 'Reversed') {
            $userModel->updateUser(['UserId' => $userId], ['Amount' => $fromUser['Amount'] + $amount]);
            $userModel->updateUser(['UserId' => $receiverUser['UserId']], ['Amount' => $receiverUser['Amount'] - $amount]);
            $transactionModel->updateTransaction(['Id' => $transferId], ['Status' => 'Reversed']);
            $transactions = $transactionModel->getAllTransactions();
            $users = $userModel->getAllUsers();
            session()->set('users', $users);
            session()->set('transactions', $transactions);
        } else {
            $transactionModel->updateTransaction(['Id' => $transferId], ['Status' => 'Failed']);
            $transactions = $transactionModel->getAllTransactions();
            $users = $userModel->getAllUsers();
            session()->set('users', $users);
            session()->set('transactions', $transactions);
        }
        session()->set('amount', $fromUser['Amount']);
        echo view('Admin/ViewTransactionsPage');
    }

    public function editLoan()
    {
        $userModel = new UserModel();
        $loanModel = new LoanModel();

        $newStatus = $this->request->getPost('NewStatus');
        $amount = $this->request->getPost('Amount');
        $userId = $this->request->getPost('UserId');
        $loanId = $this->request->getPost('loanId');

        if ($newStatus == 'Approved') {
            $loanModel->updateLoan(['Id' => $loanId], ['Status' => 'Approved']);
            $user = $userModel->getUserWhere(['UserId' => $userId]);
            $userModel->updateUser(['UserId' => $userId], ['LoanAmount' => $user['LoanAmount'] + $amount]);
            $userModel->updateUser(['UserId' => $userId], ['Amount' => $user['Amount'] + $amount]);
            $users = $userModel->getAllUsers();
            $loans = $loanModel->getAllLoans();
            session()->set('loans', $loans);
            session()->set('users', $users);
            echo view('Admin/ViewLoansPage');
        } else {
            $loanModel->updateLoan(['Id' => $loanId], ['Status' => 'Disapproved']);
            $users = $userModel->getAllUsers();
            $loans = $loanModel->getAllLoans();
            session()->set('loans', $loans);
            session()->set('users', $users);
            echo view('Admin/ViewLoansPage');
        }
    }
}
