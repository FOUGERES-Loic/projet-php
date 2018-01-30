<?php
include 'includes.php';

use Entity\Type;
use Entity\Product;

$fruit = new Type('fruit');
$fruit->setId(1);
$legume = new Type('legume');
$legume->setId(2);

$article1 = new Product();
$article2 = new Product();
$article3 = new Product();
$article4 = new Product();

$article1->setNom('Pomme')->setPrix(1.2)->setMoisSemis(2)->setStock(0)->setType($fruit)->setId(1);
$article2->setNom('Courgette')->setPrix(1.5)->setMoisSemis(5)->setStock(2)->setType($legume)->setId(2);
$article3->setNom('Kiwi')->setPrix(1.7)->setMoisSemis(8)->setStock(6)->setType($fruit)->setId(3);
$article4->setNom('Citrouille')->setPrix(2)->setMoisSemis(10)->setStock(10)->setType($legume)->setId(4);

$articles = [
    $article1,
    $article2,
    $article3,
    $article4
];

$listeTypes = [$fruit, $legume];