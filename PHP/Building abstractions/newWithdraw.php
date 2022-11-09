<?php

/**
 * Напишите функцию newWithdraw(), которая снимает деньги со счета. 
 * При попытке снять больше денег, чем есть на счете, она должна возвращать 
 * too much.
 */

function newWithdraw($withdraw)
{
    return function ($amount) use (&$withdraw) {
        return $withdraw >= $amount ? $withdraw -= $amount : 'too much';
    };
}
