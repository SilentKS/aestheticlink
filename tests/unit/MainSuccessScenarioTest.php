<?php

namespace tests\unit;

require ('../../vendor/autoload.php');

class MainSuccessScenarioTest extends BaseScenario
{

    /**
     * Customer inserts a coin and the turnstile unlocks
     * @scenario
     */
    public function statePay()
    {
        $this->given('Locked')
            ->when('Customer paid')
            ->then('Turnstile will be', 'The turnstile will unlock');
    }
    /**
     * Customer passes and turnstile locks
     * @scenario
     */
    public function statePayAndGo()
    {
        $this->given('Locked')
            ->when('Customer paid')
            ->and('Customer pass')
            ->then('Turnstile will be', 'The turnstile will lock');
    }

}
?>