<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="/css/BootstrapMini.css">
  <title>Welcome Page</title>
</head>

<body>
  <div>
    <header>
      <div class="logo-container">
        <div class="co-op-logo mr-2 ml-2"></div>
        <span class="logo"><strong>CO-OPERATIVE BANK</strong></span>
        <a href="showSignUpPage/" class="sign-up btn btn-success btn-md btn-block"> Sign up for Mobile banking </a>
      </div>
    </header>
    <main>
      <div class="main-txt text-center">
        <span><strong>Welcome to the</strong></span>
        <span style="display: block;"><strong>Co-operative Bank of Kenya.</strong></span>
        <span style="font-size: 20px; display: block; color: rgba(255,255,255, 0.8);">let's get you started</span>
      </div>
    </main>
    <footer>
      <div class="footer-elements">
        <div class="footer-1 text-center">
          <div class="banking-all"></div>
          <span class="footer-txt">Banking for All</span>
          <div class="info">
            <span>Learn more -></span>
          </div>
        </div>
        <div class="footer-2 text-center">
          <div class="banking-us"></div>
          <span class="footer-txt">Banking for us</span>
          <div class="info">
            <span>Learn more -></span>
          </div>
        </div>
        <div class="footer-3 text-center">
          <div class="banking-me"></div>
          <span class="footer-txt">Banking for me</span>
          <div class="info">
            <span>Learn more -></span>
          </div>
        </div>
      </div>
    </footer>
    <style>
      body {
        margin: 0;
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

      header {
        background: mediumseagreen;
        height: 75px;
      }

      .logo-container {
        width: 100%;
        display: flex;
        align-items: center;
      }

      .logo {
        display: inline-block;
        color: rgba(18, 75, 68, 1);
        font-family: Inter;
        font-weight: Bold;
        font-size: 40px;
      }

      .sign-up {
        width: 250px;
        margin-right: 15px;
        margin-left: auto;
        background-color: rgba(18, 75, 68, 1);
        border-radius: 10px;
      }

      main {
        width: 100%;
        height: 500px;
        background: url("/Images/General/home-banner-scaled.jpg");
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        opacity: 1;
        left: 0px;
        overflow: hidden;
      }

      .main-txt {
        margin-top: 30px;
        font-family: Inter;
        font-weight: Extra Bold;
        font-size: 50px;
        color: rgba(255, 255, 255);
      }

      footer {
        width: 100%;
        height: 500px;
        background-color: mediumseagreen;
        opacity: 1;
        bottom: 0px;
        background-size: cover;
      }

      .footer-elements {
        width: 100%;
        height: 500px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        position: relative;
      }

      .footer-1,
      .footer-2,
      .footer-3 {
        width: 298px;
        height: 411px;
        background-color: white;
        border-radius: 20px;
        position: relative;
      }

      .banking-all {
        width: 80px;
        height: 80px;
        margin: auto;
        margin-top: 60px;
        background: url("/Images/General/banking.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }

      .banking-us {
        width: 80px;
        height: 80px;
        margin: auto;
        margin-top: 60px;
        background: url("/Images/General/banking-business.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }

      .banking-me {
        width: 80px;
        height: 80px;
        margin: auto;
        margin-top: 60px;
        background: url("/Images/General/banking-me.png");
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
      }

      .footer-txt {
        color: rgba(8, 82, 43, 0.9399999976158142);
        font-family: Inter;
        font-weight: Medium;
        font-size: 30px;
      }

      .info {
        background-color: rgba(8, 82, 43, 0.9399999976158142);
        position: absolute;
        width: 100%;
        height: 45%;
        bottom: 0px;
        border-bottom-left-radius: 20px;
        border-bottom-right-radius: 20px;
      }

      .info span {
        width: 260px;
        color: rgba(255, 255, 255, 1);
        position: absolute;
        top: 30px;
        left: 23px;
        font-family: Inter;
        font-weight: Regular;
        font-size: 30px;
        opacity: 1;
        text-align: left;
      }
    </style>
  </div>
</body>

</html>