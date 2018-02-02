<?php

namespace Repository;

use \Entity\Type;

class TypeRepository implements RepositoryInterface, DbTraitAwareInterface
{
    use DbTrait;

    /**
     * UserRepository constructor.
     * @param $source
     */
    public function __construct()
    {
    }

    public function create($object)
    {

    }

    public function getAll()
    {
        $query = 'SELECT * FROM type';
        $types = [];
        if ($result = $this->source->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $type = new Type();
                $type->setId($row['id'])->setName($row['name']);
                $types[] = $type;
            }
//            $this->source->free();
        }
        return $types;
    }

    public function getOne($search)
    {
        if ($stmt = $this->source->prepare('SELECT * FROM type WHERE id = ?')) {
            $stmt->bind_param('i', $search);
            $stmt->execute();

            $result = $stmt->get_result();
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $type = new Type();
                $type->setId($row['id'])->setName($row['name']);
            }
//            $this->source->free();
        }
        return $type;
    }

    public function update($object)
    {

    }

    public function delete($object)
    {

    }
}