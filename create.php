<?php
include __DIR__ . '/includes/includes.php';

$userService = new \Service\UserService();
if (!$userService->isConnected()) {
    header('Location: http://www.php.local/login.php');
    exit();
}

//if (!empty($_POST)) {
//    $typeRepo = RepositoryFactory::buildRepository('type');
//    $product = new \Entity\Product();
//    $product->setNom($_POST['nom'])->setImage($_POST['image'])->setStock($_POST['stock'])
//        ->setPrix($_POST['prix'])->setMoisSemis($_POST['mois'])
//        ->setType($typeRepo->getOne($_POST['type']));
//
//    $productService = new ProductService();
//    $product = $productService->create($product);
//    header('Location: http://www.php.local/index.php?lastModify='.$product->getId());
//}

include __DIR__ . "/views/partials/validation.php";

$pageTitle = 'Ajout d\'un nouveau Produit';
include __DIR__."/views/create.php";