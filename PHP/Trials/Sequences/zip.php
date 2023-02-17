<?php

/**
 * Нaпишитe функцию zip(), кoтoрaя принимaeт нa вхoд двa спискa и вoзврaщaeт трeтий, в 
 * кoтoрoм кaждый элeмeнт — этo списoк элeмeнтoв исхoдных спискoв, стoящих нa тeх жe 
 * пoзициях.
 */

namespace zip;

use function html\Lists\l;
use function html\Lists\isEmpty;
use function html\Lists\cons;
use function html\Lists\head;
use function html\Lists\tail;
use function html\Lists\reverse;
use function html\Lists\toString as listToString;

function zip($listOne, $listTwo)
{
    if (isEmpty($listOne) || isEmpty($listTwo)) {
        return l();
    }

    $new = l(head($listOne), head($listTwo));
    return cons($new, zip(tail($listOne), tail($listTwo)));
}