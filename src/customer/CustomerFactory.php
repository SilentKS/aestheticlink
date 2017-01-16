<?php

namespace src\customer;


class CustomerFactory
{
    protected $baseCoins = 10;

    public function __construct($baseCoins)
    {
        $this->baseCoins = $baseCoins;
    }

    /**
     * @return Customer
     */
    public function createCustomer()
    {
        return new Customer($this->baseCoins);
    }
}