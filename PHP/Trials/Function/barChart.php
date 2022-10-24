<?php

/**
 * Реализуйте функцию barChart(), которая выводит на экран столбчатую 
 * диаграмму. Функция принимает в качестве параметра последовательность 
 * чисел, длина которой равна количеству столбцов диаграммы. Размер 
 * диаграммы по вертикали должен определяться входными данными.
 */
function barChart($numSequence)
{
    $max = max($numSequence);
    $min = min($numSequence);
    if (($max >= 0) & ($min <= 0)) {
        $numRows = abs($min) + $max;
    } elseif ($max < 0) {
        $numRows = abs(min($numSequence));
    } else {
        $numRows = $max;
    }
    $arrayRows = array_fill(0, $numRows, '');

    $result = array_reduce($arrayRows, function ($acc, $rows) use ($numSequence, $max) {
        if ($max > 0) {
            $i = $max - count($acc) - 1 ;
        } else {
            $i =  0 - count($acc) - 1;
        }
        $num = array_map(function ($line) use ($i) {
            if ($i >= 0) {
                return $line > $i ?  '*' : ' ';
            } else {
                return $line <= $i & $line < 0 ? '#' : ' ';
            }
        }, $numSequence);
        $acc[] = implode($num);
        return $acc;
    }, []);
    print_r(implode("\n", $result));
}


//barChart([5, 10, -5, -3, 7]);
// =>  *   
//     *   
//     *   
//     *  *
//     *  *
//    **  *
//    **  *
//    **  *
//    **  *
//    **  *
//      ## 
//      ## 
//      ## 
//      #  
//      #  
 
//barChart([5, -2, 10, 6, 1, 2, 6, 4, 8, 1, -1, 7, 3, -5, 5]);
// =>   *            
//      *            
//      *     *      
//      *     *  *   
//      **  * *  *   
//    * **  * *  *  *
//    * **  ***  *  *
//    * **  ***  ** *
//    * ** ****  ** *
//    * ******** ** *
//     #        #  # 
//     #           # 
//                 # 
//                 # 
//                 # 

//barChart([1, 5, -3, 0, 4]);
$data = [
    ' *   ',
    ' *  *',
    ' *  *',
    ' *  *',
    '**  *',
    '  #  ',
    '  #  ',
    '  #  '
];
//barChart([-5, -10, -4, -6]);
$data = [
    '####',
    '####',
    '####',
    '####',
    '## #',
    ' # #',
    ' #  ',
    ' #  ',
    ' #  ',
    ' #  '
];

barChart([5, 10, 4, 6]);
        $data = [
            ' *  ',
            ' *  ',
            ' *  ',
            ' *  ',
            ' * *',
            '** *',
            '****',
            '****',
            '****',
            '****'
        ];