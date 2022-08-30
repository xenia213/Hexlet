<?php

/**
 * Треугольник Паскаля — бесконечная таблица биномиальных коэффициентов, 
 * имеющая треугольную форму. В этом треугольнике на вершине и по бокам 
 * стоят единицы. Каждое число равно сумме двух расположенных над ним чисел. 
 * Строки треугольника симметричны относительно вертикальной оси.
 */

function generate($row)
{
    $result = array_fill(0, $row+1, array_fill(0, $row*2+1, 0));
    for ($i = 0; $i <= $row; $i++) {
        for ($a = 0;$a <= $row*2+1; $a++) {
            if ($a == $row && $i == 0) {
                $result[$i][$row] = 1;
            } elseif ($i >= 1) {
                if (($a > 0) && ($a < $row * 2)) {
                    if (($result[$i-1][$a-1] == 1) && ($a == $row * 2 + 1)) {
                        $result[$i][$a] = 1;
                    } elseif (($result[$i-1][$a+1] !== 0) || ($result[$i-1][$a-1] !== 0)) {
                        $result[$i][$a] = $result[$i-1][$a-1] + $result[$i-1][$a+1];
                    }
                } elseif ($a == 0) {
                    if ($result[$i-1][$a+1] == 1) {
                        $result[$i][$a] = 1;
                    }
                } elseif ($a == $row*2) {
                    if ($result[$i-1][$a-1] == 1) {
                        $result[$i][$a] = 1;
                    }
                }
            }
        }
    }
    return array_values(array_filter($result[$row]));
}