<?php
require_once(__DIR__ . "/../partials/head.php");
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
        foreach ($articles as $article) {
            $priceWithoutTaxe = $article->getPriceExcludingTax();
            $tva = $article->getTva();
            $calcul = $priceWithoutTaxe / 100 * $tva;
            $price = $priceWithoutTaxe + $calcul;
        ?>
            <div class="cardArticle">
                <h1><?= $article->getTitle() ?></h1>
                <p><?= $price ?>€</p>
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

        <?php
        }
        ?>
    </div>
</section>
<?php
include_once(__DIR__ . "/../partials/footer.php");
?>