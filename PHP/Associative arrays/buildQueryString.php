<?php

/**
 * Query String (строка запроса) — часть адреса страницы в интернете содержащая 
 * константы и их значения. Она начинается после вопросительного знака и идет 
 * до конца адреса. Пример:
 * 
 * # query string: page=5
 * https://ru.hexlet.io/blog?page=5
 * Если параметров несколько, то они отделяются амперсандом &:
 * 
 * # query string: page=5&per=10
 * https://ru.hexlet.io/blog?per=10&page=5
 * 
 * src/AssociativeArrays.php
 * Реализуйте функцию buildQueryString, которая принимает на вход список 
 * параметров и возвращает сформированный query string из этих параметров:
 * 
 * buildQueryString(['per' => 10, 'page' => 1 ]);
 * // → page=1&per=10
 */

function buildQueryString($array)
{
    $result = '';
    ksort($array);
    foreach ($array as $key => $value) {
        $result = "{$result}&{$key}={$value}";
    }
    return (substr($result, 1));
}