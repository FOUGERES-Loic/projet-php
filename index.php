<?php
include __DIR__ . '/includes/includes.php';

use \Service\ProductService;
use \Service\UserService;

//    var_dump($_SERVER);die;

$productService = new ProductService();
$userService = new UserService();

$type = empty($_GET['type']) ? null : $_GET['type'];
$articles = $productService->getArticles($articles, $type);
$search = null;
if (!empty($_POST['recherche'])) {
    $search = $_POST['recherche'];
    $articles = $productService->getArticleByName($articles, $search);
}
if (!$userService->isConnected()) {
    header('Location: http://www.php.local/login.php');
    exit();
}
include __DIR__."/views/index.php";