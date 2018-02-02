<?php
/**
 * Created by PhpStorm.
 * User: HB1
 * Date: 02/02/2018
 * Time: 15:03
 */

namespace Repository;


interface DbTraitAwareInterface
{
    /**
     * @return \mysqli
     */
    public function getSource(): \mysqli;

    /**
     * @param \mysqli $source
     */
    public function setSource(\mysqli $source);


}