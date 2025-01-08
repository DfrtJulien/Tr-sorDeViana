<?php
if (!$_SESSION) {
    require_once(__DIR__ . '/partials/head.php');
} else {
    if ($_SESSION['user']['id_role'] == 1) {
        require_once(__DIR__ . '/partials/adminHead.php');
    } else {
        require_once(__DIR__ . '/partials/head.php');
    }
}

?>

<section class="header">
    <div class="headerText">
        <h1 class="headerTitle">Trésor de Viana</h1>
        <p>Éclat et raffinement à portée de main.</p>
    </div>
    <img src="/public/img/header-img.png" alt="woman with jewelry" class="header-img">
</section>
<div class="homeJeweleryText">
    <p>Nos bijoux sont conçus avec une attention minutieuse aux détails, alliant matériaux de haute qualité et savoir-faire exceptionnel. Chaque pièce est un symbole de raffinement et de durabilité, créée pour illuminer vos moments spéciaux et résister à l'épreuve du temps</p>
</div>
<section class="composition">
    <div class="compositionTextImg">
        <div class="compositionText">
            <p>Nos Composition</h2>
            <p>Des bijoux exquis qui captivent le regard et subliment chaque instant. Élégance, beauté et raffinement à portée de main pour révéler votre éclat.</p>
        </div>
        <div class="compositionImg">
            <div class="compositionImgContainer">
                <img src="/public/img/compositionImg1.jpg" alt="gold jewelry">
            </div>
            <div class="compositionImgContainer">
                <img src="/public/img/compositionImg2.jpg" alt="gold jewelry">
            </div>
        </div>
    </div>
    <div class="compositionArticles">
        <?php
        foreach ($recentArticles as $article) {

        ?>
            <div class="composistionProduct">
                <a href="/infoArticle?id=<?= $article->getId() ?>">
                    <img src="/public/img/<?= $article->getImgArticle() ?>" alt="<?= $article->getTitle() ?>">
                    <div class="compositionArticleInfo">
                        <h5><?= $article->getTitle() ?></h5>
                        <p><?= $article->getPriceExcludingTax() ?> €</p>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</section>
<section class="collection">
    <div>
        <h2>Nos Collection</h2>
    </div>
    <div class="collectionImgContainer">
        <div class="swiffy-slider">
            <ul class="slider-container">
                <li><a><img src="/public/img/img_collar_home.png" alt="collar" style="max-width: 100%;height: auto;">Colliers</a></li>
                <li><a><img src="/public/img/img_boucle_home.png" alt="boucles" style="max-width: 100%;height: auto;">Boucles</a></li>
                <li><a><img src="/public/img/img_bracelet_home.jpg" alt="bracelets" style="max-width: 100%;height: auto;">Bracelets</a></li>
                <li><a><img src="/public/img/img_ring_home.jpg" alt="ring" style=" max-width: 100%;height: auto;">Bagues</a></li>
            </ul>

            <button type="button" class="slider-nav"></button>
            <button type="button" class="slider-nav slider-nav-next"></button>

            <div class="slider-indicators">
                <button class="active"></button>
                <button></button>
                <button></button>
            </div>
        </div>
        <div class="collectionImgContainerLg">
            <div class="collectionImg">
                <a><img src="/public/img/img_boucle_home.png" alt="boucles" style="max-width: 100%;height: auto;"></a>
                <h5>Boucles</h5>
            </div>

            <div class="collectionImg">
                <a><img src="/public/img/img_bracelet_home.jpg" alt="bracelets" style="max-width: 100%;height: auto;"></a>
                <h5>Bracelets</h5>
            </div>
            <div class="collectionImg collectionActive">
                <a><img src="/public/img/img_collar_home.png" alt="collar" style="max-width: 100%;height: auto;"></a>
                <h5>Colliers</h5>
            </div>
            <div class="collectionImg">
                <a><img src="/public/img/img_ring_home.jpg" alt="ring" style=" max-width: 100%;height: auto;"></a>
                <h5>Bagues</h5>
            </div>
            <div class="collectionImg">
                <a><img src="/public/img/img_chale_home.jpg" alt="chale" style=" max-width: 100%;height: auto;"></a>
                <h5>Chales</h5>
            </div>
        </div>
    </div>
</section>
<section class="selection">
    <div>
        <h2>Notre selection pour vous</h2>
    </div>
    <div class="selectionArticle">
        <?php

        foreach ($selectionArticles as $article) {
            $img = $article->getImgArticle();

            if ($img) {


        ?>
                <div class="selectionArticleContainer">
                    <a href="/infoArticle?id=<?= $article->getId() ?>"><img src="/public/img/<?= $article->getImgArticle() ?>" alt=""></a>
                    <div class="selectionArticleInfo">
                        <h5><?= $article->getTitle() ?></h5>
                        <p><?= $article->getPriceExcludingTax() ?> €</p>
                    </div>
                </div>
        <?php
            }
        }

        ?>
    </div>
</section>
<?php
include_once(__DIR__ . '/partials/footer.php');
?>