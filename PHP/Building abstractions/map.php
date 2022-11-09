<?php

/**
 * Реализуйте функцию map() используя итеративный процесс.
 */

use function App\Pair\cons;
use function App\Pair\car;
use function App\Pair\cdr;
use function App\Pair\reverse;
use function App\Pair\listToString;

function map($func, $list)
{
    if (is_null($list)) {
        return null;
    } else {
        $num = map($func, cdr($list));
        return cons($func(car($list)), $num);
    }
}