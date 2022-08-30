<?php

/**
 * Реализуйте функции rotateLeft и rotateRight, которые поворачивают 
 * матрицу влево (против часовой стрелки) и соответственно вправо 
 * (по часовой стрелке).
 */

function rotateLeft($matrix)
{
    $matrixLeft = [];
    foreach ($matrix as $row) {
        foreach ($row as $i => $v) {
            $matrixLeft[$i][] = $v;
        }
    }
    $result = (array_reverse($matrixLeft));
    return $result;
}
function rotateRight($matrix)
{
    $height = count($matrix);
    $width = count($matrix[0]);
    $matrixRight = [];

    for ($i = 0; $i < $width; $i++) {
        for ($j = 0; $j < $height; $j++) {
            $matrixRight[$height - $i - 1][$j] = $matrix[$height - $j - 1][$i];
        }
    }
    $matrixRight = array_values($matrixRight);
    return $matrixRight;
}