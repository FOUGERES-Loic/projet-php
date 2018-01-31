<?php

namespace Repository;


interface RepositoryInterface
{
    public function create($object);

    public function getAll();
    public function getOne($search);

    public function update($object);

    public function delete($object);
}