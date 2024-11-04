<?php

namespace App\Controllers;
use App\Utils\AbstractController;
use App\Models\Article;


class ArticlesController extends AbstractController
{
    public function addArticle()
    {
        if($_SESSION['user']['id_role'] == 1){
            if(isset($_POST['title'],$_POST['description'],$_POST['priceExcludingTax'],$_POST['type'],$_POST['quantity'], $_POST['material'])){
                $this->check('title', $_POST['title']);
                $this->check('description', $_POST['description']);
                $this->check('priceExcludingTax', $_POST['priceExcludingTax']);
                $this->check('type', $_POST['type']);
                $this->check('quantity', $_POST['quantity']);
                $this->check('material', $_POST['material']);
            }
            require_once(__DIR__ . '/../Views/article/addArticle.view.php');
        } else {
            require_once(__DIR__ . '/../Views/error/404.php');
        }
      
    }
}
