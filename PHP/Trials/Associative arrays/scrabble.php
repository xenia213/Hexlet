<?php

/**
 * Реализуйте функцию scrabble, которая принимает на вход два параметра: 
 * набор символов (строку) и слово, и проверяет, можно ли из переданного 
 * набора составить это слово. В результате вызова функция возвращает true 
 * или false.
 * 
 * При проверке учитывается количество символов, нужных для составления 
 * слова, и не учитывается их регистр.
 */

function scrabble($letters, $word)
{
    $letters = str_split(mb_strtolower($letters));
    $word = str_split(mb_strtolower($word));
    foreach ($word as $key => $value) {
        if (!in_array($value, $letters)) {
            return false;
        }
        unset($letters[array_search($value, $letters)]);
    }
    return true;
}