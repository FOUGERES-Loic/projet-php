<?php
include __DIR__ . '/includes/includes.php';
include __DIR__ . '/fonctions.php';

$userService = new \Service\UserService();
if (!$userService->isConnected()) {
    header('Location: http://www.php.local/login.php');
    exit();
}

include __DIR__."/views/delete.php";
