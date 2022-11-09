<?php

/**
 * Реализуйте функцию solution() которая принимает на вход список чисел и 
 * выполняет следующие действия:
 * 
 * округляет все числа в списке до верхней границы.
 * удаляет нечетные числа.
 * возвращает произведение оставшихся элементов.
 */

//ceil Округляет дробь в большую сторону

function solution($list)
{
    $ceilList = map($list, function ($num) {
        return ceil($num);
    });
    $filterList = filter($ceilList, function ($num) {
        return $num % 2 === 0;
    });
    $iter = reduce($filterList, function ($num, $acc) {
        return $acc * $num;
    }, 1);

    return $iter;
}
