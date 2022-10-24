<?php

/**
 * Реализуйте функцию displayHistogram, которая выводит на экран 
 * вертикальную гистограмму. Функция принимает на вход количество бросков 
 * кубика и функцию, которая имитирует бросок игральной кости (её 
 * реализовывать не нужно). Вызов этой функции генерирует значение 
 * от 1 до 6, что соответствует одной из граней игральной кости.
 * 
 * Гистограмма содержит столбцы, каждому из которых соответствует грань игральной кости и количество выпадений этой грани. Результаты отображаются графически (с помощью символов #) и в виде процентного значения от общего количества бросков, за исключением случаев, когда количество равно 0 (нулю).
 * 
 * Дополнительные условия:
 * 
 * Процентные значения должны быть прижаты влево относительно столбца.
 * Значения сторон игральной кости должны быть посредине столбца.
 * Столбцы между собой разделены пробелом
 * Количество секций в столбце (высота столбца) должно соответствовать 
 * количеству выпадений каждой из сторон игральной кости.
 */


function displayHistogram($num, $roll)
{
    $results = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0];

    for ($i = 0; $i < $num; $i++) {
        $results[$roll()] += 1;
    }

    $maxResult = 0;
    $graphResults = [1 => [], 2 => [], 3 => [], 4 => [], 5 => [], 6 => []];

    foreach ($results as $key => $result) {
        if ($result > $maxResult) {
            $maxResult = $result;
        }
    }

    foreach ($results as $key => $result) {
        for ($i = $maxResult - $result; $i > 0; $i--) {
            $graphResults[$key][] = '   ';
        }
        $percent = round($result / $num * 100);
        $graphResults[$key][] = $result === 0 ? '   ' : "$percent%";
        for ($i = $result; $i > 0; $i--) {
            $graphResults[$key][] = '###';
        }
    }

    $histogram = array_fill(0, $maxResult + 1, []);
    
    for ($i = 0; $i < $maxResult + 1; $i++) {
        foreach ($graphResults as $graphKey => $graphResult) {
            $histogram[$i][] = $graphResult[$i];
        }
    }
    $histogramsLines = [];

    foreach ($histogram as $stringsNum => $line) {
        $histogramsLines[$stringsNum] = implode(' ', $line);
    }
    $dashes = str_repeat('-', count($graphResults) * 3 + count($graphResults) - 1);
    $histogramsLines[] = $dashes;

    $numbers = [];

    foreach ($graphResults as $graphKey => $graphResult) {
        $numbers[] = " $graphKey ";
    }
    $histogramsLines[] = implode(' ', $numbers);

    foreach ($histogramsLines as $stringsNum => $line) {
        if ($stringsNum !== $maxResult + 2) {
            print_r("$line\n");
        } else {
            print_r($line);
        }
    }
}
$rollDie = function () {
    return rand(1, 6);
};
displayHistogram(30, $rollDie);
// =>     23%
//        ###     20%
//        ### 17% ###
//    13% ### ### ### 13% 13%
//    ### ### ### ### ### ###
//    ### ### ### ### ### ###
//    ### ### ### ### ### ###
//    ### ### ### ### ### ###
//    -----------------------
//     1   2   3   4   5   6 
 
 
displayHistogram(10, $rollDie);
// =>                     30%
//    20% 20%     20%     ###
//    ### ###     ### 10% ###
//    ### ###     ### ### ###
//    ----------------------- 
//     1   2   3   4   5   6  
 