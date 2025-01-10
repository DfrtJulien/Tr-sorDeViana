<?php

namespace App\Controllers;

use App\Models\User;
use App\Utils\AbstractController;
use App\Models\Admin;

class LoginController extends AbstractController
{
    public function index()
    {
        if (isset($_POST['mail'], $_POST['password'])) {
            $this->check('mail', $_POST['mail']);
            $this->check('password', $_POST['password']);

            if (empty($this->arrayError)) {
                $mail = htmlspecialchars($_POST['mail']);
                $password = htmlspecialchars($_POST['password']);

                $user = new User(null, $mail, $password, null, null, null, null,null, null, null, null, null, null);
                $responseGetUser = $user->login($mail);


                if ($responseGetUser) {
                    $passwordUser = $responseGetUser->getPassword();

                    if (password_verify($password, $passwordUser)) {
                        $_SESSION['user'] = [
                            'id' => uniqid(),
                            'mail' => $responseGetUser->getMail(),
                            'register_date' => $responseGetUser->getRegisterDate(),
                            'idUser' => $responseGetUser->getId(),
                            'id_role' => $responseGetUser->getId_role(),
                            'img_path' => $responseGetUser->getImg()
                        ];
                        $this->redirectToRoute('/');
                    } else {
                        $error = "Le mail ou mot de passe n'est pas correct";
                    }
                } else {
                    $error = "Le mail ou mot de passe n'est pas correct";
                }
            } else {
                $error = "Le mail ou mot de passe n'est pas correct";
            }
        }
        if (isset($_SESSION['user'])) {
            $this->redirectToRoute('/');
        }
        require_once(__DIR__ . "/../Views/security/login.view.php");
    }

    public function admin()
    {
        if (isset($_POST['mail'], $_POST['password'])) {
            $this->check('mail', $_POST['mail']);
            $this->check('password', $_POST['password']);

            if (empty($this->arrayError)) {
                $mail = htmlspecialchars($_POST['mail']);
                $password = htmlspecialchars($_POST['password']);

                $user = new Admin(null, $mail, $password, null, null, null, null, null,null, null, null, null, null);
                $responseGetUser = $user->login($mail);
               

                if ($responseGetUser) {
                    $passwordUser = $responseGetUser->getPassword();

                    if (password_verify($password, $passwordUser)) {
                        $_SESSION['user'] = [
                            'id' => uniqid(),
                            'mail' => $responseGetUser->getMail(),
                            'register_date' => $responseGetUser->getRegisterDate(),
                            'idUser' => $responseGetUser->getId(),
                            'id_role' => $responseGetUser->getId_role()
                        ];
                        $this->redirectToRoute('/');
                    } else {
                        $error = "Le mail ou mot de passe n'est pas correct";
                    }
                } else {
                    $error = "Le mail ou mot de passe n'est pas correct";
                }
            } else {
                $error = "Le mail ou mot de passe n'est pas correct";
            }
        }
        if (isset($_SESSION['user'])) {
            $this->redirectToRoute('/');
        }
        require_once(__DIR__ . "/../Views/security/adminLogin.view.php");
    }
}
