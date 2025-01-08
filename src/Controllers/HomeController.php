<?php

namespace App\Controllers;

use App\Controllers\ArticlesController;
use App\Models\Article;

class HomeController
{
  public function index()
  {

    $articles = new Article(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

    $recentArticles = $articles->getMostRecentArticle();

    $selectionArticles = $articles->getSelectionArticle();

    require_once(__DIR__ . '/../Views/home.view.php');
  }
}
