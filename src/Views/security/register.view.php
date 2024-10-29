<?php
require_once(__DIR__ . '/../partials/head.php');
?>
<div class="container">
    <form method="POST" class="registerForm">
        <span class="form-span"></span>
        <div class="d-flex p-2">
            <div class="duoInput">
                <label for="firstname">Prénom : </label>
                <input type="text" name="firstname" id="firstname">
                <?php
                if (isset($this->arrayError['firstname'])) {
                ?>
                    <p class='text-danger'><?= $this->arrayError['firstname'] ?></p>
                <?php
                } ?>
            </div>
            <div>
                <label for="lastname">Nom : </label>
                <input type="text" name="lastname" id="lastname">
                <?php
                if (isset($this->arrayError['lastname'])) {
                ?>
                    <p class='text-danger'><?= $this->arrayError['lastname'] ?></p>
                <?php
                } ?>
            </div>
        </div>
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
        <div class="p-2">
            <label for="city">Ville : </label>
            <input type="text" name="city" id="city">
            <?php
            if (isset($this->arrayError['city'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['city'] ?></p>
            <?php
            } ?>
        </div>
        <div class="p-2">
            <label for="street">Addresse : </label>
            <input type="text" name="street" id="street">
            <?php
            if (isset($this->arrayError['street'])) {
            ?>
                <p class='text-danger'><?= $this->arrayError['street'] ?></p>
            <?php
            } ?>
        </div>
        
        <div class="d-flex p-2">
            <div class="duoInput">
                <label for="postal">Code Postal : </label>
                <input type="number" name="postal" id="postal">
                <?php
                if (isset($this->arrayError['postal'])) {
                ?>
                    <p class='text-danger'><?= $this->arrayError['postal'] ?></p>
                <?php
                } ?>
            </div>
            <div>
                <label for="phone">Numéro de téléphone :</label>
                <input type="tel" name="phone" id="phone">
                <?php
                if (isset($this->arrayError['phone'])) {
                ?>
                    <p class='text-danger'><?= $this->arrayError['phone'] ?></p>
                <?php
                } ?>
            </div>
        </div>
        <button type="submit" class="submitBtn my-3">S'inscrire</button>
    </form>
</div>
<?php
require_once(__DIR__ . '/../partials/footer.php');
?>