<?php

namespace Repository;

//include 'RepositoryFactory.php';

use \Entity\Product;

class ProductRepository implements RepositoryInterface
{
    /** @var \mysqli */
    private $source;
    /** @var \Repository\TypeRepository */
    private $typeRepo;

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
        $this->typeRepo = RepositoryFactory::buildRepository('type');

    }

    /** @param \Entity\Product */
    public function create($object)
    {
        $nom = $object->getNom();
        $prix = $object->getPrix();
        $mois = $object->getMoisSemis();
        $stock = $object->getStock();
        $type = $object->getType()->getId();
        $image = $object->getImage();
        $stmt = $this->source->prepare('INSERT INTO product VALUES (null, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('sdiiis', $nom, $prix, $mois, $stock, $type, $image);
        $stmt->execute();

        if (!empty($this->source->insert_id)) {
            $object->setId($this->source->insert_id);
        }

        $stmt->close();
        return $object;
    }

    public function getAll()
    {
        $query = 'SELECT * FROM product';
        $productList = [];
        if ($result = $this->source->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $product = new Product();
                $product->setId($row['id'])->setStock($row['stock'])->setMoisSemis($row['moisSemis'])
                    ->setPrix($row['prix'])->setNom($row['nom'])->setImage($row['image']);

                $product->setType($this->typeRepo->getOne($row['typeSemi']));
                $productList[] = $product;
            }
//            $this->source->free();
        }
        return $productList;
    }

    /** @param int */
    public function getOne($search)
    {
        if ($stmt = $this->source->prepare('SELECT * FROM product WHERE id = ?')) {
            $stmt->bind_param('i', $search);
            $stmt->execute();

            $result = $stmt->get_result();
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $product = new Product();
                $product->setId($row['id'])->setStock($row['stock'])->setMoisSemis($row['moisSemis'])
                    ->setPrix($row['prix'])->setNom($row['nom'])->setImage($row['image']);

                $product->setType($this->typeRepo->getOne($row['typeSemi']));
            }
//            $this->source->free();
        }
        return $product;
    }

    /** @param \Entity\Product */
    public function update($object)
    {
        $nom = $object->getNom();
        $prix = $object->getPrix();
        $mois = $object->getMoisSemis();
        $stock = $object->getStock();
        $type = $object->getType()->getId();
        $image = $object->getImage();
        $id = $object->getId();
        $stmt = $this->source->prepare('UPDATE product SET nom = ?, prix = ?, moisSemis = ?, stock = ?, 
            typeSemi = ?, image = ? WHERE id = ?)');
        $stmt->bind_param('sdiiisi', $nom, $prix, $mois, $stock, $type, $image, $id);
        $stmt->execute();

        $stmt->close();
        return true;
    }

    /** @param \Entity\Product */
    public function delete($object)
    {
        $id = $object->getId();
        $stmt = $this->source->prepare('DELETE FROM product  WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $stmt->close();
        return true;
    }

    public function getAllIdProducts()
    {
        $query = 'SELECT id FROM product';
        $productIdList = [];
        if ($result = $this->source->query($query)) {
            /* fetch associative array */
            while ($row = $result->fetch_assoc()) {
                $productIdList[] = $row['id'];
            }
//            $this->source->free();
        }
        return $productIdList;
    }
}