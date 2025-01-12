<?php

namespace App\Controllers;

use App\Utils\AbstractController;
use App\Models\Article;
use App\Models\Note;
use App\Models\Users;

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

                $target_dir = "public/img/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                if (empty($this->arrayError)) {
                    $title = htmlspecialchars($_POST['title']);
                    $description = htmlspecialchars($_POST['description']);
                    $priceExcludingTax = htmlspecialchars($_POST['priceExcludingTax']);
                    $type = htmlspecialchars($_POST['type']);
                    $quantity = htmlspecialchars($_POST['quantity']);
                    $material = htmlspecialchars($_POST['material']);
                    $tva = 20;

                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $img = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
                        $img_path =  $img;
                    }
                    $article = new Article(null, $title, $description, $priceExcludingTax, $tva, $type, $quantity, $material, $img_path, null, null, null, null, null, null, null, null);

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
        if (isset($_GET['category'])) {
            $category = $_GET['category'];
            $article = new Article(null, null, null, null, null, $category, null, null, null, null, null, null, null, null, null, null, null);

            $articlesByCategory = $article->getArticleByCategory();
        } else {

            $note = new Note(null, null, null, null, null);
            $article = $note->getArticleIBestNote();
            $idArticleMostLiked = $article->getIdArticle();

            $articleMostLiked = new article($idArticleMostLiked, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

            $articleMostLikedInfo = $articleMostLiked->getArticleById();

            $article = new Article(null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

            $articles = $article->getAllArticle();
        }



        require_once(__DIR__ . "/../Views/article/allArticle.view.php");
    }

    public function updateArticle()
    {
        if ($_SESSION['user']['id_role'] == 1) {
            if (isset($_GET['id'])) {
                $idArticle = htmlspecialchars($_GET['id']);
                $article = new Article($idArticle, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

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
                        $title = htmlspecialchars($_POST['title']);
                        $description = htmlspecialchars($_POST['description']);
                        $priceExcludingTax = htmlspecialchars($_POST['priceExcludingTax']);
                        $type = htmlspecialchars($_POST['type']);
                        $quantity = htmlspecialchars($_POST['quantity']);
                        $material = htmlspecialchars($_POST['material']);
                        $tva = 20;

                        if ($myArticle->getImgArticle()) {
                            $img_path = $myArticle->getImgArticle();
                        } else {
                            $img_path = "";
                        }

                        $article = new Article($idArticle, $title, $description, $priceExcludingTax, $tva, $type, $quantity, $material, $img_path, null, null, null, null, null, null, null, null);

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

    public function deleteArticle()
    {
        if (isset($_POST['id'])) {
            $idArticle = htmlspecialchars($_POST['id']);
            $article = new Article($idArticle, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
            $myArticle = $article->getArticleById();
            $articleImg = $myArticle->getImgArticle();
            unlink("public/img/" . $articleImg);
            $article->deleteArticle();
            $this->redirectToRoute('/');
        }
    }

    public function infoArticle()
    {
        if (isset($_GET['id'])) {
            $idArticle = htmlspecialchars($_GET['id']);
            $article = new Article($idArticle, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
            $notes = new Note(null, null, null, $idArticle);

            //je récupère le nombre total d'avis sur mon article
            $numberNote = $notes->countNoteByArticleId();

            // je transforme en valeur INT 
            $numberNoteToInt = reset($numberNote);

            // j'additione toute les note de mon article
            $sumNote = $notes->sumArticleNote();

            // je le transforme en valeur INT
            $sumNoteInt = intval(reset($sumNote));

            // si mon article a des avis alors je divise la note par le nombre d'avis pour avoir la moyenne sur 5 sinon je retourne 0
            if ($numberNoteToInt !== 0) {
                $note = $sumNoteInt / $numberNoteToInt;
            } else {
                $note = 0;
            }

            $myArticle = $article->getArticleById();

            // si mon article n'existe pas je le renvoie vers la page 404
            if (!$myArticle) {
                $this->redirectToRoute('/404');
            } else {

                // je récupere mes articles qui sont de la même catégorie que l'article que l'utilisateur regarde
                $moreArticle = $myArticle->getArticleByCategory();

                // je récupere les commentaires de mon article
                $comments = $myArticle->getComment();
            }


            if (isset($_POST['idCommentDelete'], $_POST['idNoteDelete'])) {
                $idComment = htmlspecialchars($_POST['idCommentDelete']);
                $idNote = htmlspecialchars($_POST['idNoteDelete']);


                $comment = new Article($idArticle, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $idComment);

                $note = new Note($idNote, null, null, null);
                $note->deleteNote();
                $comment->deleteComment();
                header("Refresh:0");
            }


            // je regarde si mon utilisateur a ajouter au panier et en quelle quantité
            if (isset($_POST['addToCart'], $_POST['quantity'])) {

                // si il est connecté alors je récupere dans ma base de donnée
                if (isset($_SESSION['user'])) {
                    $quantity = htmlspecialchars($_POST['quantity']);
                    $idArticle = htmlspecialchars($_POST['addToCart']);
                    $idUser = $_SESSION['user']['idUser'];
                    $articelToCart = new Article(null, null, null, null, null, null, $quantity, null, null, null, null, null, $idUser, $idArticle, null, null, null);

                    // je regarde si mon utilisateur a déja l'article dans son panier
                    $articelToCart->checkIfAlreadyInCart();

                    // si oui alors j'augmente la quantité
                    if ($articelToCart->checkIfAlreadyInCart()) {
                        $articelToCart->addQuantityToCart();
                    } else {
                        // si non alors j'ajoute
                        $articelToCart->addToCart();
                    }
                } else {
                    $this->redirectToRoute('/login');
                }
            }

            require_once(__DIR__ . "/../Views/article/article.view.php");
        } else {
            $this->redirectToRoute('/404');
        }
    }

    public function addCommentArticle()
    {
        if (isset($_SESSION['user'])) {


            if (isset($_GET['id'])) {

                $idArticle = htmlspecialchars($_GET['id']);
                $article = new Article($idArticle, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

                $myArticle = $article->getArticleById();
                $notes = new Note(null, null, null, $idArticle);


                if (isset($_POST['comment'], $_POST['note'])) {
                    $this->check('comment', $_POST['comment']);

                    if (empty($this->arrayError)) {
                        $note = intval($_POST['note']);
                        $comment = $_POST['comment'];
                        $idUser = $_SESSION['user']['idUser'];
                        $creation_date = date("Y-m-d");
                        $article = new Article($idArticle, null, null, null, null, null, null, null, null, $comment, $creation_date, null, $idUser, $idArticle, null, null, null);
                        $myNote = new Note(null, $note, $idUser, $idArticle);

                        $this->showMsg("addedComment");

                        $myNote->addNoteToArticle();
                        $addComment = $article->addComment();


                        header("Refresh: 2; /allArticle");
                    }
                }
                require_once(__DIR__ . "/../Views/article/addCommentArticle.view.php");
            }
        } else {
            require_once(__DIR__ . "/../Views/security/login.view.php");
        }
    }

    public function editComment()
    {
        if (isset($_GET['id'], $_GET['idComment'], $_GET['idNote'])) {
            $idArticle = htmlspecialchars($_GET['id']);
            $idComment = htmlspecialchars($_GET['idComment']);
            $idNote = htmlspecialchars($_GET['idNote']);
            $article = new Article($idArticle, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $idComment);
            $note = new Note($idNote, null, null, null);

            $myArticle = $article->getArticleById();
            $comment = $article->getCommentById();
            $myNote = $note->getNoteByid();

            if (isset($_POST['editComment'], $_POST['editNote'])) {
                $this->check('editComment', $_POST['editComment']);

                if (empty($this->arrayError)) {
                    $updatedComment = $_POST['editComment'];
                    $updatetedNote = intval($_POST['editNote']);
                    $modificationDate = date("Y-m-d");

                    $newNote = new Note($idNote, $updatetedNote, null, null);
                    $newComment = new Article($idArticle, null, null, null, null, null, null, null, null, $updatedComment, null, $modificationDate, null, null, null, null, $idComment);

                    $this->showMsg('edditedComment');

                    $newNote->editNote();
                    $newComment->editComment();

                    header("Refresh: 2; /infoArticle?id=" . $idArticle . "");
                }
            }


            require_once(__DIR__ . "/../Views/article/editComment.view.php");
        }
    }

    public function showCart()
    {
        $idUser = $_SESSION['user']['idUser'];
        $article = new Article(null, null, null, null, null, null, null, null, null, null, null, null, $idUser, null, null, null, null);

        $articles = $article->getCartArticleByIdUser();


        if (isset($_POST['id'])) {
            $idArticle = htmlspecialchars($_POST['id']);

            $article = new Article(null, null, null, null, null, null, null, null, null, null, null, null, null, $idArticle, null, null, null);

            $article->deleteArticleFromCart();
            header("Refresh:0");
        }

        if (isset($_POST['quantityCart'], $_POST['idQuantity'])) {
            $quantityUpdated = htmlspecialchars($_POST['quantityCart']);
            $idArticle = htmlspecialchars($_POST['idQuantity']);

            $article = new Article(null, null, null, null, null, null, $quantityUpdated, null, null, null, null, null, $idUser, $idArticle, null, null, null);

            if ($quantityUpdated > 0) {
                $article->updateCartQuantityArticle();
            } else {
                $article->deleteArticleFromCart();
            }

            header("Refresh:0");
        }


        require_once(__DIR__ . "/../Views/cart.view.php");
    }
}
