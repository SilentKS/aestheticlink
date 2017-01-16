<?php
namespace src\turnstile;

use src\turnstile\states\TurnstileAlarm;
use src\turnstile\states\TurnstileLock;
use src\turnstile\Turnstile;
use src\TurnstileState;

/**
 * Class TurnstileStateObserver
 * @package src
 */
class TurnstileStateObserver
{
    /**
     * @var Turnstile
     */
    protected $turnstile;
    /**
     * @var TurnstileState
     */
    protected $state;

    /**
     * TurnstileStateObserver constructor.
     * @param Turnstile $turnstile
     */
    public function __construct(Turnstile $turnstile)
    {
        $this->turnstile = $turnstile;
        $this->updateState();
    }

    /**
     *
     */
    public function updateState()
    {
        if($this->turnstile->getIsAlarm()){
            $this->state = new TurnstileAlarm($this->turnstile);
        }else{
            $this->state = new TurnstileLock($this->turnstile);
        }
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state->getStateText();
    }
}