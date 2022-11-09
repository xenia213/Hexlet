<?php

/**
 * Реализуйте функцию solution(), которая принимает на вход список чисел 
 * и выполняет следующие действия:
 * 
 * удаляет все числа, не кратные трем.
 * возводит оставшиеся числа в квадрат.
 * возвращает среднее арифметическое списка полученного после предыдущей 
 * операции.
 */

use function Php\Pairs\Data\Lists\filter;
use function Php\Pairs\Data\Lists\map;
use function Php\Pairs\Data\Lists\reduce;
use function Php\Pairs\Data\Lists\length;
use function Php\Pairs\Pairs\toString;

function solution($list)
{
    $filterList = filter($list, function ($num) {
        return $num % 3 === 0;
    });
    $squareList = map($filterList, function ($num) {
        return $num ** 2;
    });
    $sumList = reduce($squareList, function ($num, $acc) {
        return $acc + $num;
    }, 0);
    return $sumList / length($squareList);
}
