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
            require_once(__DIR__ . '/../Views/profile.view.php');
        }else {
            $this->redirectToRoute('/');
        }
       
    }
}
