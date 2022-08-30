<?php

/**
 * Реализуйте функцию getIntersectionOfSortedArray, которая принимает на 
 * вход два отсортированных массива и находит их пересечение.
 */

function getIntersectionOfSortedArray($arr1, $arr2)
{
    // BEGIN (write your solution here)
    $stack = [];
    for ($i = 0; $i < count($arr1); $i++) {
        $num = $arr1[$i];
        if (in_array($num, $arr2)) {
            array_push($stack, $num);
        }
    }
    return $stack;
    // END
}