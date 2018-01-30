<?php
//include $_SERVER['DOCUMENT_ROOT'] . '/fonctions.php';
include __DIR__ . '/fonctions.php';
include __DIR__ . '/includes/database.php';

//    var_dump($_SERVER);die;
$type = empty($_GET['type']) ? null : $_GET['type'];
include __DIR__."/views/index.php";