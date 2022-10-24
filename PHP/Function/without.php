<?php

/**
 * Реализуйте функцию without, которая работает по такому же принципу, 
 * что и функция из теории, кроме одного аспекта. Эта функция должна 
 * принимать любое число аргументов, где первый аргумент массив, а все 
 * остальные - значения, которые нужно исключить из переданного массива. 
 * Сделайте решение функциональным.
 * 
 * Эту задачу можно решить с помощью функции array_diff, но подразумевается
 *  что вы сделаете это без ее использования.
 */

function without(array $lists, ...$meaning)
{
    $filter = array_reduce($lists, function ($acc, $list) use ($meaning) {
        if (!in_array($list, $meaning, true)) {
            $acc[] = $list;
        }
        return $acc;
    }, []);
    return (array_values($filter));
    /*$filter = array_filter($lists, function ($list) use ($meaning) {
        return !in_array($list, $meaning, true);
    });

    return array_values($filter);*/
}