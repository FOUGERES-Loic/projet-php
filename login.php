<?php
include __DIR__ . '/includes/includes.php';
include __DIR__ . '/fonctions.php';

use Entity\User;

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $user = new User();
    $user->setLogin($_POST['login'])->setPassword($_POST['password']);
    if (validateUser($users, $user)) {
        session_start();
        var_dump(session_id());die;
        header('Location: http://www.php.local/index.php');
        exit();
    }
}
include __DIR__.'/views/login.php';