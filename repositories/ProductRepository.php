<?php

namespace Repository;

include 'RepositoryFactory.php';

use \Entity\Product;


class ProductRepository implements RepositoryInterface
{
    private $source;
    /** @var \Repository\RepositoryFactory */
    private $repoFacto;

    /**
     * UserRepository constructor.
     * @param $source
     */
    public function __construct($source)
    {
        /* check connection */
        if ($source->connect_errno){
            printf("Connect failed: %s\n", $source->connect_error);
            exit();
        }
        $this->source = $source;
        $this->repoFacto = new RepositoryFactory();
    }

    public function create($object)
    {
        // TODO: Implement create() method.
    }

    public function getAll()
    {
        $query = 'SELECT * FROM product';
        $productList = [];
        $typeRepo = $this->repoFacto->buildRepository('type');
        if ($result = $this->source->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $product = new Product();
                $product->setId($row['id'])->setStock($row['stock'])->setMoisSemis($row['moisSemis'])
                    ->setPrix($row['prix'])->setNom($row['nom'])->setImage($row['image']);

                $product->setType($typeRepo->getOne($row['typeSemi']));
                $productList[] = $product;
            }
            $this->source->free();
        }
        return $productList;
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