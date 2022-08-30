<?php

/**
 * Реализуйте функцию convertText(), которая принимает на вход 
 * строку и, если первая буква не заглавная, возвращает перевернутый 
 * вариант исходной строки. Если первая буква заглавная, то строка 
 * возвращается без изменений.
 */

function convertText($text)
{
    $letter_text_uc = ucfirst(substr($text, 0, 1));
    $letter_text = substr($text, 0, 1);
    return $letter_text === $letter_text_uc ? $text : strrev($text);
}
$result = convertText('Hello'); // 'Hello'
$result_rev = convertText('hello'); // 'olleh'
print_r($result. "\n" );
print_r($result_rev);