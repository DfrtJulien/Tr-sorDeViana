<?php

namespace App\Controllers;

// use App\Models\User;

use App\Models\Admin;
use App\Utils\AbstractController;
use App\Models\Users;

class RegisterController extends AbstractController
{
  public function index()
  {
    if (isset($_POST['firstname'], $_POST['lastname'], $_POST['mail'], $_POST['password'])) {
      $this->check("firstname", $_POST['firstname']);
      $this->check("lastname", $_POST['lastname']);
      $this->check("mail", $_POST['mail']);
      $this->check("password", $_POST['password']);

      if (empty($this->arrayError)) {
        $firstname =   htmlspecialchars($_POST['firstname']);
        $lastname =   htmlspecialchars($_POST['lastname']);
        $mail =   htmlspecialchars($_POST['mail']);
        $password =   htmlspecialchars($_POST['password']);
        $registerDate = date('Y-m-d');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $idRole = 2;
        var_dump("test");
        $user = new Users(null, $mail, $passwordHash, $registerDate,null,null,null,$firstname,$lastname,null,null,$idRole,null);

        $userExist = $user->existingUser($mail);

        if ($userExist) {
          $this->redirectToRoute('/login');
        } else {
          $user->saveUserInfo();
          $user->saveUser();
          $succesMsg = $this->showMsg();
          if ($succesMsg) {
              header("Refresh: 1; /login");
          }
        }
      }
    }
    require_once(__DIR__ . "/../Views/security/register.view.php");
  }

  public function admin()
  {
    if (isset($_POST['firstname'], $_POST['lastname'], $_POST['mail'], $_POST['password'],  $_POST['city'],  $_POST['street'],  $_POST['postal'],  $_POST['phone'])) {
      $this->check("firstname", $_POST['firstname']);
      $this->check("lastname", $_POST['lastname']);
      $this->check("mail", $_POST['mail']);
      $this->check("password", $_POST['password']);
      $this->check("city", $_POST['city']);
      $this->check("street", $_POST['street']);
      $this->check("postal", $_POST['postal']);
      $this->check("phone", $_POST['phone']);

      if (empty($this->arrayError)) {
        $firstname =   htmlspecialchars($_POST['firstname']);
        $lastname =   htmlspecialchars($_POST['lastname']);
        $mail =   htmlspecialchars($_POST['mail']);
        $password =   htmlspecialchars($_POST['password']);
        $city =   htmlspecialchars($_POST['city']);
        $street =   htmlspecialchars($_POST['street']);
        $postal =   htmlspecialchars($_POST['postal']);
        $phone =   htmlspecialchars($_POST['phone']);
        $registerDate = date('Y-m-d');
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $idRole = 1;

        $user = new Admin(null, $mail, $passwordHash, $registerDate, $city, $postal, $street, $firstname, $lastname, $phone,null, $idRole, null);

        $userExist = $user->existingUser($mail);

        if ($userExist) {
          $this->redirectToRoute('/adminLogin');
        } else {
          $user->saveUserInfo();
          $user->saveUser();
          $this->redirectToRoute('/');
        }
      }
    }
    require_once(__DIR__ . "/../Views/security/adminRegister.view.php");
  }
}
