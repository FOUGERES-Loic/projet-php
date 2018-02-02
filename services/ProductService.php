<?php

namespace Service;

use \Entity\Product;
use \Repository\RepositoryFactory;

class ProductService
{
    private $productRepo;

    /**
     * ProductService constructor.
     * @param $productRepo
     */
    public function __construct()
    {
        $this->productRepo = RepositoryFactory::buildRepository(RepositoryFactory::PRODUCT);
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function getAllProducts()
    {
        return $this->productRepo->getAll();
    }
    /**
     * @param Product $product
     * @return string|null
     */
    public function getSaison($product){
        if ($product->getMoisSemis() <= 3) {
            return 'Printemps';
        }
        elseif ($product->getMoisSemis() > 3 && $product->getMoisSemis() <= 6) {
            return 'Eté';
        }
        elseif ($product->getMoisSemis() > 6 && $product->getMoisSemis() <= 9) {
            return 'Automne';
        }
        elseif ($product->getMoisSemis() > 9 && $product->getMoisSemis() <= 12) {
            return 'Hiver';
        }
        else {
            return null;
        }
    }

    /**
     * @param Product $product
     * @return string
     */
    public function getStock($product){
        if($product->getStock() > 5){
            return '<span class="label label-success">Produit en stock</span>';
        }
        elseif($product->getStock() > 0 && $product->getStock() < 5) {
            return '<span class="label label-warning">Bientôt plus de stock</span>';
        }
        else{
            return '<span class="label label-danger">En attente de livraison</span>';
        }
    }

    /**
     * @param array $liste
     * @param string|null $type
     * @return array
     */
    public function getArticles($liste, $type){
        if ($type == null) {
            return $liste;
        }
        $retour = [];
        /**
         * @var Product $article
         */
        foreach ($liste as $article){
            if ($article->getType()->getId() == $type){
                $retour[] = $article;
            }
        }
        return $retour;
    }

    /**
     * @param array
     * @param string
     * @return array
     */
    public function getArticleByName($liste, $nom){
        $retour = [];
        /**
         * @var Product $article
         */
        foreach ($liste as $article){
            if (stripos($article->getNom(),$nom)!== false){
                $retour[] = $article;
            }
        }
        return $retour;
    }

    public function getArticleById(int $id)
    {
        return $this->productRepo->getOne($id);
    }

    public function create(Product $product)
    {
        return $this->productRepo->create($product);
    }

    public function update(Product $product)
    {
        return $this->productRepo->update($product);
    }

    public function delete(Product $product)
    {
        return $this->productRepo->delete($product);
    }

    public function getAllIdProducts()
    {
        return $this->productRepo->getAllIdProducts();
    }
}