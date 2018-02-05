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
        if (isset($this->config['database'][$name])) {
            return $this->config['database'][$name];
        } else if ($this->config['app'][$name]) {
            return $this->config['app'][$name];
        } else {
            return null;
        }
    }
}