<?php

/**
 * Определите функцию sameParity(), которая принимает список построенный на парах и возвращает 
 * отфильтрованный список у которого четность каждого элемента совпадает с четностью первого 
 * элемента этого списка.
 */

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\filter;
use function Php\Pairs\Data\Lists\reverse;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;

function sameParity($list)
{
    if ($list == null) {
        return null;
    }

    $evenList = filter($list, function ($item) {
        return $item % 2 == 0;
    });
    $oddList = filter($list, function ($item) {
        return $item % 2 != 0;
    });

    return car($list) % 2 == 0 ? $evenList : $oddList;
}
