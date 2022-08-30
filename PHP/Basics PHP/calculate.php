<?php

/*
 * В этом задании вам предстоит реализовать простейший калькулятор. 
 * Функция calculate() принимает следующие аргументы:
 * 
 * 1. операция в виде строки (поддерживаются 4 операции +, -, /, *)
 * 2. два числа (первый и второй операнд)
 * 
 * Результатом работы функции является применения операции к этим 
 * числам. Если передается операция, которая не поддерживается, то 
 * функция должна вернуть null.
 */

function calculate($sign, $num_one, $num_two)
{
    $symbol = array('+', '-', '/', '*');
    switch ($sign){
        case $symbol[0]:
            return $num_one + $num_two;
        case $symbol[1]:
            return $num_one - $num_two;
        case $symbol[2]:
            return $num_one / $num_two;
        case $symbol[3]:
            return $num_one * $num_two;
    }
}

$result_one = calculate('+', 3, 10); // 13
$result_two = calculate('-', -8, 6); // -14
$result_tree = calculate('$', 0, 9);  // null

print_r($result_one. "\n" );
print_r($result_two. "\n" );
print_r($result_tree);