<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/css/Admin/HomePage.css">
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
                <div class="row" style="background-color:#0B6C4D;border-radius:5%;">
                    <div class="col-md-2"> <i class="bi bi-wallet2"></i> </div>
                    <div class="col-md-10"> <a href="<?= base_url("admin_HomePage/") ?>" style="text-decoration: none; color:white;"> View Users </a> </div>
                </div>
                <div class="row">
                    <div class="col-md-2"> <i class="bi bi-clock-history"></i> </div>
                    <div class="col-md-10"> <a href="<?= base_url("admin_ViewTransactions/") ?>" style="text-decoration: none; color:white;"> View Transactions </a> </div>
                </div>
                <div class="row">
                    <div class="col-md-2"> <i class="bi bi-arrow-counterclockwise"></i> </div>
                    <div class="col-md-10"> <a href="<?= base_url("admin_ViewLoans/") ?>" style="text-decoration: none; color:white;"> View Loans </a> </div>
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
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">
                                                <a href="<?= base_url("showWelcomePage/") ?>" style="text-decoration: none;color:white;"> No </a>
                                            </button>
                                            <button type="submit" class="btn btn-primary">Rate Us</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-9 right-content" style="display: block;">
                <div class="row" style="padding: 3%;"> <span style="text-align: right; font-size:24px; color: #021C03;">☀️ Welcome, <em> Admin </em></span>
                </div>
                <div class="row" style="margin:0%; background-color:white;">
                    <button class="btn btn-primary" disabled style="padding:1%;"> All Users </button>
                    <table class="table table-dark display" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col" style="color:yellow;">User Id</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Physical Address</th>
                                <th scope="col">Profession</th>
                                <th scope="col">Amount</th>
                                <th scope="col"> Edit </th>
                                <th scope="col"> Delete </th>
                            </tr>
                        </thead>
                        <tbody style="overflow-y: scroll;">
                            <?php
                            $users = session()->get('users');
                            foreach ($users as $user) {
                            ?>
                                <tr>
                                    <td style="color:yellow;"> <?= $user['UserId'] ?> </td>
                                    <td> <?= $user['FirstName'] ?> </td>
                                    <td> <?= $user['LastName'] ?> </td>
                                    <td> <?= $user['Gender'] ?> </td>
                                    <td> <?= $user['PhysicalAddress'] ?> </td>
                                    <td> <?= $user['Profession'] ?> </td>
                                    <td> <?= $user['Amount'] ?> </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modelId<?= $user['UserId'] ?>">
                                            Edit
                                        </button>
                                        <div class="modal fade" id="modelId<?= $user['UserId'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:black;"> Edit User </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="POST" action="admin_editUser/">
                                                        <div class="modal-body">
                                                            <input type="text" name="UserId" value="<?= $user['UserId'] ?>" hidden>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="FirstName" id="Label" placeholder="First Name" value="<?= $user['FirstName'] ?>">
                                                                <label for="floatingLabel" style="color:black;"> First Name </label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="LastName" id="Label" placeholder="Last Name" value="<?= $user['LastName'] ?>">
                                                                <label for="floatingLabel" style="color:black;">Last Name</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="PhysicalAddress" id="Label" placeholder="Physical Address" value="<?= $user['PhysicalAddress'] ?>">
                                                                <label for="floatingLabel" style="color:black;">Physical Address</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="Profession" id="Label" placeholder="Profession" value="<?= $user['Profession'] ?>">
                                                                <label for="floatingLabel" style="color:black;">Profession</label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"> Save </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        <form action="admin_deleteUser/" method="POST">
                                            <input type="text" name="UserId" value="<?= $user['UserId'] ?>" hidden>
                                            <button class="btn btn-danger" type="submit" style="padding:15%; font-size:1em;"> Delete </button>
                                        </form>
                                    </td>
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