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
    <div class="article">
      <div class="d-flex">
        <div class="imgCart">
          <img src="/public/img/collier_argent_coeur_2.png" alt="">
        </div>
        <div class="artcileCartInfo">
          <h2>Collier en Or “Coeur de Viana” en filligran 10cm</h2>
          <div class="articleCartNote"></div>
          <p>150€</p>
        </div>
      </div>

    </div>
  </div>
</section>
<?php
include_once(__DIR__ . '/partials/footer.php');
?>