<?php

/**
 * Реализуйте функцию summaryRanges, которая находит в массиве 
 * непрерывные возрастающие последовательности чисел и возвращает 
 * массив с их перечислением.
 */

function summaryRanges($numbers)
{
    $num = 0;
    $first = 0;
    $result = [];
    for ($i = 1; $i < count($numbers); $i++) {
        $diff = $numbers[$i] - $numbers[$i - 1];
        if ($diff == 1) {
            if ($num == 0) {
                $first = $numbers[$i - 1];
                $num++;
            } elseif ($i == (count($numbers) - 1)) {
                $last = $numbers[$i];
                $num--;
                $result[] = "{$first}->{$last}";
            }
        } elseif ($num) {
            $last = $numbers[$i - 1];
            $num--;
            $result[] = "{$first}->{$last}";
        }
    }
    return $result;
}