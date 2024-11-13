<?php
if (!$_SESSION) {
  require_once(__DIR__ . '/../partials/head.php');
} else {
  if ($_SESSION['user']['id_role'] == 1) {
    require_once(__DIR__ . '/../partials/adminHead.php');
  } else {
    require_once(__DIR__ . '/../partials/head.php');
  }
}

?>

<div class="container">
  <form method="POST" class="addArticleForm">
    <span class="form-span"></span>
    <div class="p-2">
      <label for="title">Titre : </label>
      <input type="text" name="title" id="title" value="<?= $myArticle->getTitle() ?>">
      <?php
      if (isset($this->arrayError['title'])) {
      ?>
        <div class="alert alert-danger mt-2" role="alert">
          <p class='text-danger'><?= $this->arrayError['title'] ?></p>
        </div>
      <?php
      } ?>
    </div>
    <div class="p-2">
      <label for="description">Description : </label>
      <textarea type="text" name="description" id="description"><?= $myArticle->getDescription()  ?></textarea>
      <?php
      if (isset($this->arrayError['description'])) {
      ?>
        <div class="alert alert-danger mt-2" role="alert">
          <p class='text-danger'><?= $this->arrayError['description'] ?></p>
        </div>
      <?php
      } ?>
    </div>
    <div class="p-2">
      <label for="priceExcludingTax">Prix sans Taxe : (en €)</label>
      <input type="number" name="priceExcludingTax" id="priceExcludingTax" value="<?= $myArticle->getPriceExcludingTax() ?>">
      <?php
      if (isset($this->arrayError['priceExcludingTax'])) {
      ?>
        <div class=" alert alert-danger mt-2" role="alert">
          <p class='text-danger'><?= $this->arrayError['priceExcludingTax'] ?></p>
        </div>
      <?php
      } ?>
    </div>
    <div class="p-2">
      <label for="type">Type : </label>
      <select name="type" id="type">
        <option value="<?= $myArticle->getCategory() ?>"><?= $myArticle->getCategory() ?></option>
        <option value=" collier">Collier</option>
        <option value="boucles">Boucles d'orreiles</option>
        <option value="chale">Chale</option>
      </select>
      <?php
      if (isset($this->arrayError['type'])) {
      ?>
        <div class="alert alert-danger mt-2" role="alert">
          <p class='text-danger'><?= $this->arrayError['type'] ?></p>
        </div>
      <?php
      } ?>
    </div>
    <div class="p-2">
      <label for="quantity">Quantité en stock: </label>
      <input type="number" name="quantity" id="quantity" value="<?= $myArticle->getQuantity() ?>">
      <?php
      if (isset($this->arrayError['quantity'])) {
      ?>
        <div class=" alert alert-danger mt-2" role="alert">
          <p class='text-danger'><?= $this->arrayError['quantity'] ?></p>
        </div>
      <?php
      } ?>
    </div>
    <div class="p-2">
      <label for="material">Matériel du bijoux : </label>
      <select name="material" id="material" value="<?= $myArticle->getMaterial() ?>">
        <option value="<?= $myArticle->getMaterial() ?>"><?= $myArticle->getMaterial() ?></option>
        <option value="or">or</option>
        <option value="argent">argent</option>
        <option value="coton">coton</option>
      </select>
      <?php
      if (isset($this->arrayError['material'])) {
      ?>
        <div class="alert alert-danger mt-2" role="alert">
          <p class='text-danger'><?= $this->arrayError['material'] ?></p>
        </div>
      <?php
      } ?>
    </div>
    <button type="submit" class="submitBtn my-3">Modifier l'article</button>
  </form>
</div>
<?php
include_once(__DIR__ . "/../partials/footer.php");
?>