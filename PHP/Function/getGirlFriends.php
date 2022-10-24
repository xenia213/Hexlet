<?php

/**
 * Реализуйте функцию getGirlFriends, которая принимает на вход список пользователей и 
 * возвращает плоский список подруг всех пользователей (без сохранения ключей). Друзья 
 * каждого пользователя хранятся в виде массива в ключе friends. Пол доступен по ключу 
 * gender и может принимать значения male или female.
 */

use function Funct\Collection\flatten;

// BEGIN (write your solution here)
function getGirlFriends(array $users)
{
    $friends = array_map(fn($user) => $user['friends'], $users);
    $flattenFriends = flatten($friends);
    $gender = array_filter($flattenFriends, fn($user) => $user['gender'] == 'female');
    return array_values($gender);
}