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

<section class="selectionContainer d-flex">
    <!-- <div class="d-flex"> -->
    <a href="/allArticle?category=collier">
        <div class="homeImgContainer">
            <a href="/allArticle?category=collier" class="homeLink title">Colliers</a>
            <img src="/public//img//img_collar_home.png" alt="photo de colliers">
        </div>
    </a>
    <div class="homeImgContainer">
        <a href="/allArticle?category=boucles" class="homeLink title">Boucles</a>
        <img src="/public//img//img_boucle_home.png" alt="photo de boucles">
    </div>
    <div class="homeImgContainer">
        <a href="/allArticle?category=chale" class="homeLink title">Châles</a>
        <img src="/public//img//img_chale_home.png" alt="photo de châles">
    </div>
    </div>
</section>
<section class="aboutContainer">
    <div class="d-md-flex">
        <div>
            <img src="/public/img/image-carrousel-2.png" alt="photo d'une femme fortant un colier en or">
        </div>
        <div class="aboutInfo">
            <h3 class="title aboutTitle">Qui Somme-nous ?</h3>
            <p class="aboutText">Originaire de Viana do Castelo, j'ai grandi entouré des symboles et traditions de ma région. Le "Cœur de Viana" a toujours représenté pour moi l'amour et l'héritage de ma culture. C'est pourquoi j'ai fondé ce site, pour partager avec le monde la beauté et la signification profonde de ces bijoux emblématiques, fabriqués à la main avec passion et authenticité.</p>
        </div>
    </div>
</section>
<?php
include_once(__DIR__ . '/partials/footer.php');
?>