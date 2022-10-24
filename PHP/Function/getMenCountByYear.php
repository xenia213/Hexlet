<?php

/**
 * Реализуйте функцию getMenCountByYear(), которая принимает на вход список пользователей и 
 * возвращает массив, в котором ключ это год рождения, а значение это количество мужчин, 
 * родившихся в этот год.
 */

function getMenCountByYear(array $user)
{
    $usersMen = array_filter($user, function ($user) {
        return $user['gender'] == 'male';
    });

    $usersYears = array_map(function ($user) {
        return date('Y', strtotime($user['birthday']));
    }, $usersMen);

    return array_reduce($usersYears, function ($acc, $user) {
        if (!array_key_exists($user, $acc)) {
            $acc[$user] = 1;
        } else {
            $acc[$user] += 1;
        }

        return $acc;
    }, []);
}