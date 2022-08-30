<?php

/**
 * Реализуйте функцию ages(), которая принимает на вход список пользователей 
 * и возвращает массив, в котором пользователи одинакового возраста 
 * расположены рядом. Порядок появления возрастов в массиве должен совпадать
 *  с порядком появления в исходном массиве.
 */

use function Functional\group;
use function Functional\flatten;
use function App\User\getAge;

function ages($array)
{
    $groupAges = group($array, function ($user) {
        return getAge($user);
    });

    return flatten($groupAges);
}