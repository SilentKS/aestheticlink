<?php
namespace tests\unit;

use PHPUnit_Extensions_Story_TestCase;
use src\customer\CustomerFactory;
use src\turnstile\TurnstileFactory;


abstract class BaseScenario extends PHPUnit_Extensions_Story_TestCase
{

    public function runGiven(&$world, $action, $arguments)
    {
        switch($action) {
            case 'Locked': {
                $customer = (new CustomerFactory(10))
                    ->createCustomer();
                $world['turnstile']  = (new TurnstileFactory())
                    ->createTurnstile()
                    ->setCustomer($customer);
                break;
            }

            case 'Unlocked': {
                $customer = (new CustomerFactory(10))
                    ->createCustomer();
                $world['turnstile']  = (new TurnstileFactory())
                    ->createTurnstile()
                    ->setCustomer($customer)
                    ->setIsLock(false);
                break;
            }


            default: {
                return $this->notImplemented($action);
            }
        }
    }

    public function runWhen(&$world, $action, $arguments)
    {
        switch($action) {
            case 'Customer paid': {
                $world['turnstile']->payCoin();
                break;
            }
            case 'Customer pass': {
                $world['turnstile']->passCustomer();
                break;
            }

            default: {
                return $this->notImplemented($action);
            }
        }
    }

    public function runThen(&$world, $action, $arguments)
    {
        switch($action) {
            case 'Turnstile will be': {
                $this->assertEquals($arguments[0], $world['turnstile']->getState());
            }
                break;

            default: {
                return $this->notImplemented($action);
            }
        }
    }

}
?>