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

public function save($title, $descrip, $entreprise, $local, $status, $image){
        die('test');
    $query1 = "INSERT INTO offreemploi (`TitreOffre` , `DescriptionOffre`, `Entreprise`, `Localisation`, `Statut`, `Image`) values ('$title', '$descrip', '$entreprise',' $local', '$status', '$image')";
return mysqli_query($this->db,$query1);
}

}