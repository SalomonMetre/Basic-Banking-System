<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/User/DepWithPage.css">
    <title>Sign up</title>
</head>

<body>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <div class="container-fluid">
        <div class="row">
            <div class="logo-container">
                <div class="co-op-logo mr-2 ml-2"></div>
                <span class="logo"><strong>CO-OPERATIVE BANK</strong></span>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-3 left-content" style="text-align: center; border-top-right-radius: 5%; margin-top:7%; display:block;">
                <div class="row">
                    <div class="col-md-2"> <i class="bi bi-house"></i> </div>
                    <div class="col-md-10"> <a href="<?= base_url("user_HomePage/") ?>" style="text-decoration: none; color:white;"> Home </a> </div>
                </div>
                <div class="row">
                    <div class="col-md-2"> <i class="bi bi-wallet2"></i> </div>
                    <div class="col-md-10"> <a href="<?= base_url("user_DepWithPage/") ?>" style="text-decoration: none; color:white;">Deposits and Withdawals </a> </div>
                </div>
                <div class="row" style="background-color:#0B6C4D;border-radius:5%;">
                    <div class="col-md-2"> <i class="bi bi-clock-history"></i> </div>
                    <div class="col-md-10"> <a href="<?= base_url("user_TransHistoryPage/") ?>" style="text-decoration: none; color:white;"> Transactions History </a> </div>
                </div>
                <div class="row">
                    <div class="col-md-2"> <i class="bi bi-arrow-counterclockwise"></i> </div>
                    <div class="col-md-10"> <a href="<?= base_url("user_LoansPage/") ?>" style="text-decoration: none; color:white;"> Loans </a> </div>
                </div>
                <div class="row">
                    <div class="col-md-2"> <i class="bi bi-box-arrow-right"></i> </div>
                    <div class="col-md-10">
                        <button type="button" class="" data-bs-toggle="modal" data-bs-target="#modelId" style="text-decoration: none; background-color:#021C03; border:none; color:white;">
                            Log out
                        </button>
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" style="color:black;"> Would you like to rate us?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form method="POST" action="<?= base_url("user_logout/") ?>">
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input type="range" class="form-control" id="rating" name="rating" min="1" max="5" style="color:white;">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-primary">Rate Us</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 right-content" style="display: inline;">
                <div class="row" style="padding: 3%;"> <span style="text-align: right; font-size:24px; color: #021C03;">☀️ Welcome, <em> <?= session()->get('userName') ?> </em></span>
                </div>
                <div class="row" style="margin:0%; background-color:white;">
                    <button class="btn btn-primary" disabled style="padding:1%;"> Your Transactions </button>
                    <table class="table table-dark display" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" style="color:yellow;">Transaction Id</th>
                                <th scope="col"> User Id</th>
                                <th scope="col"> Type</th>
                                <th scope="col"> Date</th>
                                <th scope="col"> Amount</th>
                                <th scope="col"> Status</th>
                            </tr>
                        </thead>
                        <tbody style="overflow-y: scroll;">
                            <?php
                            $transactions = session()->get('transactions');
                            foreach ($transactions as $transaction) {
                            ?>
                                <tr>
                                    <td style="color:yellow;"> <?= $transaction['Id'] ?> </td>
                                    <td> <?= $transaction['UserId'] ?> </td>
                                    <td> <?= $transaction['Type'] ?> </td>
                                    <td> <?= $transaction['Date'] ?> </td>
                                    <td> <?= $transaction['Amount'] ?> </td>
                                    <td> <?= $transaction['Status'] ?> </td>
                                    <?php
                                        if($transaction['Type']=='Transfer' && $transaction['Status']=='Sent'){
                                    ?>
                                    <td>
                                        <form method="POST" action="user_reverseTransfer/">
                                            <input type="text" name="TransferId" value="<?= $transaction['Id'] ?>" hidden>
                                            <input type="text" name="Status" value="<?= $transaction['Status'] ?>" hidden>
                                            <button class="btn btn-success" type="submit"> Reverse </button>
                                        </form>
                                    </td>
                                    <?php
                                        }
                                    ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>