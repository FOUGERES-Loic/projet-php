<?php

namespace Controller;

use \Service\ProductService;
use \Service\TypeService;
use \Service\UserService;
use \Repository\RepositoryFactory;

class AbstractController
{
    protected $ts;
    protected $us;
    protected $ps;

    /**
     * @return TypeService
     */
    public function getTs(): TypeService
    {
        if (empty($this->ts)) {
            $this->ts = new TypeService(RepositoryFactory::buildRepository(RepositoryFactory::TYPE));
        }
        return $this->ts;
    }

    /**
     * @return UserService
     */
    public function getUs(): UserService
    {
        if (empty($this->us)) {
            $this->us = new UserService(RepositoryFactory::buildRepository(RepositoryFactory::USER));
        }
        return $this->us;
    }

    /**
     * @return ProductService
     */
    public function getPs(): ProductService
    {
        if (empty($this->ps)) {
            $this->ps = new ProductService(RepositoryFactory::buildRepository(RepositoryFactory::PRODUCT));
        }
        return $this->ps;
    }

    public function getConfig(): \Service\Configuration
    {
        return \Service\Configuration::getInstance();
    }

    public function getListeMois(): array
    {
        return [
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
    }
}