<?php

require_once(__DIR__ . '/../partials/head.php');

?>
<section class="articleHeader">
    <div class="articles">
        <div class="articleText">
            <h1>CATALOGUE</h1>
            <p>Découvrez nos nouveautés en bijoux, conçues pour sublimer chaque instant. Des créations uniques alliant modernité et élégance, avec des matériaux nobles et des designs raffinés. Que ce soit pour un cadeau spécial ou pour vous faire plaisir, nos nouvelles collections répondront à toutes vos attentes.</p>
        </div>
        <div class="articleHeaderImg">
            <img src="/public/img/allArticleHeader.jpg" alt="3 femmes avec des bagues">
        </div>
    </div>
</section>
<section class="mostLikedArticle">
    <h2>Notre produit phare</h2>
    <div class="mostLikedArticleContainer">
        <?php
        if ($articleMostLikedInfo) {
        ?>
            <div class="mostLikedArticleImg">
                <img src="/public/img/<?= $articleMostLikedInfo->getImgArticle() ?>" alt="<?= $articleMostLikedInfo->getTitle() ?>">
            </div>
            <div class="mostLikedArticleInfo">
                <h3><?= $articleMostLikedInfo->getTitle() ?></h3>
                <p><?= $articleMostLikedInfo->getPriceExcludingTax() ?>€</p>
                <a href="/infoArticle?id=<?= $articleMostLikedInfo->getId() ?>" class="showMoreBtn">Voir plus</a>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<section class="allArticle">
    <?php
    if ($articles) {
        $numberArtcile = count($articles);
    ?>
        <h4><?= $numberArtcile ?> PRODUITS</h4>
        <div class="allArticleFlex">
            <?php
            foreach ($articles as $article) {

            ?>
                <a href="/infoArticle?id=<?= $article->getId() ?>">
                    <div class="articleCard">
                        <div class="articleCardImg">
                            <img src="/public/img/<?= $article->getImgArticle() ?>" alt="<?= $article->getTitle() ?>">
                        </div>
                        <div class="articleCardInfo">
                            <h5><?= $article->getTitle() ?></h5>
                            <p><?= $article->getPriceExcludingTax() ?> €</p>
                        </div>
                    </div>
                </a>
        <?php
            }
        }
        ?>
        </div>
</section>
<?php
include_once(__DIR__ . "/../partials/footer.php");
?>