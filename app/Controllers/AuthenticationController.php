<?php

namespace App\Controllers;

use App\Models\UserModel;
use http\Client\Curl\User;

class AuthenticationController
{

    public function register() {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmpwd = $_POST['confirmepassword'];
        if($password === $confirmpwd){
            $user = new UserModel();
            $user->register($name, $email, $password);
        }

    }
    public function login() {
        $userModel = new UserModel();
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userByEmail = $userModel->findUserByEmail($email);

        if(password_verify($password, $userByEmail['MotDePasse']))
        {
            session_start();
            $_SESSION['UserID'] = $userByEmail['UserID'];
            $_SESSION['Role'] = $userByEmail['Role'];
            $_SESSION['name'] = $userByEmail['NomUtilisateur'];
            $_SESSION['email'] = $userByEmail['Email'];
            if($userByEmail['Role'] == "admin"){
                header("location: /index.php?route=dashboard_admin");
            }elseif ($userByEmail['Role'] == "condidat"){
                header("location: /index.php");
            }else{
                echo " doesn't find u";
            }
        }else
        {
            header("location: /index.php?route=login");
        }
    }

    public function logout() {

    }

}