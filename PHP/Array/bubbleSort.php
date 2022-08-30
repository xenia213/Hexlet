<?php

/**
 * Реализуйте функцию bubbleSort, которая сортирует массив используя 
 * пузырьковую сортировку. Постарайтесь не подглядывать в текст теории и 
 * попробуйте воспроизвести алгоритм по памяти.
 */

function bubbleSort($num)
{
    $sum = count($num);

    do {
        $result = false;
        for ($i = 0; $i < $sum - 1; $i++) {
            if ($num[$i] > $num [$i + 1]) {
                $temp = $num[$i];
                $num[$i] = $num[$i + 1];
                $num[$i + 1] = $temp;
                $result = true;
            }
        }
        $sum--;
    } while ($result);

    return $num;
}