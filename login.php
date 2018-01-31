<?php
include __DIR__ . '/includes/includes.php';

use \Service\UserService;


use Entity\User;

$userService = new UserService($users);
$error = null;

if (!empty($_POST['login']) && !empty($_POST['password'])) {
//    $user = new User();
//    $user->setLogin($_POST['login'])->setPassword($_POST['password']);
    if ($userService->loginUser($_POST['login'], $_POST['password'])) {
        header('Location: http://www.php.local/index.php');
        exit();
    }
    $error = 'L\'identification a échouée.';
}
include __DIR__.'/views/login.php';