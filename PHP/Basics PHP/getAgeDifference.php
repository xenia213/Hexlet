<?php

/**
 * Это задание не связано напрямую с уроком, это просто ещё одно 
 * полезное упражнение по работе с функциями.
 * 
 * Напишите функцию getAgeDifference(), которая принимает 
 * два года рождения и возвращает строку с разницей в возрасте 
 * в виде The age difference is 11. Например:
 */

function getAgeDifference($age_one, $age_two)
{
    $age = abs($age_one - $age_two);

    return "The age difference is {$age}";
}

$all = getAgeDifference('2003', '1984');
print_r($all);