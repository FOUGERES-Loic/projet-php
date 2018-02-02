<?php

namespace Service;


class Router
{
    public static function getRoute()
    {
        $array = explode($_SERVER['SCRIPT_NAME'], '/');
        $route = [
            'controllers' => $array[1],
            'action' => $array[2]
        ];
    }
}