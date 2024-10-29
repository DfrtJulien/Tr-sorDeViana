<?php

namespace App\Utils;


abstract class AbstractController
{
    protected array $arrayError = [];

    public function redirectToRoute($route)
    {
        http_response_code(303);
        header("Location: {$route} ");
        exit;
    }

    public function isNotEmpty($value)
    {
        if (empty($_POST[$value])) {
            $this->arrayError[$value] = "Le champ $value ne peut pas être vide.";
            return $this->arrayError;
        }
        return false;
    }

    public function checkFormat($nameInput, $value)
    {
        $regexName = '/^[a-zA-Zà-üÀ-Ü -]{2,255}$/';
        $regexPassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/';
        $regexAdress = '/^[a-zA-Zà-üÀ-Ü0-9 -]{2,255}$/';
        $regexPhoneNumber = '/^(?:([+]\d{1,11})[-.\s]?)?(?:[0](\d{1,9}))?$/';
        $regexPostal = '/^[0-9]{5}$/';

        switch ($nameInput) {
            case 'firstname':
                if (!preg_match($regexName, $value)) {
                    $this->arrayError['firstname'] = 'Merci de renseigner un prénom correcte!';
                }
                break;
            case 'lastname':
                if (!preg_match($regexName, $value)) {
                    $this->arrayError['lastname'] = 'Merci de renseigner un nom correcte!';
                }
                break;
            case 'mail':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->arrayError['mail'] = 'Merci de renseigner un e-mail correcte!';
                }
                break;
            case 'password':
                if (!preg_match($regexPassword, $value)) {
                    $this->arrayError['password'] = 'Merci de donné un mot de passe avec au minimum : 8 caractères, 1 majuscule, 1 miniscule, 1 caractère spécial!';
                }
                break;
            case 'city':
                if (!preg_match($regexName, $value)) {
                    $this->arrayError['city'] = 'Merci de renseigner une ville correcte!';
                }
                break;
            case 'street':
                if (!preg_match($regexAdress, $value)) {
                    $this->arrayError['street'] = 'Merci de renseigner un adresse correcte!';
                }
                break;
            case 'postal':
                if (!preg_match($regexPostal, $value)) {
                    $this->arrayError['postal'] = 'Merci de renseigner une adresse postale correcte!';
                }
                break;
            case 'postal':
                if (!preg_match($regexPostal, $value)) {
                    $this->arrayError['postal'] = 'Merci de renseigner une adresse postale correcte!';
                }
                break;
            case 'phone':
                if (!preg_match($regexPhoneNumber, $value)) {
                    $this->arrayError['phone'] = 'Merci de renseigner une numéro de téléphone correcte!';
                }
                break;
        }
    }

    public function check($nameInput, $value)
    {
        $this->isNotEmpty($nameInput);
        $value = htmlspecialchars($value);
        $this->checkFormat($nameInput, $value);
        return $this->arrayError;
    }

  
}