<?php
namespace src;

use src\Customer;

/**
 * Class Turnstile
 * @package src
 */
class Turnstile
{
    const STATE_LOCK = 0;
    const STATE_UNLOCK = 1;

    const STATE_ALARM_ON = 3;
    const STATE_ALARM_OFF = 4;

    /**
     * @var int
     */
    private $price;
    /**
     * @var int
     */
    protected $state;
    /**
     * @var int
     */
    protected $alarm;
    /**
     * @var Customer
     */
    protected $customer;

    /**
     * Turnstile constructor.
     * @param int $price
     */
    public function __construct($price = 1)
    {
        $this->price = $price;
        $this->state = static::STATE_LOCK;
        $this->alarm = static::STATE_ALARM_OFF;
    }

    /**
     * @param \src\Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     *
     */
    public function payCoin()
    {
        if($this->customer->paid($this->price)){
            $this->state = static::STATE_UNLOCK;
        }
    }

    /**
     *
     */
    public function passCustomer()
    {
        unset($this->customer);
        $this->state = static::STATE_LOCK;
    }
}