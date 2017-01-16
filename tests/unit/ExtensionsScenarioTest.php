<?php
namespace tests\unit;


class ExtensionsScenarioTest extends BaseScenario
{

    /**
     * Customer passes without inserting a coin
     * 1.a Customer passes without inserting a coin
     * The turnstile will raise an alarm
     * @scenario
     */
    public function customerPassWithoutPay()
    {
        $this->given('Locked')
            ->when('Customer pass')
            ->then('Turnstile will be', 'The turnstile will lock and raise an alarm');
    }

    /**
     * Customer will pay twice
     * 2.b Customer inserts a coin again
     * Turnstile remains unlocked
     * @scenario
     */
    public function customerPayTwice()
    {
        $this->given('Locked')
            ->when('Customer paid')
            ->and('Customer paid')
            ->then('Turnstile will be', 'The turnstile will unlock');
    }

    /**
     * Unlocking the turnstile SCENARIO
     * Given the turnstile is locked
     * When I add a coin
     * The turnstile will unlock
     * @scenario
     */
    public function unlockingTurnstile()
    {
        $this->given('Locked')
            ->then('Turnstile will be', 'The turnstile will lock')
            ->when('Customer paid')
            ->then('Turnstile will be', 'The turnstile will unlock');
    }

    /**
     * Given the turnstile is unlocked
     * When I pass trough the turnstile
     * The turnstile will lock
     * @scenario
     */
    public function lockingTurnstile()
    {
        $this->given('Unlocked')
            ->when('Customer pass')
            ->then('Turnstile will be', 'The turnstile will lock');
    }

    /**
     * Given the turnstile is locked
     * When I pass
     * An alarm is triggered
     * And If I add a coin
     * The alarm will end
     *
     * @scenario
     */
    public function raisingAnAlarm()
    {
        $this->given('Locked')
            ->when('Customer pass')
            ->then('Turnstile will be', 'The turnstile will lock and raise an alarm')
            ->when('Customer paid')
            ->then('Turnstile will be', 'The turnstile will lock');
    }

    /**
     * Given the turnstile is locked
     * When I add a coin
     * And then another coin
     * The turnstile will be unlocked
     * And If I pass The turnstile will be locked
     *
     * @scenario
     */
    public function gracefulyEatingMoney()
    {
        $this->given('Locked')
            ->when('Customer paid')
            ->when('Customer paid')
            ->then('Turnstile will be', 'The turnstile will unlock')
            ->when('Customer pass')
            ->then('Turnstile will be', 'The turnstile will lock');
    }

}
?>