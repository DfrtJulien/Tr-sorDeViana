<?php
require_once(__DIR__ . '/../partials/head.php');
?>
<h2>ajouter un article</h2>

<div class="container">
    <form method="POST" class="addArticleForm">
        <span class="form-span"></span>
        <div class="p-2">
            <label for="title">Titre : </label>
            <input type="text" name="title" id="title">
            <?php
            if (isset($this->arrayError['title'])) {
                ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <p class='text-danger'><?= $this->arrayError['title'] ?></p>
                    </div>
                <?php
                } ?>
        </div>
        <div class="p-2">
            <label for="description">Description : </label>
            <textarea type="text" name="description" id="description"></textarea>
            <?php
            if (isset($this->arrayError['description'])) {
                ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <p class='text-danger'><?= $this->arrayError['description'] ?></p>
                    </div>
                <?php
                } ?>
        </div>
        <div class="p-2">
            <label for="priceExcludingTax">Prix sans Taxe : (en €)</label>
            <input type="number" name="priceExcludingTax" id="priceExcludingTax">
            <?php
            if (isset($this->arrayError['priceExcludingTax'])) {
                ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <p class='text-danger'><?= $this->arrayError['priceExcludingTax'] ?></p>
                    </div>
                <?php
                } ?>
        </div>
        <div class="p-2">
            <label for="type">Type : </label>
            <select name="type" id="type">
                <option value="">Choisiser un type</option>
                <option value="collier">Collier</option>
                <option value="boucles">Boucles d'orreiles</option>
                <option value="chale">Chale</option>
            </select>
            <?php
            if (isset($this->arrayError['type'])) {
                ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <p class='text-danger'><?= $this->arrayError['type'] ?></p>
                    </div>
                <?php
                } ?>
        </div>
        <div class="p-2">
            <label for="quantity">Quantité en stock: </label>
            <input type="number" name="quantity" id="quantity">
            <?php
            if (isset($this->arrayError['quantity'])) {
                ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <p class='text-danger'><?= $this->arrayError['quantity'] ?></p>
                    </div>
                <?php
                } ?>
        </div>
        <div class="p-2">
            <label for="material">Matériel du bijoux : </label>
            <select name="material" id="material">
                <option value="">Choisiser un matériaux</option>
                <option value="or">Or</option>
                <option value="argent">Argent</option>
            </select>
            <?php
            if (isset($this->arrayError['material'])) {
                ?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <p class='text-danger'><?= $this->arrayError['material'] ?></p>
                    </div>
                <?php
                } ?>
        </div>
        <button type="submit" class="submitBtn my-3">Ajoutez un article</button>
    </form>
</div>
<?php
include_once(__DIR__ . '/../partials/footer.php');
?>