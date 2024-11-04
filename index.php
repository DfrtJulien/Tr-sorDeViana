<?php
require "vendor/autoload.php";
session_start();


use Config\Router;

$router = new Router();

//la page d'accueil
$router->addRoute('/', 'HomeController', 'index');
// inscription / connexion
$router->addRoute('/register', 'RegisterController', 'index');
$router->addRoute('/login', 'LoginController', 'index');
// deconnexion
$router->addRoute('/logout', 'LogoutController', 'index');
// profile user
$router->addRoute('/profile', 'UserController', 'showProfile');


$router->handleRequest();