<?php

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\Article;


class ArticlesController extends AbstractController
{
    public function addArticle()
    {
        if ($_SESSION['user']['id_role'] == 1) {
            if (isset($_POST['title'], $_POST['description'], $_POST['priceExcludingTax'], $_POST['type'], $_POST['quantity'], $_POST['material'])) {
                $this->check('title', $_POST['title']);
                $this->check('priceExcludingTax', $_POST['priceExcludingTax']);
                $this->check('type', $_POST['type']);
                $this->check('quantity', $_POST['quantity']);
                $this->check('material', $_POST['material']);
                if (empty($this->arrayError)) {
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $priceExcludingTax = $_POST['priceExcludingTax'];
                    $type = $_POST['type'];
                    $quantity = $_POST['quantity'];
                    $material = $_POST['material'];
                    $tva = 20;

                    $article = new Article(null, $title, $description, $priceExcludingTax, $tva, $type, $quantity, $material);

                    $article->addArticle();
                }
            }
            require_once(__DIR__ . '/../Views/article/addArticle.view.php');
        } else {
            require_once(__DIR__ . '/../Views/error/404.php');
        }
    }

    public function showAllArticle()
    {
        $article = new Article(null, null, null, null, null, null, null, null);

        $articles = $article->getAllArticle();
        require_once(__DIR__ . "/../Views/article/allArticle.view.php");
    }

    public function updateArticle()
    {
        if ($_SESSION['user']['id_role'] == 1) {
            if (isset($_GET['id'])) {
                $idArticle = $_GET['id'];
                $article = new Article($idArticle, null, null, null, null, null, null, null);

                $myArticle = $article->getArticleById();

                if (!$myArticle) {
                    $this->redirectToRoute('/');
                }

                if (isset($_POST['title'], $_POST['description'], $_POST['priceExcludingTax'], $_POST['type'], $_POST['quantity'], $_POST['material'])) {
                    $this->check('title', $_POST['title']);
                    $this->check('priceExcludingTax', $_POST['priceExcludingTax']);
                    $this->check('type', $_POST['type']);
                    $this->check('quantity', $_POST['quantity']);
                    $this->check('material', $_POST['material']);
                    if (empty($this->arrayError)) {
                        $title = $_POST['title'];
                        $description = $_POST['description'];
                        $priceExcludingTax = $_POST['priceExcludingTax'];
                        $type = $_POST['type'];
                        $quantity = $_POST['quantity'];
                        $material = $_POST['material'];
                        $tva = 20;

                        $article = new Article($idArticle, $title, $description, $priceExcludingTax, $tva, $type, $quantity, $material);

                        $article->updateArticle();
                        $this->redirectToRoute('allArticle');
                    }
                }
            }
            require_once(__DIR__ . "/../Views/article/updateArticle.view.php");
        } else {
            $this->redirectToRoute('/404');
        }
    }
}
