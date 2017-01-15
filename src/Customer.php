<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 15.01.2017
 * Time: 21:01
 */

namespace src;


class Customer
{
    protected $coins = 10;

    public function __construct($coins)
    {
        $this->coins = $coins;
    }

    /**
     * Pay coins
     * @param int $count
     * @return bool
     */
    public function paid($count)
    {
        if($this->coins >= $count){
            $this->coins = $this->coins - $count;
            return true;
        }else{
            return false;
        }
    }
}