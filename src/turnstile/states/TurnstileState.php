<?php
namespace src;

use src\turnstile\Turnstile;

abstract class TurnstileState
{
    protected $turnstile;

    abstract function getStateText();

    public function __construct(Turnstile $turnstile)
    {
        $this->turnstile = $turnstile;
    }
}