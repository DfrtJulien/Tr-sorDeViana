<?php
require "vendor/autoload.php";

use Config\Router;

$router = new Router();

/** j'utilise la methode addRouute de mon controller pour ajouter des routes au controller
 *  cette methode prends trois argument, la route, le controller et la methode executé
 */
//la page d'accueil
$router->addRoute('/', 'HomeController', 'index');


$router->handleRequest();