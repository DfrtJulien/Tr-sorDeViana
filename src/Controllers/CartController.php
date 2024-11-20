<?php

namespace App\Controllers;

use App\Utils\AbstractController;



class CartController extends AbstractController
{
  public function index()
  {
    require_once(__DIR__ . "/../Views/cart.view.php");
  }
}
