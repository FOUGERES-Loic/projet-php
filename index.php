<?php
include __DIR__ . '/includes/includes.php';
include __DIR__ . '/fonctions.php';

//    var_dump($_SERVER);die;
$type = empty($_GET['type']) ? null : $_GET['type'];
$articles = getArticles($articles, $type);
$search = null;
if (!empty($_POST['recherche'])) {
    $search = $_POST['recherche'];
    $articles = getArticleByName($articles, $search);
}
if (session_id() == null) {
    header('Location: http://www.php.local/login.php');
    exit();
}
include __DIR__."/views/index.php";