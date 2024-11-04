<?php
require_once(__DIR__ . '/../partials/head.php');
?>
<div class="container">
    <form method="POST" class="registerForm">
        <span class="form-span"></span>

        <?php
        if (isset($error)) {
        ?>
            <div class="alert alert-danger m-1" role="alert">
                <p class='text-danger'><?= $error ?></p>
            </div>

        <?php
        } ?>
        <div class="p-2">
            <label for="mail">Mail : </label>
            <input type="email" name="mail" id="mail">
        </div>
        <div class="p-2">
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" id="password">
        </div>
        <button type="submit" class="submitBtn my-3">Se Connecter</button>
    </form>
</div>
<?php
require_once(__DIR__ . '/../partials/footer.php');
?>