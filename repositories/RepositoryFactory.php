<?php

namespace Repository;

use \Service\Configuration;

class RepositoryFactory
{
    const TYPE = 'type';
    const PRODUCT = 'product';
    const USER = 'user';

    public static function buildRepository(string $repository, string  $source = 'mysql') : RepositoryInterface
    {
        $config = Configuration::getInstance();

        switch ($config->getSource()) {
            case 'mysql':
//                $origin = new \mysqli('localhost','root','','epicerie');
                $origin = new \mysqli($config->getHost(),$config->getUsername(),$config->getPasswd(),$config->getDbname());
                $origin->set_charset($config->getCharset());
                break;
            default:
                throw new \Exception('Type de source inconnu');
        }

        /* check connection */
        if ($origin->connect_errno){
            printf("Connect failed: %s\n", $origin->connect_error);
            exit();
        }


        switch ($repository) {
            case self::PRODUCT:
                $repo =  new ProductRepository(self::buildRepository(self::TYPE));
                break;
            case self::TYPE:
                $repo =   new TypeRepository();
                break;
            case self::USER:
                $repo =   new UserRepository();
                break;
            default:
                throw new \Exception('Type de repository inconnu');
        }

        if ($repo instanceof DbTraitAwareInterface){
            $repo->setSource($origin);
//            var_dump($repo);die;
        }

        return $repo;
    }
}