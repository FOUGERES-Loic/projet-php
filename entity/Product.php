<?php

namespace Entity;

class Product
{
    /**
     * @var int
     */
    protected $id;

    protected $nom;
    protected $prix;
    protected $mois_semis;
    protected $stock;

    /**
     * @var Type
     */
    protected $type;
    protected $image;

    /**
     * Product constructor.
     */
    public function __construct()
    {
    }

        /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     * @return Product
     */
    public function setNom($nom)
    {
        if (empty($nom)) {
            $errors['nom'] = 'Le nom ne peut pas être laissé à vide.';
        }
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param mixed $prix
     * @return Product
     */
    public function setPrix($prix)
    {
        if ($prix < 0) {
            $errors['prix'] = 'Le prix ne peut pas être négatif.';
        }
        $this->prix = $prix;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMoisSemis()
    {
        return $this->mois_semis;
    }

    /**
     * @param mixed $mois_semis
     * @return Product
     */
    public function setMoisSemis($mois_semis)
    {
        if (0 > $mois_semis || $mois_semis > 11) {
            $errors['mois'] = 'Merci de choisir un mois dans la liste.';
        }
        $this->mois_semis = $mois_semis;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $stock = (int)$stock;
        if ($stock < 0) {
//            throw new \Exception('le stock ne peut pas être négatif!');
            $errors['stock'] = 'Le stock ne peut pas être négatif.';
        }
        $this->stock = $stock;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return Product
     */
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Product
     */
    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }

    /**
     * @param Type $type
     * @return Product
     */
    public function setType(Type $type): Product
    {
        if (!$type instanceof Type) {
//            throw new \Exception('le type fournit n\'est pas valide.');
            $errors['type'] = 'Merci de choisir un type dans la liste.';
        }
        $this->type = $type;
        return $this;
    }
}