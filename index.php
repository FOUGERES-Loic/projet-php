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

session_start();

$route = \Service\Router::getRoute($_SERVER['REQUEST_URI']);
$controllerClassName = '\\Controller\\'.$route['controller'];
if (class_exists($controllerClassName)) {
    $controller = new $controllerClassName();
    $method = $route['action'];
    if (method_exists($controller, $method)) {
        $controller->$method();
        exit;
    }
} else {
    header("HTTP/1.0 404 Not Found");
    echo 'Page not found';
}
