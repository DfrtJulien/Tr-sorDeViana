<?php

require_once(__DIR__ . '/partials/head.php');


?>
<section class="cartContainer">
  <div class="cart">
    <?php
    if ($articles) {
      $price = 0;
      foreach ($articles as $article) {
        $quantity = $article->getQuantity();
        $price += $article->getPriceExcludingTax()  * $quantity;

    ?>
        <div class="article">
          <div class="d-flex">
            <div class="imgCart">
              <img src="/public/img/<?= $article->getImgArticle() ? $article->getImgArticle() : "diablo.png" ?>" alt="image de <?= $article->getTitle() ?>">
            </div>
            <div class="artcileCartInfo">
              <h2><?= $article->getTitle() ?></h2>
              <div class="articleCartNote"></div>
              <p class="cartPrice"><?= $article->getPriceExcludingTax() * $quantity ?>€</p>
              <form method="POST">
                <select name="quantityCart" id="quantityCart">
                  <option value="<?= $quantity ?>"><?= $quantity ?></option>
                  <?php
                  for ($i = 0; $i < $quantity; $i++) {
                  ?>
                    <option value="<?= $i ?>"><?= $i ?></option>
                  <?php
                  }
                  ?>
                </select>
                <input type="hidden" name="idQuantity" id="idQuantity" value="<?= $article->getId() ?>">
                <button type="submit">Modifier</button>
              </form>

            </div>
            <form method="POST">
              <input type="hidden" name="id" id="id" value="<?= $article->getId() ?>">
              <button type="submit" class="deleteArticleBtn">Suprimer du panier</button>
            </form>
          </div>

        </div>
      <?php
      }
      ?>
      <div class="d-flex mt-5">
        <p class="cartPrice"><?= $price ?>€</p>
        <a href="#" class="buyBtn">Passer la commande</a>
      </div>
  </div>
</section>
<?php
    } else {
?>
  <div class="article">
    <div class="emptyCart">
      <h2>Vous n'avez pas encore d'article dans le panier.</h2>
    </div>
  </div>
  </section>
<?php
    }


    include_once(__DIR__ . '/partials/footer.php');
