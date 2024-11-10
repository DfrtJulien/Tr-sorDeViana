<?php
require_once(__DIR__ . "/../partials/head.php");
$priceWithoutTaxe = $myArticle->getPriceExcludingTax();
$tva = $myArticle->getTva();
$calcul = $priceWithoutTaxe / 100 * $tva;
$price = $priceWithoutTaxe + $calcul;
?>

<section class="infoArticleContainer">
  <div class="flexContainer">
    <div>
      <img src="" alt="<?= $myArticle->getTitle() ?>" class="articleImg">
    </div>
    <div class="infoContainer">
      <h2 class="articleTitle"><?= $myArticle->getTitle() ?></h2>
      <p class="articleDescription"><?= $myArticle->getDescription() ?></p>
      <div class="priceAndBtn">
        <p class="articlePrice"><?= $price ?>€</p>
        <button class="addToCartBtn"><i class="fa-solid fa-cart-plus iconAddToCart"></i>Ajouter au panier</button>
      </div>
    </div>
  </div>
</section>
<hr class="infoArticleHr">

<?php
include_once(__DIR__ . "/../partials/footer.php");
?>