<?php
require_once(__DIR__ . '/../partials/head.php');
?>
<div class="container">
    <form method="POST" class="registerForm">
        <span class="form-span"></span>
        <div class="p-2">
            <label for="mail">Mail : </label>
            <input type="email" name="mail" id="mail">
            <?php
            if (isset($this->arrayError['mail'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['mail'] ?></p>
            <?php
            } ?>
        </div>
        <div class="p-2">
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" id="password">
            <?php
            if (isset($this->arrayError['password'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['password'] ?></p>
            <?php
            } ?>
        </div>
        <button type="submit" class="submitBtn my-3">Se Connecter</button>
    </form>
</div>
<?php
require_once(__DIR__ . '/../partials/footer.php');
?>