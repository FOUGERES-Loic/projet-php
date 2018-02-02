<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 01/02/2018
 * Time: 11:35
 */

namespace Service;

use \Repository\RepositoryFactory;

class TypeService
{

    private $typeRepo;

    /**
     * TypeService constructor.
     */
    public function __construct()
    {
        $this->typeRepo = RepositoryFactory::buildRepository(RepositoryFactory::TYPE);
    }

    public function getAll()
    {
        return $this->typeRepo->getAll();
    }

    public function getById(int $id)
    {
        return $this->typeRepo->getOne($id);
    }
}