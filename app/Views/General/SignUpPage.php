<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="/css/SignUp.css">
  <title>Sign up</title>
</head>

<body>
  <div>
    <header>
      <div class="logo-container">
        <div class="co-op-logo mr-2 ml-2"></div>
        <span class="logo"><strong>CO-OPERATIVE BANK</strong></span>
        <a href="<?php echo base_url('showSignInPage/'); ?>" class="sign-in btn btn-success btn-md btn-block"> Sign in </a>
      </div>
    </header>
    <div class="container-fluid form-container flex-nowrap">
      <div class="row" style="text-align: center; color:#018B71;">
        <h1 style="margin-bottom:3%; margin-top:-2%;">Sign Up</h1>
        <div class="row form-row">
          <form method="POST" action="<?= base_url("signUp/") ?>" class="row">
            <div class="col-sm-12 col-md-6">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="FirstName" id="Label" placeholder="Enter your first name" required>
                <label for="floatingLabel">First Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="LastName" id="Label" placeholder="Enter your last name" required>
                <label for="floatingLabel">Last Name</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" name="Email" id="Label" placeholder="Enter your email address" required>
                <label for="floatingLabel">Email Address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="Password" id="Label" placeholder="Enter your password" required>
                <label for="floatingLabel">Password</label>
              </div>
            </div>
            <div class="col-sm-12 col-md-6">
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="ConfirmPassword" id="Label" placeholder="Confirm your password" required>
                <label for="floatingLabel">Confirm Password</label>
              </div>
              <div class="form-floating">
                <div class="mb-3">
                  <select class="form-control" name="Gender" id="select" style="padding: 3.2%;">
                    <option value=""> --Select your gender-- </option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Unknown">Prefer Not To Say</option>
                  </select>
                </div>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="PhysicalAddress" id="Label" placeholder="Enter your password" required>
                <label for="floatingLabel"> Physical Address </label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="Profession" id="Label" placeholder="Enter your password" required>
                <label for="floatingLabel">Profession</label>
              </div>
            </div>
            <div class="row">
              <button class="btn btn-success" style="margin-left:10%; margin-right:10%;padding: 2%; width:80%; background-color:#124B44; font-size:22px;" type="submit"> Sign Up </button>
            </div>
          </form>
        </div>
      </div>
      <style>
        body {
          width: 100%;
          height: 100vh;
          background: url("/Images/General/home-banner-scaled.jpg");
          background-repeat: no-repeat;
          background-position: center center;
          background-size: cover;
          opacity: 1;
          left: 0px;
          position: relative;
        }

        header {
          background: mediumseagreen;
          height: 75px;
        }

        .sign-in {
          width: fit-content;
          margin-right: 15px;
          margin-left: auto;
          background-color: rgba(18, 75, 68, 1);
          border-radius: 10px;
        }

        .logo-container {
          width: 100%;
          display: flex;
          align-items: center;
        }

        .co-op-logo {
          display: inline-block;
          width: 64px;
          height: 67px;
          background: url("/Images/General/co-op-Bank - transparent logo.png");
          background-repeat: no-repeat;
          background-position: center center;
          background-size: cover;
          opacity: 1;
        }

        .logo {
          display: inline-block;
          color: rgba(18, 75, 68, 1);
          font-family: Inter;
          font-weight: Bold;
          font-size: 40px;
        }

        .register-container {
          width: 800px;
          height: 500px;
          background-color: rgba(54, 177, 92, 0.6);
          margin: auto;
          padding: 10px 10px 10px 10px;
          position: relative;
        }

        .register-container span {
          display: block;
          color: white;
          font-family: Inter;
          font-weight: Bold;
          font-size: 25px;
          position: relative;
        }

        .register select,
        .register input {
          background-color: rgba(196, 196, 196, 255);
          width: 300px;
          margin: auto;
        }

        .register select:focus,
        .register input:focus {
          background-color: rgba(196, 196, 196, 255);

        }

        .txt-bt {
          width: fit-content;
          height: 5%;
          position: absolute;
          bottom: 10px;
          left: 50%;
          transform: translateX(-50%);
        }

        .txt-bt span {
          font-size: 15px;
        }

        .next-btn {
          background-color: rgba(136, 192, 163, 255);
          width: 100px;
          margin: auto;
          border-radius: 15px;
          border: none;
          float: right;
          margin-right: 40px;
        }

        .btn-container {
          display: flex;
          width: 100%;
          justify-content: space-around;
          align-items: center;
        }

        .previous-btn {
          background-color: rgba(136, 192, 163, 255);
          width: 100px;
          height: 30px;
          border-radius: 15px;
          border: none;
          float: right;
        }

        .submit {
          background-color: rgba(136, 192, 163, 255);
          width: 100px;
          height: 30px;
          border-radius: 15px;
          border: none;
          float: right;
        }

        .next-btn:hover,
        .next-btn:focus,
        .previous-btn:hover,
        .previous-btn:focus,
        .submit:hover,
        .submit:focus {
          background-color: rgb(109, 194, 150);
        }

        .step {
          display: none;
        }

        .step.active {
          display: block;
        }
      </style>
    </div>
</body>

</html>