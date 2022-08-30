<?php

/**
 * Реализуйте функцию countVowels(), которая принимает строку, считает 
 * и возвращает количество гласных букв в ней.
 *
 * Для проверки, является ли буква гласной, импортируйте и используйте 
 * функцию isVowel(). Неймспес, в котором находится функция определён 
 * в файле Symbols.php.
 */

function countVowels($text)
{
    $len_text = strlen($text);
    $count = 0;

    for ($i=0; $i < $len_text; $i++) {

        $is_Vowel = isVowel($text[$i]);

        if ($is_Vowel === true) {
            $count++;
        }
    } return $count;
}