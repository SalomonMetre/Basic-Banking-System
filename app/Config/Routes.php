<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::showWelcomePage');

// general routes
$routes_and_functions=[
    'showWelcomePage'=>'HomeController::showWelcomePage',
    'showSignUpPage'=>'HomeController::showSignUpPage',
    'showSignInPage'=>'HomeController::showSignInPage',
];
foreach ($routes_and_functions as $route=>$function){
    $routes->match(['get', 'post'], $route, $function);
}

//user routes
$user_routes_functions=[
    'signUp/'=>'UserController::signUp',
    'signIn/'=>'UserController::signIn',
    'user_HomePage/'=>'UserController::showHomePage',
    'user_DepWithPage/'=>'UserController::showDepWithPage',
    'user_DepWith/'=>'UserController::depositOrWithdraw',
    'user_TransHistoryPage/'=>'UserController::showTransHistoryPage',
    'user_LoansPage/'=>'UserController::showLoansPage',
    'user_logout/'=>'UserController::logout',
    'user_sendMoney/'=>'UserController::sendMoney',
    'user_reverseTransfer/'=>'UserController::reverseTransfer',
    'user_takeLoan/'=>'UserController::takeLoan',
];
foreach($user_routes_functions as $route=>$function){
    $routes->match(['get', 'post'], $route, $function);
}

// admin routes
$user_routes_functions=[
    'admin_HomePage/'=>'AdminController::showHomePage',
    'admin_ViewTransactions/'=>'AdminController::showTransactionsPage',
    'admin_ViewLoans/'=>'AdminController::showLoansPage',
    'admin_editTransaction/'=>'AdminController::editTransaction',
    'admin_editUser/'=>'AdminController::editUser',
    'admin_deleteUser/'=>'AdminController::deleteUser',
    'admin_reverseTransfer/'=>'AdminController::reverseTransfer',
    'admin_editLoan/'=>'AdminController::editLoan',
];
foreach($user_routes_functions as $route=>$function){
    $routes->match(['get', 'post'], $route, $function);
}

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}