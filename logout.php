<?php
session_start();
include __DIR__ . '/services/UserService.php';

$userService = new \Service\UserService();
$userService->logoutUser();
header('Location: http://www.php.local/index.php');
exit();