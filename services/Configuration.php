<?php

namespace Service;


class Configuration
{
    private static $instance;

    private $config;
    /**
     * Configuration constructor.
     */
    private function __construct()
    {
        $this->config = parse_ini_file(__DIR__.'/../config/config.ini', true);
    }

    /**
     * @return Configuration
     */
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Configuration();
        }
        return self::$instance;
    }

    public function __call($name, $args)
    {
        $name = substr($name, 3);
        $name = strtolower($name);
        switch ($name) {
            case 'host':
                return $this->config['database']['host'];
            case 'dbname':
                return $this->config['database']['dbname'];
            case 'username':
                return $this->config['database']['username'];
            case 'passwd':
                return $this->config['database']['passwd'];
            case 'charset':
                return $this->config['database']['charset'];
            case 'source':
                return $this->config['database']['source'];
            case 'imagepath':
                return $this->config['app']['imagepath'];
            default:
                throw new \Exception('Information inconnue dans config.ini');
        }
    }
}

//    public function __get($name)
//    {
//        switch ($name) {
//            case 'host':
//                return $this->config['host'];
//            case 'dbname':
//                return $this->config['dbname'];
//            case 'username':
//                return $this->config['username'];
//            case 'passwd':
//                return $this->config['passwd'];
//            case 'charset':
//                return $this->config['charset'];
//            case 'source':
//                return $this->config['source'];
//            default:
//                throw new \Exception('Information inconnue dans config.ini');
//        }
//    }