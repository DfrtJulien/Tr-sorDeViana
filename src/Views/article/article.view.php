<?php

use App\Models\User;
use App\Models\Note;

require_once(__DIR__ . '/../partials/head.php');

?>

<section class="articleInfo">
    <div class="myArticleFlex">
        <div class="myArticleImg">
            <img src="/public/img/<?= $myArticle->getImgArticle() ?>" alt="<?= $myArticle->getTitle() ?>">
        </div>
        <div class="myArticleInfo">
            <h1><?= $myArticle->getTitle() ?></h1>
            <p><?= $myArticle->getDescription() ?></p>
            <?php
            if (isset($note)) {
            ?>
                <div class="myArticleNote">
                    <div class="myArticleIcon">
                        <i class="<?= $note == 0 ? 'fa-regular' : 'fa-solid' ?> fa-star ratingIcon"></i>
                        <i class="<?= $note < 2 ? 'fa-regular' : 'fa-solid' ?> fa-star ratingIcon"></i>
                        <i class="<?= $note < 3 ? 'fa-regular' : 'fa-solid' ?> fa-star ratingIcon"></i>
                        <i class="<?= $note < 4 ? 'fa-regular' : 'fa-solid' ?> fa-star ratingIcon"></i>
                        <i class="<?= $note < 5 ? 'fa-regular' : 'fa-solid' ?> fa-star ratingIcon"></i>
                    </div>
                    <p class="myRecipeNumberComment"><?= $numberNoteToInt ?> Avis</p>
                </div>
                <p class="myArticlePrice"><?= $myArticle->getPriceExcludingTax() ?> €</p>

            <?php
            }
            ?>
            <form action="" method="POST" class="addToCart">
                <input type="hidden" name="addToCart" value="<?= $myArticle->getId() ?>">
                <label for="quantity">Quantité</label>
                <select name="quantity" id="quantity" class="addCartSelect" style="width:200px;">
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
                <button type="submit" class="showMoreBtn">Ajouter au panier</button>
            </form>
            <a href="commentArticle?id=<?= $myArticle->getId() ?>" class="activeFormA">Ajouter un commentaire</a>
        </div>

    </div>
</section>
<section class="moreArticle">
    <h3>Vous pourriez aussi aimer :</h3>
    <div class="moreArticleFlex" id="moreArticle">
        <?php
        if (isset($moreArticle)) {
            foreach ($moreArticle as $article) {
        ?>
                <div class="moreArticleArticle">
                    <a href="/infoArticle?id=<?= $article->getId() ?>">
                        <div>
                            <img src="/public/img/<?= $article->getImgArticle() ?>" alt="<?= $article->getTitle() ?>">
                        </div>
                        <div>
                            <h5><?= $article->getTitle() ?></h5>
                            <p><?= $article->getPriceExcludingTax() ?> €</p>
                        </div>
                    </a>
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>
<section class="articleComment">
    <h3>Les avis de nos clients :</h3>
    <div class="comments">
        <?php
        if (isset($comments)) {
            foreach ($comments as $comment) {
                $id_user = $comment->getIdUser();
                $notes = new Note(null, null, $id_user, $idArticle);
                $users = new User($id_user, null, null, null, null, null, null, null, null, null, null, null, null);

                $user_note = $notes->getNoteByUserId();
                $user = $users->getUserPorfile();


                $commentDate = $comment->getCreationDate();
                $commentUpdated = $comment->getModificationDate();


        ?>
                <div class="comment">
                    <div class="commentUserInfo">
                        <div class="commentUserImgName">
                            <div class="commentUserImg">
                                <img src="/public/uploads/<?= $user->getImg() ? $user->getImg()  : "img_default.png" ?>" alt="photo de profile de <?= $comment->getFirstName() . " " . $comment->getLastName() ?> ">
                            </div>
                            <div>
                                <h4><?= $comment->getFirstName() . " " . $comment->getLastName() ?></h4>
                                <div>
                                    <?php
                                    if (isset($user_note)) {
                                    ?>
                                        <div class="userNote">
                                            <i class="<?= $user_note->getValue() == 0 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                            <i class="<?= $user_note->getValue() < 2 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                            <i class="<?= $user_note->getValue() < 3 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                            <i class="<?= $user_note->getValue() < 4 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                            <i class="<?= $user_note->getValue() < 5 ? 'fa-regular' : 'fa-solid' ?> fa-star"></i>
                                        </div>

                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <p class="commentDate">Avis émis le <?= $commentUpdated ? $commentUpdated  : $commentDate ?></p>
                        <div class="userCommentContent">
                            <p><?= $comment->getContent() ?></p>
                            <?php
                            if (isset($_SESSION['user'])) {

                                if ($_SESSION['user']['idUser'] == $id_user || $_SESSION['user']['id_role'] == "1") {
                            ?>
                                    <div class="commentBtnContainer">
                                        <form action="" method="POST">
                                            <input type="hidden" id="idDelete" name="idCommentDelete" value="<?= $comment->getIdComment() ?>">
                                            <input type="hidden" id="idDeleteNote" name="idNoteDelete" value="<?= $user_note->getId() ?>">
                                            <button class="showMoreBtn" type="submit" class="btn">Supprimer</button>
                                        </form>
                                        <?php
                                        if ($_SESSION['user']['idUser'] == $id_user) {
                                        ?>
                                            <a href="/editComment?id=<?= $idArticle ?>&idComment=<?= $comment->getIdComment() ?>&idNote=<?= $user_note->getId() ?>" class="activeFormA">Modifier le commentaire</a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                <?php
                                }

                                ?>
                        </div>
                    </div>
                </div>
    <?php
                            }
                        }
                    }
    ?>
    </div>
</section>
<?php
include_once(__DIR__ . "/../partials/footer.php");
?>