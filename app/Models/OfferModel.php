<?php

namespace App\Models;

use http\QueryString;

class OfferModel
{
    private $db;

    public function __construct()
    {
        // Get an instance of the Database class
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllOffers(){

        $data = "select * from offreemploi";
        $result = mysqli_query($this->db, $data);
        $table = [];
        while ($row = mysqli_fetch_assoc($result)){
            $table[] = $row;
        }
        return $table;
    }

public function saveoffer($title, $descrip, $entreprise, $local, $status, $image){

    $query1 = "INSERT INTO offreemploi (`TitreOffre` , `DescriptionOffre`, `Entreprise`, `Localisation`, `Statut`, `Image`) values ('$title', '$descrip', '$entreprise',' $local', '$status', '$image')";
    return mysqli_query($this->db,$query1);

}

/// apply theos not complete.
    /*public function applyOffer($iduser, $idoffer, $dateapplying){
        if($this->isUserAlreadyApplyToOffre($iduser, $idoffer)){
            echo "<script>alert('User Already Applied')</script>";
            return; // exit in the method immediately and return void
        }

        $query = "INSERT INTO `candidature`(`UserID`, `OffreID`, `DateSoumission`) VALUES ('$iduser','$idoffer','$dateapplying')";
        $rslt = mysqli_query($this->conn, $query);
        if($rslt){
            echo "<script>alert('request successfully')</script>";
        }
    }*/

}