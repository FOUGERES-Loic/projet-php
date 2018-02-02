<?php
use \Service\MenuService;
$menuService = new MenuService();
?>
<!DOCTYPE html>
<html lang = fr>
<head>
    <title><?= $TITLE_PAGE ?></title>
    <!-- META -->
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content='Exercice PHP'>
    <meta charset='UTF-8'>

    <!-- fichiers CSS -->
    <link rel='stylesheet' type='text/css' href='/css/bootstrap.css'>
    <link rel='stylesheet' type='text/css' href='/css/style.css'>

</head>
<body>
    <?= $MENU ?>
    <div class='container'>
        <?= $BODY ?>
    </div>
</body>
<footer>
    <!-- JS -->
    <!-- <script src="script.js"></script> -->
    <script src='js/jquery-3.2.1.min.js'></script>
    <script src='js/bootstrap.js'></script>
</footer>
</html>