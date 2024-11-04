<?php

namespace App\Controllers;
use App\Models\User;
use App\Utils\AbstractController;


class UserController extends AbstractController
{
    public function showProfile()
    {
        if(isset($_GET['id'])){
            $userId = $_GET['id'];
            $user = new User($userId,null,null,null,null,null,null,null,null,null,null,null);
            $myUser = $user->getUserPorfile();

            if(isset( $_POST['mail'], $_POST['city'],  $_POST['street'],  $_POST['postal'],  $_POST['phone'])){

                $this->check("mail", $_POST['mail']);
                $this->check("city", $_POST['city']);
                $this->check("street", $_POST['street']);
                $this->check("postal", $_POST['postal']);
                $this->check("phone", $_POST['phone']);
          
                if(empty($this->arrayError)){
                   
                    $mail = htmlspecialchars($_POST['mail']);                
                    $city = htmlspecialchars($_POST['city']);
                    $street = htmlspecialchars($_POST['street']);
                    $postal = htmlspecialchars($_POST['postal']);
                    $phone = htmlspecialchars($_POST['phone']);
                  
                    $user = new User($userId,$mail,null,null,$city,$postal,$street,null,null,$phone,null,null);

                    $user->updateUser();
                    $user->updateUserInfo();

                    $this->redirectToRoute('/');
                }
            }          
            require_once(__DIR__ . '/../Views/profile.view.php');
        }else {
            $this->redirectToRoute('/');
        }
       
    }

    public function updateProfile()
    {
        require_once(__DIR__ . '/../Views/updateProfile.view.php');
    }
}
