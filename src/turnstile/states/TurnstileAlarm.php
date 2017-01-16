<?php
namespace src\turnstile\states;


use src\TurnstileState;

class TurnstileAlarm extends TurnstileState
{
    public function getStateText()
    {
        return 'The turnstile will lock and raise an alarm';
    }
}