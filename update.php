<?php
include __DIR__ . '/includes/includes.php';

$userService = new \Service\UserService();
if (!$userService->isConnected()) {
    header('Location: http://www.php.local/login.php');
    exit();
}

include __DIR__."/views/update.php";