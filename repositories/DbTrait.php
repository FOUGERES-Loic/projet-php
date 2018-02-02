<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 02/02/2018
 * Time: 15:01
 */

namespace Repository;


trait DbTrait
{
    /** @var \mysqli */
    private $source;

    /**
     * @return \mysqli
     */
    public function getSource(): \mysqli
    {
        return $this->source;
    }

    /**
     * @param \mysqli $source
     */
    public function setSource(\mysqli $source)
    {
        $this->source = $source;
        return $this;
    }

}