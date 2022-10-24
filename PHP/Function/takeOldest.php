<?php

/**
 * Реализуйте функцию takeOldest, которая принимает на вход список 
 * пользователей и возвращает самых взрослых. Количество возвращаемых 
 * пользователей задается вторым параметром, который по-умолчанию 
 * равен единице.
 */

function takeOldest(array $users, int $num = 1)
{
    usort($users, function ($first, $second) {
         return strtotime($first['birthday']) <=> strtotime($second['birthday']);
    });
    return firstN($users, $num);
}