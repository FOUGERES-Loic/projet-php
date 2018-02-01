<?php
//include __DIR__ . '/services/UserService.php';
include __DIR__ . '/includes/includes.php';

$userService = new \Service\UserService();
$userService->logoutUser();
header('Location: http://www.php.local/index.php');
exit();