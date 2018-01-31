<?php

namespace Repository;

use \Entity\Type;

class TypeRepository implements RepositoryInterface
{
    private $source;

    /**
     * UserRepository constructor.
     * @param $source
     */
    public function __construct($source)
    {
        /* check connection */
        if ($source->connect_errno){
            printf('Connect failed: %s\n', $source->connect_error);
            exit();
        }
        $this->source = $source;
    }

    public function create($object)
    {
        // TODO: Implement create() method.
    }

    public function getAll()
    {
        $query = 'SELECT * FROM product';
        $types = [];
        if ($result = $this->source->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $type = new Type();
                $type->setId($row['id'])->setName($row['name']);
                $types[] = $type;
            }
            $this->source->free();
        }
        return $types;
    }

    public function getOne($search)
    {

    }

    public function update($object)
    {
        // TODO: Implement update() method.
    }

    public function delete($object)
    {
        // TODO: Implement delete() method.
    }
}