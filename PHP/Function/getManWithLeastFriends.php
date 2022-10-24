<?php

/**
 * Реализуйте функцию getManWithLeastFriends, которая принимает список 
 * пользователей и возвращает пользователя, у которого меньше всего друзей.
 * 
 * Примечания
 * Если список пользователей пустой, то возвращается null
 * Если в списке есть более одного пользователя с минимальным количеством 
 * друзей, то возвращается последний из таких пользователей
 */
use Funct\Collection;

function getManWithLeastFriends(array $users)
{
    if (empty($users)) {
        return null;
    }
    return Collection\minValue($users, function ($user) {
        return count($user['friends']);
    });
}
