<?php

    require_once(__DIR__ . '/../partials/head.php');
    
?>
<section class="registerContainer">
    <form action="" method="POST" class="formRegisterLogin">
        <div>
            <div>
                <h1>CONNEXION</h1>
                <p>Content de vous revoir</p>
            </div>
        <div class="">
            <label for="mail">Mail</label>
            <input type="email" name="mail" id="mail">
            <?php
            if (isset($this->arrayError['mail'])) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <p class='text-danger'><?= $this->arrayError['mail'] ?></p>
                </div>
            <?php
            } ?>
        </div>
        <div class="">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <?php
            if (isset($this->arrayError['password'])) {
            ?>
                <div class="alert alert-danger" role="alert">
                    <p class='text-danger'><?= $this->arrayError['password'] ?></p>
                </div>
            <?php
            } ?>
        </div>
        <div class="formLoginRegister">
            <button type="submit" class="activeFormBtn">Se Connecter</button>
            <p>ou</p>
            <a href="/register" class="activeFormA">S'inscrire</a>
        </div>
       
        </div>
    </form>
</section>
<?php
include_once(__DIR__ . '/../partials/footer.php');
?>