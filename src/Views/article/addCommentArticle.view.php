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
      <form method="POST">
        <label for="comment">Veuillez entrer votre commentaire :</label>
        <textarea name="comment" id="comment"></textarea>
        <?php
        if (isset($this->arrayError['comment'])) {
        ?>
          <div class="alert alert-danger" role="alert">
            <p class='text-danger'><?= $this->arrayError['comment'] ?></p>
          </div>
        <?php
        } ?>
        <button type="submit" class="addComentBtn">Ajoutez un commentaire</button>
      </form>
    </div>
  </div>
</section>

<?php
include_once(__DIR__ . "/../partials/footer.php");
?>