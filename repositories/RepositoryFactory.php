<?php

namespace Repository;


class RepositoryFactory
{
    private $origin;
    public static function buildRepository(string $repository, string  $source = 'mysql')
    {
        switch ($source) {
            case 'mysql':
                $origin = new \mysqli('localhost','root','','epicerie');
                $origin->set_charset("UTF8");
                break;
            default:
                throw new \Exception('Type de source inconnu');
        }

        switch ($repository) {
            case 'product':
                return new ProductRepository($origin);
            case 'type':
                return new TypeRepository($origin);
            case 'user':
                return new UserRepository($origin);
            default:
                throw new \Exception('Type de repository inconnu');
        }
    }
}