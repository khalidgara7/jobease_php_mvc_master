<?php

namespace App\Controllers;


use App\Models\OfferModel;

class offerController
{
    public function getAllOffer()
    {
        $offersModel = new OfferModel();

        $offers = $offersModel->getAllOffers();
        require(__DIR__ .'../../../view/offre.php');
    }
    public function InsertOffer()
    {
        if (isset($_POST['Addoffer'])) {
            $offer = new OfferModel();
            $alert = $offer->saveoffer($_POST['title'], $_POST['description'], $_POST['enterprise'],$_POST['local'],$_POST['taskstatus'],$this->uploadimage());
            if($alert){
                $_SESSION['success'] = "this offer is inserted";
            }else {
                echo "<script>alert('not save')</script>";
            }
            $this ->getAllOffer();
            //require(__DIR__ .'../../../view/offre.php');
        }
    }

    function uploadimage()
    {
        if (isset($_FILES['my_image']['name']))
        {
            /* echo "<pre>";
             print_r($_FILES['my_image']);
             echo "</pre>";
             die();*/

            $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];

            if ($error === 0)
            {

                if ($img_size > 17000000)
                {
                    /*echo "<pre>";
                    print_r($_FILES['my_image']);
                    echo "</pre>";
                    die();*/
                    $_SESSION['Error'] = "Sorry, your file is too large.";/*
                    header('location: ../../public/assets/img/uploads');*/
                }
                else
                {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);// return extension of image
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png");


                    if (in_array($img_ex_lc, $allowed_exs))
                    {
                        $unique = uniqid() ;
                        $new_img_name = $unique.'-'.$img_name;

                        $img_upload_path = 'assets/img/uploads/'.$new_img_name;
                        move_uploaded_file($tmp_name, $img_upload_path);

                    }
                    else {
                        $_SESSION['Error'] = "You can't upload files of this type";/*
                        header('location:../dashboard/dashboard.php');*/
                    }
                }
            }
            else
            {
                $_SESSION['Error'] = 'unknown error occurred!';
                header('location: ../dashboard/dashboard.php');
            }
        }
        return $new_img_name;
    }

    public function applyOffer(){

    }

}