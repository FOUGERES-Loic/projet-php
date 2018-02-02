<?php
include __DIR__ . '/includes/includes.php';

use \Service\ProductService;

$userService = new \Service\UserService();
if (!$userService->isConnected()) {
    header('Location: http://www.php.local/login.php');
    exit();
}

//if (!empty($_POST)) {
//    $typeRepo = RepositoryFactory::buildRepository('type');
//    $product = new \Entity\Product();
//    $product->setNom($_POST['nom'])->setImage($_POST['image'])->setStock($_POST['stock'])
//        ->setPrix($_POST['prix'])->setMoisSemis($_POST['mois'])->setId($_POST['id'])
//        ->setType($typeRepo->getOne($_POST['type']));
//
//    $productService = new ProductService();
//    $product = $productService->update($product);
//    header('Location: http://www.php.local/index.php?lastModify='.$product->getId());
//}

include __DIR__ . "/views/partials/validation.php";

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
    $product = $productService->getArticleById($_GET['id']);
}

$pageTitle = 'Mise à jour d\'un Produit';
$modify = true;
$imagePath = $config->getImagepath().$product->getImage();
$imageName = $product->getImage();
include __DIR__."/views/create.php";