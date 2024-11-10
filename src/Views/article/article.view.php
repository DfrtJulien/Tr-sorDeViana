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
<hr class="infoArticleHr">
<?php
if ($comments) {
?>
  <section class="commentContainer">
    <h3>Les avis de nos clients :</h3>
    <?php
    foreach ($comments as $comment) {
      $date = date_create($comment->getCreationDate());
    ?>
      <div class="d-md-flex comment">
        <div class="userInfo">
          <div class="d-flex">
            <div class="userImgContainer">
              <img src="" alt="user image">
            </div>
            <div>
              <h4 class="commentUserName"><?= $comment->getFirstname() ?> <?= $comment->getLastname() ?></h4>
              <p class="commentUserNote">User note</p>
            </div>
          </div>
          <p class="commentUserDate">Avis émis le : <?= date_format($date, "d-m-Y") ?></p>
        </div>

        <div>
          <p class="commentUserComment"><?= $comment->getContent() ?></p>
        </div>
      </div>
    <?php
    }
    ?>
  </section>
<?php
}


include_once(__DIR__ . "/../partials/footer.php");
