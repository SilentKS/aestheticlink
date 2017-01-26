<?php
namespace src\turnstile;

use src\customer\Customer;
use src\turnstile\TurnstileStateObserver;

/**
 * Class Turnstile
 * @package src
 */
class Turnstile
{

    /**
     * @var int
     */
    private $price;
    /**
     * @var int
     */
    protected $isLock = true;
    /**
     * @var int
     */
    protected $isAlarm = false;
    /**
     * @var TurnstileStateObserver
     */
    protected $stateObserver;
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
        $this->stateObserver = new TurnstileStateObserver($this);
        $this->stateObserver->updateState();
    }

    /**
     * @param \src\customer\Customer $customer
     * @return $this
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
        return $this;
    }

    /**
     * Customer will pay coin to open turnstile
     */
    public function payCoin()
    {
        if(isset($this->customer) && $this->customer->paid($this->price)){
            if($this->isAlarm){
                $this->isAlarm = false;
            }
            $this->isLock = false;
            $this->stateObserver->updateState();
        }
    }

    /**
     *  Customer will pass turnstile
     */
    public function passCustomer()
    {
        if(!$this->isLock){
            $this->isLock = true;
            unset($this->customer);
        } else {
            $this->isAlarm = true;
        }
        $this->stateObserver->updateState();
    }

    /**
     * @return int
     */
    public function getIsAlarm()
    {
        return $this->isAlarm;
    }

    /**
     * @return int
     */
    public function getIsLock()
    {
        return $this->isLock;
    }

    /**
     * @param bool $lock
     * @return $this
     */
    public function setIsLock($lock){
        $this->isLock = $lock;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getState(){
        return $this->stateObserver->getState();
    }

}