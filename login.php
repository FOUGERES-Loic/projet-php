<?php
include __DIR__ . '/includes/includes.php';

use \Service\UserService;


use Entity\User;

$userService = new UserService();

if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $user = new User();
    $user->setLogin($_POST['login'])->setPassword($_POST['password']);
    if ($userService->validateUser($users, $user)) {
        header('Location: http://www.php.local/index.php');
        exit();
    }
}
include __DIR__.'/views/login.php';