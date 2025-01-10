<?php

namespace App\Controllers;



class AnnexeController
{
  public function index()
  {
    require_once(__DIR__ . '/../Views/annexes/quiSommesNous.view.php');
  }
}
