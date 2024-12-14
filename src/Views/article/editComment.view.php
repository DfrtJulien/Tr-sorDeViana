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

<section class="infoArticleContainer">
  <div class="flexContainer">
    <div>
      <img src="/public/img/<?= $myArticle->getImgArticle() ?>" alt="<?= $myArticle->getTitle() ?>" class="articleImg">
    </div>
    <div class="infoContainer">
      <h2 class="articleTitle"><?= $myArticle->getTitle() ?></h2>
      <p class="articleDescription"><?= $myArticle->getDescription() ?></p>
      <form method="POST">
        <label for="editNote">Modifier votre note</label>
        <select name="editNote" id="editNote">
          <option value="<?= $myNote->getValue() ?>"><?= $myNote->getValue() ?></option>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
        <label for="editComment">Modifier votre commentaire :</label>
        <textarea name="editComment" id="editComment"><?= $comment->getContent() ?></textarea>
        <?php
        if (isset($this->arrayError['editComment'])) {
        ?>
          <div class="alert alert-danger" role="alert">
            <p class='text-danger'><?= $this->arrayError['editComment'] ?></p>
          </div>
        <?php
        } ?>
        <button type="submit" class="addComentBtn">Modifier son commentaire</button>
      </form>
    </div>
  </div>
</section>

<?php
include_once(__DIR__ . "/../partials/footer.php");
?>