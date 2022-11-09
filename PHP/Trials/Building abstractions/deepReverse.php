<?php

/**
 * Реализуйте функцию deepReverse(), которая принимает список в качестве аргумента и 
 * возвращает в качестве значения список, где порядок элементов обратный и подсписки 
 * также обращены.
 */
function deepReverse($list)
{
    $mapped = map($list, function ($item) {
        if (isPair($item)) {
            return deepReverse($item);
        } else {
            return $item;
        }
    });
    return reverse($mapped);
}

deepReverse(l(3, 9, 0)); // (0, 9, 3)
deepReverse(l(l(4, 3), l(2, 1))); // ((1, 2), (3, 4))
