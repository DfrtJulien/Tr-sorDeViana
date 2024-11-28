<?php
if (!$_SESSION) {
    require_once(__DIR__ . '/../partials/head.php');
} else {
    if ($_SESSION['user']['id_role'] == 1) {
        require_once(__DIR__ . '/../partials/adminHead.php');
    } else {
        require_once(__DIR__ . '/../partials/head.php');
    }
}

use App\Models\Note;
?>

<section class="articlesSection d-md-flex">
    <div class="filterContainer">
        <div>
            <h3>TYPE :</h3>
            <div>
                <input type="checkbox" id="necklace" name="necklace" />
                <label for="necklace">Colliers</label>
            </div>
            <div>
                <input type="checkbox" id="ring" name="ring" />
                <label for="ring">Bagues</label>
            </div>
            <div>
                <input type="checkbox" id="bracelet" name="bracelet" />
                <label for="bracelet">Bracelets</label>
            </div>
            <div>
                <input type="checkbox" id="earrings" name="earrings" />
                <label for="earrings">Boucles</label>
            </div>
            <div>
                <input type="checkbox" id="chale" name="chale" />
                <label for="chale">Châles</label>
            </div>
        </div>
        <div>
            <h3>MATIÈRE :</h3>
            <div>
                <input type="checkbox" id="gold" name="gold" />
                <label for="gold">Or</label>
            </div>
            <div>
                <input type="checkbox" id="silver" name="silver" />
                <label for="silver">Argent</label>
            </div>
        </div>
        <button class="filterBtn">Filtrer</button>
    </div>
    <div class="articleContainer">
        <?php
        if (isset($articlesByCategory)) {
            foreach ($articlesByCategory as $article) {
                $comment = $article->getNumberComment();
                $numberComment = $comment["COUNT(content)"];
                $priceWithoutTaxe = $article->getPriceExcludingTax();
                $tva = $article->getTva();
                $calcul = $priceWithoutTaxe / 100 * $tva;
                $price = $priceWithoutTaxe + $calcul;

                $idArticle = $article->getId();

                $notes = new Note(null, null, null, $idArticle);
                $numberNote = $notes->countNoteByArticleId();
                $numberNoteToInt = reset($numberNote);
                $sumNote = $notes->sumArticleNote();
                $sumNoteInt = intval(reset($sumNote));

                if ($numberNoteToInt !== 0) {
                    $note = $sumNoteInt / $numberNoteToInt;
                } else {
                    $note = 0;
                }
        ?>
                <div class="cardArticle">
                    <div class="articleImg">
                        <img src="public/img/<?= $article->getImgArticle() ?>" alt="">
                    </div>
                    <h2><?= $article->getTitle() ?></h2>
                    <div class="d-flex mt-3">
                        <?php
                        if ($note) {
                        ?>
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
                        }
                        if ($numberComment) {
                        ?>
                            <a href="/infoArticle?id=<?= $article->getId() ?>#comment" class="numberCommentLink"><?= $numberComment ?> avis</a>
                        <?php
                        }
                        ?>
                    </div>
                    <p><?= $price ?>€</p>
                    <div clss="seeMoreContainer">
                        <a href="/infoArticle?id=<?= $article->getId() ?>" class="showMoreArticle">Voir plus</a>


                        <?php
                        if ($_SESSION['user']['id_role'] == 1) {
                        ?>
                            <a href="/updateArticle?id=<?= $article->getId() ?>" class="updateArticleBtn">Modifier l'article</a>
                            <form action="/deleteArticle" method="POST">
                                <input type="hidden" name="id" id="id" value="<?= $article->getId() ?>">
                                <button type="submit" class="deleteArticleBtn">Suprimer l'article</button>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>

            <?php
            }
        } else {


            foreach ($articles as $article) {
                $comment = $article->getNumberComment();
                $numberComment = $comment["COUNT(content)"];
                $priceWithoutTaxe = $article->getPriceExcludingTax();
                $tva = $article->getTva();
                $calcul = $priceWithoutTaxe / 100 * $tva;
                $price = $priceWithoutTaxe + $calcul;

                $idArticle = $article->getId();

                $notes = new Note(null, null, null, $idArticle);
                $numberNote = $notes->countNoteByArticleId();
                $numberNoteToInt = reset($numberNote);
                $sumNote = $notes->sumArticleNote();
                $sumNoteInt = intval(reset($sumNote));

                if ($numberNoteToInt !== 0) {
                    $note = $sumNoteInt / $numberNoteToInt;
                } else {
                    $note = 0;
                }
            ?>
                <div class="cardArticle">
                    <div class="articleImg">
                        <img src="public/img/<?= $article->getImgArticle() ?>" alt="">
                    </div>
                    <h2><?= $article->getTitle() ?></h2>
                    <div class="d-flex mt-3">
                        <?php
                        if ($note) {
                        ?>
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
                        }
                        if ($numberComment) {
                        ?>
                            <a href="/infoArticle?id=<?= $article->getId() ?>#comment" class="numberCommentLink"><?= $numberComment ?> avis</a>
                        <?php
                        }
                        ?>
                    </div>
                    <p><?= $price ?>€</p>
                    <div clss="seeMoreContainer">
                        <a href="/infoArticle?id=<?= $article->getId() ?>" class="showMoreArticle">Voir plus</a>


                        <?php
                        if ($_SESSION['user']['id_role'] == 1) {
                        ?>
                            <a href="/updateArticle?id=<?= $article->getId() ?>" class="updateArticleBtn">Modifier l'article</a>
                            <form action="/deleteArticle" method="POST">
                                <input type="hidden" name="id" id="id" value="<?= $article->getId() ?>">
                                <button type="submit" class="deleteArticleBtn">Suprimer l'article</button>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </div>

        <?php
            }
        }
        ?>
    </div>
</section>
<?php
include_once(__DIR__ . "/../partials/footer.php");
?>