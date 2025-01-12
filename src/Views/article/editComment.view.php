<?php

require_once(__DIR__ . '/../partials/head.php');

?>

<section class="articleInfo">
  <div class="myArticleFlex">
    <div class="myArticleImg">
      <img src="/public/img/<?= $myArticle->getImgArticle() ?>" alt="<?= $myArticle->getTitle() ?>">
    </div>
    <div class="myArticleInfo">
      <h1><?= $myArticle->getTitle() ?></h1>
      <p><?= $myArticle->getDescription() ?></p>
      <p class="myArticlePrice"><?= $myArticle->getPriceExcludingTax() ?> €</p>
    </div>

  </div>

  </div>
</section>
<section class="addComment">
  <h1>Modifier votre note et commentaire</h1>
  <?php
  if (isset($this->arraySucces['edditedComment'])) {
  ?>
    <div class="alert alert-success succesContainer" role="alert">
      <p class='text-success'><?= $this->arraySucces['edditedComment'] ?></p>
    </div>
  <?php
  }

  ?>
  <form action="" method="POST">
    <label for="editNote">Entrez votre note</label>
    <select name="editNote" id="editNote" class="addNoteSelect" style="width: 200px">
      <option value="<?= $myNote->getValue() ?>"><?= $myNote->getValue() ?></option>
      <option value="0">0</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <label for="editComment">Entrez votre commentaire</label>
    <textarea name="editComment" id="editComment"><?= $comment->getContent() ?></textarea>
    <button type="submit" class="showMoreBtn">Envoyer</button>
  </form>
</section>

<?php
include_once(__DIR__ . "/../partials/footer.php");
?>