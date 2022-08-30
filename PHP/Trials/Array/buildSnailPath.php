<?php

/**
 * Реализуйте функцию buildSnailPath, которая принимает на вход матрицу 
 * и возвращает список элементов матрицы по порядку следования от левого 
 * верхнего элемента по часовой стрелке к внутреннему. Движение по матрице 
 * напоминает улитку:
 */

function buildSnailPath(array $matrix): array
{
    $result = $matrix[0];
    $length = count($matrix[0]);
    $height = count($matrix);
    for ($i = $length - 1, $j = 1; $i > $length / 2, $j <= $height / 2; $i--, $j++) {
        for ($f = $j; $f <= $height - $j; $f++) {
            $result[] = $matrix[$f][$i];
        }
        for ($k = $i - 1; $k >= $length - $i - 1; $k--) {
            $result[] = $matrix[$height - $j][$k];
        }
        for ($d = $height - $j - 1; $d >= $j; $d--) {
            $result[] = $matrix[$d][$j - 1];
        }
        for ($n = $length - $i; $n < $i; $n++) {
            $result[] = $matrix[$j][$n];
        }
    }
    return $result;
}