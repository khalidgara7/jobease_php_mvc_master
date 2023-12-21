<?php

namespace App\Models;

class UserModel
{
    private $db;

    public function __construct()
    {
        // Get an instance of the Database class
        $this->db = Database::getInstance()->getConnection();
    }
    // la partier de register.
    public function register($name, $email, $password){

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query1 = "INSERT INTO utilisateur (`NomUtilisateur`, `MotDePasse`, `Email`, `Role`) VALUES ('$name', '$hash', '$email', 'Admin')";
        $res = mysqli_query($this->db, $query1);
        return $res;
    }

    public function getAllUsers()
    {
        // Fetch data from the "users" table
        $result = $this->db->query("SELECT * FROM utilisateur");
        
        // Check for errors
        if (!$result) {
            die("Error: " . $this->db->error);
        }
        // Fetch data as an associative array
        $users = $result->fetch_all(MYSQLI_ASSOC);
        return $users;
    }
    public function findUserByEmail($email) {
        $query = "select * from `utilisateur` where '$email' = Email";
        $result = $this->db->query($query);
        $user = $result->fetch_assoc();
        return $user;
    }

    public function deleteofere($id){
        $data = "delete from offreemploi where OffreID = $id";
        $result = $this->db->query($data);
    }
}

?>
