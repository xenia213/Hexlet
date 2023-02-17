<?php

/**
 * Нaпишитe функцию sort(), кoтoрaя принимaeт нa вхoд списoк и сoртируeт eгo пo вoзрaстaнию.
 */
namespace sort;
include "html/Lists.php";

 use function html\Lists\l;
 use function html\Lists\isEmpty;
 use function html\Lists\head;
 use function html\Lists\tail;
 use function html\Lists\cons;
 use function html\Lists\filter;
 use function html\Lists\concat;
 use function html\Lists\toString as listToString;

function sort($list)
{
    if (isEmpty($list)){
        return l();
    }

    /*$iter = function ($list, $acc) use (&$iter) {
        if (isEmpty($list)){
            return $acc;
        }
       $newAcc = head($list) < $acc ? $acc : head($list);
       return $iter(tail($list), $newAcc);
    };
    $result = function ($list, $acc) use (&$result, $iter) {
        if (isEmpty($list)){
            return $acc;
        }
        $max = $iter($list, head($list));
        $newList = filter($list, fn($elem) => $elem != $max);
        $newMax = filter($list, fn($elem) => $elem === $max);
        return $result($newList, concat($newMax, $acc));
    };

    return $result($list, l());*/


    $middle = head($list);
    $other = tail($list);

    $left = filter($other, fn($value) => $value <= $middle);
    $right = filter($other, fn($value) => $value > $middle);

    return concat(sort($left), cons($middle, sort($right)));
}
