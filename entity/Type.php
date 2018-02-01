<?php

namespace Entity;

class Type
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    protected $name;

    /**
     * Type constructor.
     * @param string $name
     */
    public function __construct()
    {
//        $this->name = $name;
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
     * @return Type
     */
    public function setId(int $id): Type
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Type
     */
    public function setName(string $name): Type
    {
        $this->name = $name;
        return $this;
    }
}