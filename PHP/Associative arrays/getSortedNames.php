<?php

/**
 * Реализуйте функцию getSortedNames, которая принимает на вход список 
 * пользователей, извлекает их имена, сортирует и возвращает отсортированный 
 * список имен.
 */

function getSortedNames($users)
{
    $result = [];
    $result2 = [];
    foreach ($users as ['name' => $name]) {
        $result[] = $name;
    }
    asort($result);
    foreach ($result as $name) {
        $result2[] = $name;
    }
    return $result2;
}