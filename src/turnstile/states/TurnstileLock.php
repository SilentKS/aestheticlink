<?php
namespace src\turnstile\states;


use src\TurnstileState;

class TurnstileLock extends TurnstileState
{
    public function getStateText()
    {
        if($this->turnstile->getIsLock()){
            return 'The turnstile will lock';
        }else{
            return 'The turnstile will unlock';
        }

    }
}