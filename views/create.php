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
            <form class='form-horizontal' method='POST' enctype='multipart/form-data'>
                <input type='hidden' class='.sr-only' name='id' value='<?= !empty($product)? $product->getId():""; ?>'>
                <div class='form-group'>
                    <label class='col-sm-2' for='inputNom'>Nom du produit</label>
                    <div class='col-sm-10'>
                        <input type='text' name='nom' class='form-control' id='inputNom' value='<?= !empty($product)? $product->getNom():""; ?>'>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-sm-2' for='inputPrix'>Prix</label>
                    <div class='col-sm-10'>
                        <input type='text' name='prix' class='form-control' id='inputPrix' value='<?= !empty($product)? $product->getPrix():""; ?>'>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-sm-2' for='inputMoisSemis'>Mois de semis</label>
                    <div class='col-sm-10'>
                        <select class="form-control" name='mois' id='inputMoisSemis'>
                        <?php foreach ($listeMois as $moisNum => $moisNom): ?>
                            <option  <?= !empty($product)&&$product->getMoisSemis()==$moisNum?'selected':''; ?>
                                    value="<?= $moisNum ?>"><?= $moisNom ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-sm-2' for='inputStock'>Stock</label>
                    <div class='col-sm-10'>
                        <input type='text' name='stock' class='form-control' id='inputStock' value='<?= !empty($product)? $product->getStock():""; ?>'>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-sm-2' for='inputTypeSemi'>Type</label>
                    <div class='col-sm-10'>
                        <select class="form-control" name='type' id='inputTypeSemi'>
                            <?php
                            /** @var Entity\Type $type */
                            foreach ($listeTypes as $type): ?>
                                <option <?= !empty($product)&&$product->getType()->getId()==$type->getId()?'selected':''; ?>
                                        value="<?= $type->getId() ?>"><?= $type->getName() ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class='form-group'>
                    <label class='col-sm-2' for='inputImage'>Image</label>
                    <?= empty($modify)?"<div class='col-sm-10'>":"<div class='col-sm-8'>" ?>
                        <input type='file' name='image' id='inputImage'>
                    <?= empty($modify)? "":"</div><div class='col-sm-2'><img src='".$imagePath."' alt='".$imageName."' class='img-rounded'>" ?>
                    </div>
                </div>
                <button type='submit' class='btn btn-default'>Envoyer</button>
            </form>
        </div>
    </div>

<?php include __DIR__ . '/partials/footer.php'; ?>