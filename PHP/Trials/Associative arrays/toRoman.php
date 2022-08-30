<?php

/**
 * Для записи цифр римляне использовали буквы латинского алфавита: 
 * I, V, X, L, C, D, M. Например:
 * 
 * 1 обозначалась с помощью буквы I
 * 10 с помощью Х
 * 7 с помощью VII
 * Число 2020 в римской записи — это MMXX (2000 = MM, 20 = XX).
 * 
 * src/Solution.php
 * Реализуйте функцию toRoman(), которая переводит арабские числа в 
 * римские. Функция принимает на вход целое число в диапазоне от 1 до 3000, 
 * а возвращает строку с римским представлением этого числа.
 * 
 * Реализуйте функцию toArabic(), которая переводит число в римской 
 * записи в число, записанное арабскими цифрами. Если переданное римское 
 * число не корректно, то функция должна вернуть значение false.
 */

const ROMANNUMBERS = [
    'M' => 1000,
    'CM' => 900,
    'D' => 500,
    'CD' => 400,
    'C' => 100,
    'XC' => 90,
    'L' => 50,
    'XL' => 40,
    'X' => 10,
    'IX' => 9,
    'V' => 5,
    'IV' => 4,
    'I' => 1
];

function toRoman($number)
{
    $numberCopy = $number;
    $result = '';
    foreach (ROMANNUMBERS as $roman => $arabic) {
        $count = floor($numberCopy / $arabic);
        $numberCopy -= $count * $arabic;
        $result .= str_repeat($roman, $count);
    }
    return $result;
}

function toArabic($number)
{
    $exceptions = ['IIII', 'VV', 'VX'];
    $numberCopy = $number;
    $result = 0;
    if (!in_array($number, $exceptions)) {
        foreach (ROMANNUMBERS as $roman => $arabic) {
            while (strpos($numberCopy, $roman) === 0) {
                $result += $arabic;
                $numberCopy = substr($numberCopy, strlen($roman));
            }
        }
        return $result;
    } else {
        return false;
    }
}
