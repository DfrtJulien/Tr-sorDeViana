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
</head>

<body>
  <nav class="navbar navbar-expand-lg myNav">
    <div class="container-fluid justify-content-around py-3">
      <div class="d-flex align-items-center">
        <a class="navbar-brand" href="/">
          <img src="/public/img/logo_tresorviana.png" alt="Logo Trésor de Viana" width="40" height="40">
        </a>
        <h1 class="headerTitle title">Trésor De Viana</h1>
      </div>
      <div>
        <input type="text" placeholder="Que’est ce que vous recherchez ?" class="searchInput">
        <a href=""><i class="fa-solid fa-magnifying-glass iconLogo searchLogo"></i></a>
      </div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="" id="navbarNav">
        <ul class="navbar-nav">
          <div class="d-flex align-items-center">
            <i class="fa-solid fa-store iconLogo"></i>
            <li class="nav-item">
              <a class="nav-link  headerText me-2" href="/">Accueil</a>
            </li>
          </div>
          <div class="d-flex align-items-center">
            <i class="fa-solid fa-cart-shopping iconLogo"></i>
            <li class="nav-item">
              <a class="nav-link  headerText me-2" href="/">Boutique</a>
            </li>
          </div>
          <div class="d-flex align-items-center">
            <i class="fa-solid fa-user iconLogo"></i>
            <li class="nav-item">
              <a class="nav-link  headerText me-2" href="/register">Inscription</a>
            </li>
            <li class="nav-item">
              <a class="nav-link  headerText ms-2" href="/">Connexion</a>
            </li>
          </div>
        </ul>
      </div>
    </div>
  </nav>
  <div class="myBody">