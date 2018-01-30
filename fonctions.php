<?php
/**
 * @param string $currect_page
 */
function active($currect_page){
//    $url_array =  explode('/', $_SERVER['SCRIPT_NAME']) ;
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);
    if($currect_page == $url){
        echo 'active'; //class name in css
    }
}

/**
 * @param int $mois
 * @return string|null
 */
function getSaison($mois){
    if ($mois <= 3) {
        return 'Printemps';
    }
    elseif ($mois > 3 && $mois <= 6) {
        return 'Eté';
    }
    elseif ($mois > 6 && $mois <= 9) {
        return 'Automne';
    }
    elseif ($mois > 9 && $mois <= 12) {
        return 'Hiver';
    }
    else {
        return null;
    }
}

/**
 * @param int $stock
 * @return string
 */
function getStock($stock){
    if($stock > 5){
        return 'Produit en stock';
    }
    elseif($stock > 0 && $stock < 5) {
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
function getArticles($liste, $type){
    if ($type == null) {
        return $liste;
    }
    $retour = [];
    /**
     * @var Entity\Product $article
     */
    foreach ($liste as $article){
        if ($article->getType()->getName() == $type){
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
function getArticleByName($liste, $nom){
    $retour = [];
    /**
     * @var Entity\Product $article
     */
    foreach ($liste as $article){
        if (stripos($article->getNom(),$nom)!== false){
            $retour[] = $article;
        }
    }
    return $retour;
}