<?php

namespace App\Controllers;

use App\Models\User;
use App\Utils\AbstractController;
use App\Models\Users;

class LogoutController extends AbstractController
{
  public function index()
  {
   session_destroy();
   $this->redirectToRoute("/");
  }
}