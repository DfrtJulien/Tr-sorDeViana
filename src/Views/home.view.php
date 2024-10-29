<?php
    require_once (__DIR__ . '/partials/head.php');
?>

<section class="selectionContainer d-flex">
    <!-- <div class="d-flex"> -->
            <div class="homeImgContainer">
                <a href="#" class="homeLink title">Colliers</a>
                <img src="/public//img//img_collar_home.png" alt="photo de colliers">
            </div>
            <div class="homeImgContainer">
                <a href="#" class="homeLink title">Boucles</a>
                <img src="/public//img//img_boucle_home.png" alt="photo de boucles">
            </div>
            <div class="homeImgContainer">
                <a href="#" class="homeLink title">Châles</a>
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
    include_once (__DIR__ . '/partials/footer.php');
?>