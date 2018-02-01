<?php include __DIR__ . '/partials/navigation.php'; ?>
    <div class='row'>
        <div class='col-md-12 bordure'>
            <h1><?= $pageTitle ?></h1><br>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-3 bordure'>
        </div>
        <div class='col-md-6 bordure'>
            <form class='form-horizontal' method='POST'>
                <input type='hidden' class='.sr-only' name='id' value='<?= !empty($product)? $product->getId():""; ?>'>
                <div class='form-group'>
                    <label for='inputNom'>Nom du produit</label>
                    <input type='text' name='nom' class='form-control' id='inputNom' value='<?= !empty($product)? $product->getNom():""; ?>'>
                </div>
                <div class='form-group'>
                    <label for='inputPrix'>Prix</label>
                    <input type='text' name='prix' class='form-control' id='inputPrix' value='<?= !empty($product)? $product->getPrix():""; ?>'>
                </div>
                <div class='form-group'>
                    <label for='inputMoisSemis'>Mois de semis</label>
                    <select class="form-control" name='mois' id='inputMoisSemis'>
                        <?php foreach ($listeMois as $moisNum => $moisNom): ?>
                            <option  <?= !empty($product)&&$product->getMois()==$moisNum?'selected':''; ?>
                                    value="<?= $moisNum ?>"><?= $moisNom ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class='form-group'>
                    <label for='inputStock'>Stock</label>
                    <input type='text' name='stock' class='form-control' id='inputStock' value='<?= !empty($product)? $product->getStock():""; ?>'>
                </div>
                <div class='form-group'>
                    <label for='inputTypeSemi'>Type</label>
                    <select class="form-control" name='type' id='inputTypeSemi'>
                        <?php
                        /** @var Entity\Type $type */
                        foreach ($listeTypes as $type): ?>
                            <option <?= !empty($product)&&$product->getType()->getId()==$type->getId()?'selected':''; ?>
                                    value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class='form-group'>
                    <label for='inputImage'>Image</label>
                    <input type='text' name='image' class='form-control' id='inputImage' value='<?= !empty($product)? $product->getImage():""; ?>'>
                </div>
                <button type='submit' class='btn btn-default'>Envoyer</button>
            </form>
        </div>
    </div>

<?php include __DIR__ . '/partials/footer.php'; ?>