<?php
use \Repository\RepositoryFactory;
use \Service\ProductService;

if (!empty($_POST)) {
    $typeRepo = RepositoryFactory::buildRepository('type');
    $product = new \Entity\Product();
    $product->setNom($_POST['nom'])->setStock($_POST['stock'])
        ->setPrix($_POST['prix'])->setMoisSemis($_POST['mois'])
        ->setType($typeRepo->getOne($_POST['type']));

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
            }
        }
    }

    if (!empty($_POST['id'])) $product->setId($_POST['id']);
    $productService = new ProductService();
    $product = ($_SERVER['SCRIPT_NAME'] == '/create.php') ? $productService->create($product) : $productService->update($product);
    header('Location: http://www.php.local/index.php?lastModify='.$product->getId());
}