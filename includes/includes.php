<?php

define('ROOT_PATH', __DIR__ . '/../');

include __DIR__.'/../entity/Product.php';
include __DIR__.'/../entity/Type.php';
include __DIR__.'/../entity/User.php';

//include __DIR__ . '/database2.php';

include __DIR__ . '/../repositories/DbTraitAwareInterface.php';
include __DIR__ . '/../repositories/DbTrait.php';
include __DIR__ . '/../repositories/RepositoryInterface.php';
include __DIR__ . '/../repositories/TypeRepository.php';
include __DIR__ . '/../repositories/UserRepository.php';
include __DIR__ . '/../repositories/ProductRepository.php';
include __DIR__ . '/../repositories/RepositoryFactory.php';

include __DIR__ . '/../services/MenuService.php';
include __DIR__ . '/../services/ProductService.php';
include __DIR__ . '/../services/UserService.php';
include __DIR__ . '/../services/TypeService.php';

include __DIR__ . '/../services/Configuration.php';

use \Service\Configuration;
use \Service\TypeService;

$typeService = new TypeService();
$listeTypes = $typeService->getAll();
$config = Configuration::getInstance();
$errors = [];

$listeMois = [
    0 => 'Janvier',
    1 => 'Fevrier',
    2 => 'Mars',
    3 => 'Avril',
    4 => 'Mai',
    5 => 'Juin',
    6 => 'Juillet',
    7 => 'Août',
    8 => 'Septembre',
    9 => 'Octobre',
    10 => 'Novembre',
    11 => 'Décembre'
];

session_start();