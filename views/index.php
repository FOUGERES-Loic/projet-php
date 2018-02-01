<?php
include __DIR__ . '/partials/navigation.php';
?>
<div class='row'>
    <div class='col-md-12 bordure'>

    </div>
</div>
<div class='row'>
    <div class='col-md-12 bordure'>
        <h1>Page d'Index</h1>
    </div>
</div>
<div class='row'>
    <div class='col-md-2 bordure'>
    </div>
    <div class='col-md-8 bordure'>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Type</th>
                    <th>Mois de semi</th>
                    <th>Stock</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
            <?php
            /**
             * @var Entity\Product $article
             */
            foreach ($articles as $article): ?>
            <?php if (isset($_GET['lastModify'])) {
                    if ($_GET['lastModify'] == $article->getId()) {
                        echo '<tr class="info">';
                    } else {
                        echo '<tr>';
                    }
            }?>
                    <td><?= $article->getNom(); ?></td>
                    <td><?= $article->getPrix(); ?></td>
                    <td><?= $article->getType()->getName(); ?></td>
                    <td><?= $productService->getSaison($article); ?></td>
                    <td><?= $productService->getStock($article); ?></td>
                    <td>
                        <a href="update.php?id=<?= $article->getId(); ?>">Modifier</a>
                        <a href="delete.php?id=<?= $article->getId(); ?>">Supprimer</a>
                    </td>
                </tr>
                <?php
            endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php include __DIR__ . '/partials/footer.php'; ?>
