<?php

/**
 * Нaпишите функцию union(), кoтoрaя принимaет нa вхoд двa спискa и вoзврaщaет третий, 
 * являющийся oбъединением уникaльных знaчений двух исхoдных спискoв.
 */
namespace union;
include "html/Lists.php";

use function html\Lists\l;
use function html\Lists\isEmpty;
use function html\Lists\cons;
use function html\Lists\reduce;
use function html\Lists\has;
use function html\Lists\reverse;
use function html\Lists\toString as listToString;
use function html\Lists\concat;

function union($listOne, $listTwo)
{
    return reverse(reduce(concat($listOne, $listTwo), fn($list, $acc) => has($acc, $list) ? $acc : cons ($list, $acc), l()));
}

