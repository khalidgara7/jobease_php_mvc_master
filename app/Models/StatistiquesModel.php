<?php

namespace App\Models;

class StatistiquesModel {
    private $db;

    public function __construct()
    {
        // Get an instance of the Database class
        $this->db = Database::getInstance()->getConnection();
    }

    public function countOffer(){
        $countoffer = "SELECT count(*) as number_offer FROM `offreemploi` ";
        $result = $this->db->query($countoffer);
        $row = mysqli_fetch_assoc($result);
        return $row['number_offer'];
    }
    public function countOfferactif(){
        $actifoffer = "SELECT count(*) as actifoffres FROM `offreemploi` where visibilite = 'actif'";
        $result = $this->db->query($actifoffer);
        $row = mysqli_fetch_assoc($result);
        return $row['actifoffres'];
    }
    public function countofferinactif(){
        $inactifoffer = "select count(*) as inactifoffer from offreemploi where visibilite = 'inactif'";
        $rsult = $this->db->query($inactifoffer);
        $row = mysqli_fetch_assoc($rsult);
        return $row['inactifoffer'];
    }
    public function countofferapproved(){
        $offeraproved = "select count(*) as offerAproved from candidature where status = 'accept'";
        $rsult = $this->db->query($offeraproved);
        $row = mysqli_fetch_assoc($rsult);
        return $row['offerAproved'];
    }
}
