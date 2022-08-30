<?php

/**
 * Операция умножения двух матриц А и В представляет собой вычисление 
 * результирующей матрицы С, где каждый элемент C(ij) равен сумме произведений 
 * элементов в соответствующей строке первой матрицы A(ik) и элементов в столбце
 *  второй матрицы B(kj).
 * 
 * Две матрицы можно перемножать только в том случае, если количество столбцов 
 * в первой матрице совпадает с количеством строк во второй матрице. Это значит, 
 * что первая матрица обязательно должна быть согласованной со второй матрицей. 
 * В результате операции умножения матрицы размера M×N на матрицу размером N×K 
 * является матрица размером M×K.
 * 
 * src\Solution.php
 * Реализуйте функцию multiply, которая принимает две матрицы и возвращает 
 * новую матрицу — результат их произведения.
 */

function multiply($matrix1, $matrix2)
{
    $rows1 = count($matrix1);
    $columns = count($matrix2[0]);
    $rows2 = count($matrix2);
    if (count($matrix1[0]) != $rows2) {
        throw new Exception('Несовместимые матрицы');
    }
    $result = array();
    for ($i = 0; $i < $rows1; $i++) {
        for ($j = 0; $j < $columns; $j++) {
            $result[$i][$j] = 0;
            for ($k = 0; $k < $rows2; $k++) {
                $result[$i][$j] += $matrix1[$i][$k] * $matrix2[$k][$j];
            }
        }
    }
    return($result);
}