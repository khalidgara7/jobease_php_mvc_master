<?php

namespace App\Controllers;

use App\Models\UserModel;

class DeleteOfferController
{
    public function deleteOffer(){

        if(isset($_GET['dleteid'])){
            $id = $_GET['dleteid'];
            $objdelet = new UserModel();
            $rsltfunc = $objdelet->deleteofere($id);
            if ($rsltfunc){
                header("Location: ?route=offer");
            }
        }
    }
}