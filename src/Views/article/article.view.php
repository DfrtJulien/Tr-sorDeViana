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
          <h2><?= $article->getTitle() ?></h2>
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
    }
    ?>
  </div>
</section>

<?php
include_once(__DIR__ . "/../partials/footer.php");
?>