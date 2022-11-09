<?php

/**
 * Измените функцию newAccount() из видео так, чтобы она создавала счета, 
 * защищенные паролем.
 */

function newAccount($balance, $password)
{
    $withdraw = function ($amount) use (&$balance) {
        return $balance -= $amount;
    };

    $deposit = function ($amount) use (&$balance) {
        return $balance += $amount;
    };

    return function ($fucName, $amount, $pass) use ($withdraw, $deposit, $password) {
        if ($pass != $password) {
            return "wrong password!";
        }
        switch ($fucName) {
            case "withdraw":
                return $withdraw($amount);
                break;
            case "deposit":
                return $deposit($amount);
                break;
        }
    };
}