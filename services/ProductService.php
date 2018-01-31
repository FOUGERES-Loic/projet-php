<?php

namespace Service;

use \Entity\Product;

class ProductService
{
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
            return 'Produit en stock';
        }
        elseif($product->getStock() > 0 && $product->getStock() < 5) {
            return 'Bientôt plus de stock';
        }
        else{
            return 'En attente de livraison';
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
}