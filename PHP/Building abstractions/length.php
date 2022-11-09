<?php

/**
 * src/Length.php
 * Реализуйте функцию length(), которая считает длину списка;
 * 
 * src/Append.php
 * Реализуйте функцию append(), которая соединяет два списка;
 * 
 * Попробуйте сначала представить как работала бы функция copy(), 
 * которая принимает на вход список и возвращает его копию.
 * 
 * src/Reverse.php
 * Реализуйте функцию reverse(), которая переворачивает список;
 */

use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString;


function append($list1, $list2)
{
    if (is_null($list1)) {
        return $list2;
    } else {
        return cons(car($list1), append(cdr($list1), $list2));
    }
}

function length($items)
{
    $num = function ($items, $n) use (&$num) {
        if (is_null($items)) {
            return $n;
        } else {
            return $num(cdr($items), $n + 1);
        }
    };
    return $num($items, 0);
}

function reverse($list)
{
    $reversList = function ($result, $list) use (&$reversList) {
        if (is_null($list)) {
            return $result;
        } else {
            return $reversList(cons(car($list), $result), cdr($list));
        }
    };
    return $reversList(null, $list);
}