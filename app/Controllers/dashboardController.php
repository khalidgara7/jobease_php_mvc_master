<?php

namespace App\Controllers;

use App\Models\StatistiquesModel;

class dashboardController
{
    public function dashboard_admin()
    {
        session_start();
        if (isset($_SESSION['UserID'])){
            $userid = $_SESSION['UserID'];
        }else{
            header("location: /index.php?route=login");
        }
        $statistic = new StatistiquesModel();
        $countOffer = $statistic->countOffer();
        $countactifOffer = $statistic->countOfferactif();
        $countinactifoffer = $statistic->countofferinactif();

        require(__DIR__ .'../../../view/dashboard.php');
    }
}