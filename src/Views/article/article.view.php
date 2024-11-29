<?php

use App\Models\Users;
use App\Models\Note;

if (!$_SESSION) {
    require_once(__DIR__ . '/../partials/head.php');
} else {
    if ($_SESSION['user']['id_role'] == 1) {
        require_once(__DIR__ . '/../partials/adminHead.php');
    } else {
        require_once(__DIR__ . '/../partials/head.php');
    }
}


$priceWithoutTaxe = $myArticle->getPriceExcludingTax();
$tva = $myArticle->getTva();
$calcul = $priceWithoutTaxe / 100 * $tva;
$price = $priceWithoutTaxe + $calcul;
$comment = $myArticle->getNumberComment();
$numberComment = $comment["COUNT(content)"];

$idArtcile = $myArticle->getId();
?>

<section class="infoArticleContainer">
    <div class="flexContainer">
        <div>
            <img src="/public/img/<?= $myArticle->getImgArticle() ?>" alt="<?= $myArticle->getTitle() ?>" class="articleImg">
        </div>
        <div class="infoContainer">
            <h2 class="articleTitle"><?= $myArticle->getTitle() ?></h2>
            <p class="articleDescription"><?= $myArticle->getDescription() ?></p>
            <div class="articleNoteContainer">
                <div class="iconContainer">
                    <?php
                    if ($note) {
                    ?>
                        <i class="<?= $note == 0 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                        <i class="<?= $note < 2 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                        <i class="<?= $note < 3 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                        <i class="<?= $note < 4 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                        <i class="<?= $note < 5 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                    <?php
                    }
                    ?>
                </div>
                <?php
                if ($numberComment) {
                ?>
                    <a href="#comment" class="numberComment"><?= $numberComment ?> Avis</a>
                <?php
                }
                ?>
            </div>
            <div class="priceAndBtn">
                <p class="articlePrice"><?= $price ?>€</p>
                <form action="" method="POST">
                    <select name="quantity" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                    <input type="hidden" name="addToCart" value="<?= $myArticle->getId() ?>">
                    <button class="addToCartBtn"><i class="fa-solid fa-cart-plus iconAddToCart"></i>Ajouter au panier</button>
                </form>

            </div>
            <a href="/commentArticle?id=<?= $myArticle->getId() ?>" class="addCommentBtn">Ajoutez un commentaire</a>
        </div>
    </div>
</section>
<hr class="infoArticleHr">
<section class="moreArticle">
    <h3 class="moreArticleTitle">Vous pourrier aussi aimer :</h3>
    <div class="moreArticleContainer">
        <?php
        foreach ($moreArticle as $article) {
            $priceWithoutTaxe = $article->getPriceExcludingTax();
            $tva = $article->getTva();
            $calcul = $priceWithoutTaxe / 100 * $tva;
            $price = $priceWithoutTaxe + $calcul;
            if ($article->getTitle() !== $myArticle->getTitle()) {
        ?>
                <div class="cardMoreArticle">
                    <div>
                        <img src="/public/img/<?= $article->getImgArticle() ?>" alt="">
                    </div>

                    <h2><?= $article->getTitle() ?></h2>
                    <p><?= $price ?>€</p>
                    <a href="/infoArticle?id=<?= $article->getId() ?>" class="showMoreArticle">Voir plus</a>
                    <?php
                    if (isset($_SESSION['user'])) {


                        if ($_SESSION['user']['id_role'] == 1) {
                    ?>
                            <a href="/updateArticle?id=<?= $article->getId() ?>" class="updateArticleBtn">Modifier l'article</a>
                            <form action="/deleteArticle" method="POST">
                                <input type="hidden" name="id" id="id" value="<?= $article->getId() ?>">
                                <button type="submit" class="deleteArticleBtn">Suprimer l'article</button>
                            </form>
                    <?php
                        }
                    }
                    ?>
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>
<hr class="infoArticleHr">
<?php
if ($comments) {
?>
    <section class="commentContainer" id="comment">
        <h3>Les avis de nos clients :</h3>
        <?php
        foreach ($comments as $comment) {
            $userId = $comment->getIdUser();
            $user = new Users($userId, null, null, null, null, null, null, null, null, null, null, null, null);
            $myUser = $user->getUserImgById();
            $myUserImg = $myUser->getImg();

            $note = new Note(null, null, $userId, $idArtcile);
            $myNote = $note->getNoteByUserId();

            $date = date_create($comment->getCreationDate());
        ?>
            <div class="d-md-flex comment">
                <div class="userInfo">
                    <div class="d-flex">
                        <div class="userImgContainer">
                            <img src="/public/uploads/<?= $myUserImg ? $myUserImg : 'img_default.png' ?>" alt="user image">
                        </div>
                        <div>
                            <h4 class="commentUserName"><?= $comment->getFirstname() ?> <?= $comment->getLastname() ?></h4>
                            <?php
                            if ($note) {
                            ?>
                                <div class="iconContainer">
                                    <i class="<?= $myNote->getValue() == 0 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                    <i class="<?= $myNote->getValue() < 2 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                    <i class="<?= $myNote->getValue() < 3 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                    <i class="<?= $myNote->getValue() < 4 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                    <i class="<?= $myNote->getValue() < 5 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                </div>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if (!$comment->getModificationDate()) {
                    ?>
                        <p class="commentUserDate">Avis émis le : <?= date_format($date, "d-m-Y") ?></p>
                    <?php
                    } else {
                        $modificationDate = date_create($comment->getModificationDate());
                    ?>
                        <p class="commentUserDate">Modifié le : <?= date_format($modificationDate, "d-m-Y") ?></p>
                    <?php
                    }
                    ?>
                </div>

                <div>
                    <p class="commentUserComment"><?= $comment->getContent() ?></p>
                    <?php
                    if (isset($_SESSION['user']['idUser'])) {


                        if ($_SESSION['user']['idUser'] == $comment->getIdUser()  || $_SESSION['user']['id_role'] == 1) {

                    ?>
                            <div class="d-flex">
                                <form action="" method="POST">
                                    <input type="hidden" id="idDelete" name="idCommentDelete" value="<?= $comment->getIdComment() ?>">
                                    <input type="hidden" id="idDeleteNote" name="idNoteDelete" value="<?= $myNote->getId() ?>">
                                    <button class="deleteCommentBtn" type="submit" class="btn">Supprimer</button>
                                </form>
                                <?php
                                if ($_SESSION['user']['idUser'] == $comment->getIdUser()) {
                                ?>
                                    <a href="/editComment?id=<?= $myArticle->getId() ?>&idComment=<?= $comment->getIdComment() ?>&idNote=<?= $myNote->getId() ?>" class="editCommentBtn">Modifier le commentaire</a>
                                <?php
                                }
                                ?>
                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>

        <?php
        }

        ?>
    </section>
<?php
}

include_once(__DIR__ . "/../partials/footer.php");
?>