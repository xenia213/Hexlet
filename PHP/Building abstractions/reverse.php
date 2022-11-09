<?php

/**
 * Реализуйте функцию reverse(), которая переворачивает переданный на вход 
 * список используя итеративный рекурсивный процесс.
 */

use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\isPair;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\toString;

function reverse($list)
{
    $iter = function ($list, $acc) use (&$iter) {
        if ($list == null) {
            return $acc;
        } elseif (isPair(car($list))) {
            return $iter(cdr($list), cons(reverse(car($list)), $acc));
        } else {
            return $iter(cdr($list), cons(car($list), $acc));
        }
     };
    return $iter($list, null);
}