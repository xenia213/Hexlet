<?php

/**
 * Реализуйте функцию getMirrorMatrix, которая принимает двумерный массив 
 * (матрицу) и возвращает массив, изменённый таким образом, что правая 
 * половина матрицы становится зеркальной копией левой половины, 
 * симметричной относительно вертикальной оси матрицы. Для простоты 
 * условимся, что матрица всегда имеет чётное количество столбцов и 
 * количество столбцов всегда равно количеству строк.
 */

function getMirrorMatrix($matrix)
{
    $stack = [];
    $result = [];
    foreach ($matrix as $element) {
        $len = count($element) / 2 - 1;
        for ($i = $len; $i >= 0; $i--) {
            array_push($stack, $element[$i]);
            array_unshift($stack, $element[$i]);
        }
        $element = $stack;
        $stack = [];
        array_push($result, $element);
    }
    return $result;
}