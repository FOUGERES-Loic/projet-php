<?php

namespace Service;


class Router
{
    public static function getRoute($url)
    {
        if (strpos($url, '/') === 0) {
            $url = substr($url, 1);
        }
        if (strpos($url, 'index.php/') === 0) {
            $url = substr($url, sizeof('index.php/'));
        }
        $array = explode('/',$url);
        if (count($array) == 2) {
            $string = explode(".", $array[1], 2);
            $controller = ucfirst($array[0]).'Controller';
            $action = explode('?',$string[0]);
            $action = $action[0];
        } else {
            $controller = 'ProductController';
            $action = 'home';
        }
        return ['controller' => $controller, 'action' => $action];
    }

//    public static function getRoute()
//    {
//        $array = explode('/',$_SERVER['REQUEST_URI']);
//        $route = [
//            'controller' => ucfirst($array[1]).'Controller',
//            'action' => $array[2]
//        ];
//
//        return $route;
//    }
}