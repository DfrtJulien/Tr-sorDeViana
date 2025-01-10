<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    Trésor De Viana
  </title>
  <script src="https://kit.fontawesome.com/f5a1d28d53.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/public/style/style.css">
  <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
  <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<nav class="navbar" id="navbar">
  <div class="navbarLinkContainer">
    <div class="hamburgerIcon">
      <i class="fa-solid fa-bars hamburgerIcon" id="hamburgerIcon"></i>
      <i class="fa-solid fa-xmark closeIcon" id="closeIcon"></i>
    </div>
    <div class="navLinkleft">
      <a href="/allArticle">Nouveauté</a>
      <a href="">Catégories</a>
      <a href="">Recherche</a>
    </div>
    <div class="logoContainer">
      <a href="/"><img src="/public/img/Logo.png" alt="Logo de Trésor de Viana" class="logo"></a>
    </div>
    <div class="navLinkright">
      <?php
      if (isset($_SESSION['user'])) {
      ?>
        <a href="/cart">Panier</a>
        <a href="/profile?id=<?= $_SESSION['user']['idUser'] ?>">Compte</a>
      <?php
      } else {
      ?>
        <a href="/register">Inscription</a>
        <a href="/login">Connexion</a>
      <?php
      }
      ?>
      </ul>
    </div>
    <?php
    if (isset($_SESSION['user'])) {
    ?>
      <div class="smLinkContainer">
        <a href="/cart" class="nav-link">Panier</a>
      </div>
    <?php
    } else {
    ?>
      <div class="smLinkContainer">
        <a href="/register" class="nav-link">Connexion</a>
      </div>
    <?php
    }
    ?>

  </div>

</nav>
<div class="offsetcanva" id="offsetCanva">
  <div class="offsetcanvaContainer">
    <div>
      <h5>Catégories</h5>
      <ul>
        <li><a href="/allArticle?category=bracelet">Bracelets</a></li>
        <li><a href="/allArticle?category=collier">Colliers</a></li>
        <li><a href="/allArticle?category=boucles">Boucles</a></li>
        <li><a href="/allArticle?category=chale">Châles</a></li>
      </ul>
    </div>
    <div>
      <a href="/allArticle">
        <h5>Nouveauté</h5>
      </a>
    </div>
    <div>
      <?php
      if (isset($_SESSION['user'])) {
      ?>
        <h5><a href="/profile">Compte</a></h5>
      <?php
      }
      ?>

    </div>
  </div>
</div>

<body>