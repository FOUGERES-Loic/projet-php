<?php

namespace Controller;

class ProductController extends AbstractController
{
    public function home()
    {
        $TITLE_PAGE = 'Epicerie';

        $listeTypes = parent::getTs()->getAll();
        $articles = parent::getPs()->getAllProducts();

        $type = empty($_GET['type']) ? null : $_GET['type'];
        $articles = parent::getPs()->getArticles($articles, $type);
        $search = null;
        if (!empty($_POST['recherche'])) {
            $search = $_POST['recherche'];
            $articles = parent::getPs()->getArticleByName($articles, $search);
        }

        ob_start();

        include __DIR__.'/../views/includes/menu.php';
        $MENU = ob_get_clean();

        ob_start();

        include __DIR__.'/../views/home.php';
        $BODY = ob_get_clean();

        include __DIR__.'/../views/includes/layout.php';
    }
    public function create()
    {
        $TITLE_PAGE = 'Ajout';

        $listeTypes = parent::getTs()->getAll();
        $articles = parent::getPs()->getAllProducts();

        ob_start();
        include __DIR__.'/../views/includes/menu.php';
        $MENU = ob_get_clean();

        include __DIR__.'/../views/create.php';
        $BODY = ob_get_clean();

        include __DIR__.'/../views/includes/layout.php';
    }
    public function update()
    {
        $TITLE_PAGE = 'Mise à jour';


        $listeTypes = parent::getTs()->getAll();
        $articles = parent::getPs()->getAllProducts();

        ob_start();

        include __DIR__.'/../views/includes/menu.php';
        $MENU = ob_get_clean();

        include __DIR__.'/../views/update.php';
        $BODY = ob_get_clean();

        include __DIR__.'/../views/includes/layout.php';
    }

    private function validate(){
        if (!parent::getUs()->isConnected()) {
            header('location: /connection/login');
            exit;
        }
        return true;
    }
}