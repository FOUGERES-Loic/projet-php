<?php
include __DIR__ . '/includes/includes.php';

use \Service\ProductService;

$userService = new \Service\UserService();
if (!$userService->isConnected()) {
    header('Location: http://www.php.local/login.php');
    exit();
}
if (empty($_GET['id'])) {
    header('Location: http://www.php.local/index.php');
    exit();
} else {
    $productService = new ProductService();
    $listeIdProduits = $productService->getAllIdProducts();
    if (!in_array($_GET['id'], $listeIdProduits)) {
        header('Location: http://www.php.local/index.php');
        exit();
    }
    $article = $productService->getArticleById($_GET['id']);
    $nom = $article->getNom();
}

if (!empty($_POST['optionsRadios'])) {
    if ($_POST['optionsRadios'] == "oui") {
        $productService->delete($article);
    }
    header('Location: http://www.php.local/index.php');
    exit();
}

include __DIR__."/views/delete.php";
