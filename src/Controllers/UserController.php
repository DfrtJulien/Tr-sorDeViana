<?php

namespace App\Controllers;

use App\Models\User;
use App\Utils\AbstractController;


class UserController extends AbstractController
{
    public function showProfile()
    {
        if (isset($_GET['id'])) {
            $userId = $_GET['id'];
            $user = new User($userId, null, null, null, null, null, null,null, null, null, null, null, null);
            $myUser = $user->getUserPorfile();
            $myUserImg = $myUser->getImg();
            $myUserPath = "/public/upload/" . $myUserImg;

            if (isset($_POST['mail'], $_POST['city'],  $_POST['street'],  $_POST['postal'],  $_POST['phone'])) {

                $this->check("mail", $_POST['mail']);
                $this->check("city", $_POST['city']);
                $this->check("street", $_POST['street']);
                $this->check("postal", $_POST['postal']);
                $this->check("phone", $_POST['phone']);

                $target_dir = "public/uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                if (empty($this->arrayError)) {

                    $mail = htmlspecialchars($_POST['mail']);
                    $city = htmlspecialchars($_POST['city']);
                    $street = htmlspecialchars($_POST['street']);
                    $postal = htmlspecialchars($_POST['postal']);
                    $phone = htmlspecialchars($_POST['phone']);
                    $img = "";


                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        echo "Le fichier est une image  - " . $check["mime"] . ".";
                        $uploadOk = 1;
                       
                    } else {
                        echo "Fichier n'est pas une image.";
                        $uploadOk = 0;
                    }

                    if ($_FILES["fileToUpload"]["size"] > 200000000000) {
                        echo "Désole, votre image est trop volumineuse.";
                        $uploadOk = 0;
                    }

                    if (
                        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif"
                    ) {
                        echo "Désole, seul les images JPG, JPEG, PNG & GIF sont autoriser.";
                        $uploadOk = 0;
                    }

                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                      // if everything is ok, try to upload file
                      } else {
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $img = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"]));
                        } else {
                          echo "Sorry, there was an error uploading your file.";
                        }
                      }
                      
                    unlink('public/uploads/'. $myUserImg);
                    $user = new User($userId, $mail, null, null, $city, $postal, $street, null, null, $phone,$img, null, null);
                    $user->updateUser();
                    $user->updateUserInfo();

                    $this->redirectToRoute('/');
                }
            }
            require_once(__DIR__ . '/../Views/profile.view.php');
        } else {
            $this->redirectToRoute('/');
        }
    }

    public function updateProfile()
    {
        require_once(__DIR__ . '/../Views/updateProfile.view.php');
    }
}
