<?php
include __DIR__ . '/partials/navigation.php';
?>
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
                <th>Nom</th>
                <th>Prix</th>
                <th>Type</th>
                <th>Mois de semi</th>
                <th>Stock</th>
            </thead>
            <tbody>
            <?php
            // <?php echo est equivalent à <?=
            foreach (getArticles($articles, $type) as $article): ?>
                <tr>
                    <td><?= $article['nom']; ?></td>
                    <td><?= $article['prix']; ?></td>
                    <td><?= $article['type']; ?></td>
                    <td><?= getSaison($article['mois_semis']); ?></td>
                    <td><?= getStock($article['stock']); ?></td>
                </tr>
                <?php
            endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>
<?php include __DIR__ . '/partials/footer.php'; ?>
