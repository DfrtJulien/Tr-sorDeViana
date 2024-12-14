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

<section class="container my-5">
    <div class="profileContainer">
        <form method="POST" enctype="multipart/form-data">
            <div class="d-md-flex">
                <div class="imgProfileContainer">
                    <img src="/public/uploads/<?= $myUserImg ? $myUserImg : "img_default.png" ?>" alt="Photo de profile">
                    <label for="fileToUpload">Ajouter votre photo de profile :</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div>
                    <div class="p-2">
                        <label for="mail">Mail : </label>
                        <input type="email" name="mail" id="mail" value="<?= $myUser->getMail() ?>">
                        <?php
                        if (isset($this->arrayError['mail'])) {
                        ?>
                            <p class='text-danger'><?= $this->arrayError['mail'] ?></p>
                        <?php
                        } ?>
                    </div>
                    <div class="p-2">
                        <label for="city">Ville : </label>
                        <input type="text" name="city" id="city" value="<?= $myUser->getCity() ?>">
                        <?php
                        if (isset($this->arrayError['city'])) {
                        ?>
                            <p class='text-danger'><?= $this->arrayError['city'] ?></p>
                        <?php
                        } ?>
                    </div>
                    <div class="p-2">
                        <label for="street">Addresse : </label>
                        <input type="text" name="street" id="street" value="<?= $myUser->getStreet() ?>">
                        <?php
                        if (isset($this->arrayError['street'])) {
                        ?>
                            <p class='text-danger'><?= $this->arrayError['street'] ?></p>
                        <?php
                        } ?>
                    </div>
                    <div class="d-md-flex p-2">
                        <div class="duoInput">
                            <label for="postal">Code Postal : </label>
                            <input type="number" name="postal" id="postal" value="<?= $myUser->getPostal() ?>">
                            <?php
                            if (isset($this->arrayError['postal'])) {
                            ?>
                                <p class='text-danger'><?= $this->arrayError['postal'] ?></p>
                            <?php
                            } ?>
                        </div>
                        <div>
                            <label for="phone">Téléphone :</label>
                            <input type="tel" name="phone" id="phone" value="<?= $myUser->getPhoneNumber() ?>">
                            <?php
                            if (isset($this->arrayError['phone'])) {
                            ?>
                                <p class='text-danger'><?= $this->arrayError['phone'] ?></p>
                            <?php
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="submitBtnProfile my-3">Sauvegarder</button>
        </form>
</section>

<?php
include_once(__DIR__ . '/partials/footer.php');
?>