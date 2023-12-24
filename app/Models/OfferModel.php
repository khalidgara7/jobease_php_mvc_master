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

        $data = "select o.* from offreemploi o where o.OffreID NOT IN 
                  ( SELECT c.OffreID from candidature c WHERE c.UserID = ". $_SESSION['UserID'] .")";
        $result = mysqli_query($this->db, $data);
        $table = [];
        while ($row = mysqli_fetch_assoc($result)){
            $table[] = $row;
        }
        return $table;
    }

    public function saveoffer($title, $descrip, $entreprise, $local, $status, $image){

        $query1 = "INSERT INTO offreemploi (`TitreOffre` , `DescriptionOffre`, `Entreprise`, `Localisation`, `Statut`, `Image`)
    values ('$title', '$descrip', '$entreprise',' $local', '$status', '$image')";
        return mysqli_query($this->db,$query1);

    }

    public function getAllCandidature(){

        $data = "SELECT c.CandidatureID, u.NomUtilisateur, o.TitreOffre, c.DateSoumission, c.status FROM candidature c 
                    INNER JOIN jobeasy.utilisateur u on c.UserID = u.UserID
                    INNER JOIN jobeasy.offreemploi o on c.OffreID = o.OffreID";
        $result = mysqli_query($this->db, $data);
        $table = [];
        while ($row = mysqli_fetch_assoc($result)){
            $table[] = $row;
        }
        return $table;
    }

    public function updateStatusCandidature($candidatureId, $status)
    {
        $update = "UPDATE candidature  SET status='$status' WHERE CandidatureID = '$candidatureId'";
        $res = mysqli_query($this->db, $update);
    }

}