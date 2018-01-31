<?php

namespace Repository;

use \Entity\User;

class UserRepository implements RepositoryInterface
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
        $users = [];
        if ($result = $this->source->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $user = new User();
                $user->setId($row['id'])->setLogin($row['login'])->setPassword($row['password']);
                $users[] = $user;
            }
            $this->source->free();
        }
        return $users;
    }

    public function getOne($search)
    {
        // TODO: Implement getOne() method.
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