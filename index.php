<?php
define('ROOT_PATH', __DIR__);

include ROOT_PATH.'/entity/Product.php';
include ROOT_PATH.'/entity/Type.php';
include ROOT_PATH.'/entity/User.php';

include ROOT_PATH.'/repositories/DbTraitAwareInterface.php';
include ROOT_PATH.'/repositories/DbTrait.php';
include ROOT_PATH.'/repositories/RepositoryInterface.php';
include ROOT_PATH.'/repositories/TypeRepository.php';
include ROOT_PATH.'/repositories/UserRepository.php';
include ROOT_PATH.'/repositories/ProductRepository.php';
include ROOT_PATH.'/repositories/RepositoryFactory.php';

include ROOT_PATH.'/services/MenuService.php';
include ROOT_PATH.'/services/ProductService.php';
include ROOT_PATH.'/services/UserService.php';
include ROOT_PATH.'/services/TypeService.php';
include ROOT_PATH.'/services/Configuration.php';
include ROOT_PATH.'/services/Router.php';

include ROOT_PATH.'/controllers/AbstractController.php';
include ROOT_PATH.'/controllers/ConnectionController.php';
include ROOT_PATH.'/controllers/ProductController.php';

use \Service\Configuration;
use \Service\TypeService;

$typeService = new TypeService();
$listeTypes = $typeService->getAll();
$config = Configuration::getInstance();

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