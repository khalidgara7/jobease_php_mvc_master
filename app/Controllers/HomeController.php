<?php
namespace App\Controllers;

use App\Models\OfferModel;
use App\Models\StatistiquesModel;
use App\Models\UserModel;

class HomeController
{
    public function index()
    {
        $userModel = new UserModel();
        $offersModel = new OfferModel();

        $offers = $offersModel->getAllOffers();
        $users = $userModel->getAllUsers();
        // Your controller logic goes here
        $data = 'Hello, this is the home page!';
        $collections = ['users' => $users , "data" => $data] ;
        require(__DIR__ .'../../../view/home.php');
      

    }
    public function loginView(){

        require(__DIR__ .'../../../view/login.php');
    }
    public function register(){
        require(__DIR__ .'../../../view/register.php');
    }
    public function postRegister(){
        $register = new AuthenticationController();
        $register->register();
        $this->loginView();
    }

    public function fetchMoreUsers()
    {
       
        $moreUsers = [
            ['username' => 'test user A', 'email' => 'user1@example.com'],
            ['username' => 'test user B', 'email' => 'user2@example.com'],
        ];

        // Return the data as JSON
        header('Content-Type: application/json');
        echo json_encode(['users' => $moreUsers]);
        exit;
    }

    public  function profile(){

        require(__DIR__ .'/../../view/Profile.php');

    }

    public function updateprofile()
    {
        $update = new UserModel();
        $update->Update_Profile();
        $this->profile();
    }

    public function searchByKeyWord($searchText){
            $searchOffer = new UserModel();
            $search = $searchOffer->searchByKeyWord($searchText);
            echo json_encode($search);
    }


}

