<?php

/**
 * Реализуйте функцию flatten(), которая делает плоским вложенный список.
 */

namespace flatten;

use function html\Lists\l;
use function html\Lists\reverse;
use function html\Lists\cons;
use function html\Lists\isList;
use function html\Lists\reduce;
use function html\Lists\concat;
use function html\Lists\toString as listToString;

function flatten($list)
{
    $func = function ($list, $acc) use (&$func) {
        return !isList($list) ? cons($list, $acc) : reduce($list, $func, $acc);
    };
    $result = reduce($list, $func, l());
    return reverse($result);
}
