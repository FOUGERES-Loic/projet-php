<?php
use \Repository\RepositoryFactory;
use \Service\ProductService;

if (!empty($_POST)) {
    $typeRepo = RepositoryFactory::buildRepository('type');
    $product = new \Entity\Product();
    $product->setNom($_POST['nom'])->setStock($_POST['stock'])
        ->setPrix($_POST['prix'])->setMoisSemis($_POST['mois'])
        ->setType($typeRepo->getOne($_POST['type']))->setImage($_POST['imageSave']);

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0)
    {
        if ($_FILES['image']['size'] <= 1000000) // < 1mo
        {
            $infosfichier = pathinfo($_FILES['image']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
            if(in_array($extension_upload, $extensions_autorisees))
            {
                $filename = basename($_FILES['image']['name']);
                move_uploaded_file($_FILES['image']['tmp_name'],
                    ROOT_PATH. $config->getImagepath() . $filename);
                $product->setImage($filename);
            } else {
                $errors['image'] = 'Format d\'image incorrect.';
            }
        }
    }

    if ($product->getStock() < 0) {
        $errors['stock'] = 'Le stock ne peut pas être négatif.';
    }
    if (0 > $product->getMoisSemis() || $product->getMoisSemis() > 11) {
        $errors['mois'] = 'Merci de choisir un mois dans la liste.';
    }
    if (!in_array($product->getType(), $listeTypes)) {
        $errors['type'] = 'Merci de choisir un type dans la liste.';
    }
    if (empty($product->getNom())) {
        $errors['nom'] = 'Le nom ne peut pas être laissé à vide.';
    }
    if ($product->getPrix() < 0) {
        $errors['prix'] = 'Le prix ne peut pas être négatif.';
    }

    if (!empty($_POST['id'])) $product->setId($_POST['id']);
    if (empty($errors)) {
        $productService = new ProductService();
        $product = ($_SERVER['SCRIPT_NAME'] == '/create.php') ? $productService->create($product) : $productService->update($product);
        header('Location: http://www.php.local/index.php?lastModify=' . $product->getId());
    }
}