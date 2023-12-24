<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\DeleteOfferController;
use App\Controllers\OfferController;


$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Instantiate the controller based on the route
switch ($route) {
    //
    case 'register':
        $controller = new HomeController();
        $controller->register();
        break;
    case 'postRegister':
        $controller = new HomeController();
        $controller->postRegister();
        break;
    //
    case 'login':// for show page login.
        $controller = new HomeController();
        $controller->loginView();
        break;
    case 'login_post': // for submit login form
        $controller = new \App\Controllers\AuthenticationController();
        $controller->login();
        break;
    case 'logout':
        $controller = new \App\Controllers\AuthenticationController();
        $controller->logout();
        break;
    case 'dashboard_admin':
        $controller = new \App\Controllers\dashboardController();
        $controller->dashboard_admin();
        break;
    case 'home':
        $controller = new HomeController();
        $controller->index();
        break;

    case 'offer':
            $offercontrole = new \App\Controllers\offerController();
            $offercontrole->getAllOffer();
            break;
    case 'offer_apply':
            $offercontrole = new OfferController();
            $offercontrole->applyOffer();
            break;
    case 'updateCandidature':
            $offercontrole = new OfferController();
            $offercontrole->updateStatusCandidature();
            break;
    case 'insertoffer':
            $offercontrole = new OfferController();
            $offercontrole->InsertOffer();
            break;
    case 'deleteOffre':
            $offercontrole = new DeleteOfferController();
            $offercontrole->deleteOffer();
            break;
    case 'profile':
        $logincontroller = new HomeController();
        $logincontroller->profile();
        break;
    case 'updateprofile':
        $logincontroller = new HomeController();
        $logincontroller->updateprofile();
        break;
    case 'OfferRequest':
        $offercontrole = new OfferController();
        $offercontrole->RequestOffers();
        break;
    case 'creat':
        $logincontroller = new LoginController();
        $logincontroller->creat();
        break;
    case 'fetchMoreUsers':
        $controller = new HomeController();
        $controller->fetchMoreUsers();
        break;
    // Add more cases for other routes as needed
    default:
        // Handle 404 or redirect to the default route
        header('HTTP/1.0 404 Not Found');
        exit('Page not found');
}

// Execute the controller action

?>
