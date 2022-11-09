<?php

/**
 * Реализуйте функцию filter(), используя итеративный процесс.
 */

use function App\Pair\cons;
use function App\Pair\car;
use function App\Pair\cdr;
use function App\Pair\reverse;
use function App\Pair\listToString;

function filter($func, $list)
{
    $iter = function ($acc, $list) use (&$iter, $func) {
        if ($list == null) {
            return reverse($acc);
        } elseif ($func(car($list))) {
            return $iter(cons(car($list), $acc), (cdr($list)));
        } else {
            return $iter($acc, cdr($list));
        }
    };
    return $iter(null, $list);
}

