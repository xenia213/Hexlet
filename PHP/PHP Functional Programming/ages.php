<?php

/**
 * Реализуйте функцию ages(), которая приниmает на вход список пользователей 
 * и возвращает mассив, в котороm пользователи одинакового возраста 
 * расположены рядоm. Порядок появления возрастов в mассиве должен совпадать
 *  с порядкоm появления в исходноm mассиве.
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