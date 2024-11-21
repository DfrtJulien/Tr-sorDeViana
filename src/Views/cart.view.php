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
<section class="cartContainer">
  <div class="cart">
    <?php
    if ($articles) {
      foreach ($articles as $article) {
    ?>
        <div class="article">
          <div class="d-flex">
            <div class="imgCart">
              <img src="/public/img/<?= $article->getImgArticle() ? $article->getImgArticle() : "diablo.png" ?>" alt="image de <?= $article->getTitle() ?>">
            </div>
            <div class="artcileCartInfo">
              <h2><?= $article->getTitle() ?></h2>
              <div class="articleCartNote"></div>
              <p class="cartPrice"><?= $article->getPriceExcludingTax() ?>€</p>
            </div>
            <form method="POST">
              <input type="hidden" name="id" id="id" value="<?= $article->getId() ?>">
              <button type="submit" class="deleteArticleBtn">Suprimer du panier</button>
            </form>
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