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
                <div class="row" style="background-color:#0B6C4D;border-radius:5%;">
                    <div class="col-md-2"> <i class="bi bi-wallet2"></i> </div>
                    <div class="col-md-10"> <a href="<?= base_url("user_DepWithPage/") ?>" style="text-decoration: none; color:white;">Deposits and Withdawals </a> </div>
                </div>
                <div class="row">
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
                                    <form action="<?= base_url("user_logout/") ?>" method="POST">
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input type="range" class="form-control" id="rating" name="rating" min="1" max="5" style="color:white;">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-success">Rate Us</button>
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
                <div class="row">
                    <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#depWithId" style="width:80%; margin-left:10%; background-color:#124B44;">
                        Deposit or Widthdraw Money
                    </button>
                    <div class="modal fade" id="depWithId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"> Deposit -- Withdaw </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?= base_url("user_DepWith/") ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" name="Amount" id="Label" placeholder="Enter amount to deposit or withdraw" required>
                                            <label for="floatingLabel" id="Amount"> Amount </label>
                                        </div>
                                        <select name="Type" id="select">
                                            <option value=""> -- Select Transaction Type --</option>
                                            <option value="Deposit">Deposit</option>
                                            <option value="Withdraw">Withdraw</option>
                                        </select>
                                        <select name="WantToPayLoan" id="selectLoan" style="width: 100%;padding:5%;margin-top:-1.5%;margin-bottom:1%;">
                                            <option value=""> Do you want to pay your loans ? </option>
                                            <option value="Yes"> Yes </option>
                                            <option value="No"> No </option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="depWithButton"> Go </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="width:86%; margin-left:7%; margin-top:2%;">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5> Transfer Money</h5>
                            </div>
                            <img class="card-img-top" src="/Images/General/Deposit1.png" alt="Title" height="250em;">
                            <div class="card-body">
                                <h4 class="card-title"> Do you want to send money to another account?</h4>
                                <p class="card-text"> We got you covered, simply click on the button below...</p>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#sendMoneyId" style="background-color: #124B44;">
                                    Send Money
                                </button>
                                <div class="modal fade" id="sendMoneyId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Send Money</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form method="POST" action="<?= base_url('user_sendMoney/') ?>">
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="Amount" id="Label" placeholder="Enter amount to transfer" required>
                                                        <label for="floatingLabel"> Amount </label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="CardNumber" id="Label" placeholder="Enter receiver's card number">
                                                        <label for="floatingLabel"> Card Number </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success"> Send Money </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5> Take a Loan </h5>
                            </div>
                            <img class="card-img-top" src="/Images/General/Withdraw1.jpg" alt="Title" height="250em;">
                            <div class="card-body">
                                <h4 class="card-title"> Do you want to quickly take a loan ? </h4>
                                <p class="card-text"> We got you covered, simply click the button below and get started</p>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-success btn-lg" data-bs-toggle="modal" data-bs-target="#takeLoanId" style="background-color: #124B44;">
                                    Take a Loan
                                </button>
                                <div class="modal fade" id="takeLoanId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> Take a Loan </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?= base_url('user_takeLoan/') ?>" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" name="Amount" id="Label" placeholder="Enter Amount" required>
                                                        <label for="floatingLabel"> Amount </label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success"> Take Loan </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(
            function() {
                $("#select").click(function() {
                    let selectValue = $("#select").val();
                    if (selectValue == "Deposit") {
                        $("#Amount").html("Amount to Deposit");
                        $("#depWithButton").text("Deposit");
                        $("#selectLoan").show();
                    } else if (selectValue == 'Withdraw') {
                        $("#Amount").html("Amount to Withdraw");
                        $("#depWithButton").text("Withdraw");
                        $("#selectLoan").hide();
                    }
                });
            }
        );
    </script>
</body>

</html>