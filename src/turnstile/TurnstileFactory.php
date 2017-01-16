<?php
namespace src\turnstile;

use src\turnstile\Turnstile;
/**
 * Class TurnstileFactory
 * @package src
 */
class TurnstileFactory
{
    /**
     * @var int
     */
    protected $price = 1;

    /**
     * @return Turnstile
     */
    public function createTurnstile()
    {
        return new Turnstile($this->price);
    }

    /**
     * @param $price
     * @return $this
     */
    public function setPrice($price){
        $this->price = $price;
        return $this;
    }

}