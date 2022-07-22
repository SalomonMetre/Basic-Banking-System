<?php

namespace App\Controllers;

class HomeController extends BaseController{

    public function showWelcomePage(){
        return view('General/WelcomePage');
    }

    public function showSignUpPage(){
        return view('General/SignUpPage');
    }

    public function showSignInPage(){
        return view('General/SignInPage');
    }

    

}


?>