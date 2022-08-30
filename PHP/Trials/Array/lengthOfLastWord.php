<?php

/**
 * Реализуйте функцию lengthOfLastWord, которая возвращает 
 * длину последнего слова переданной на вход строки. Словом 
 * считается любая последовательность, не содержащая пробелов.
 */

function lengthOfLastWord($text)
{
    if (!empty($text)) {
        $words = explode(' ', $text);
        $words2 = array_diff($words, array(''));
        $result = ($words2[count($words2) - 1]);
        return (strlen($result));
    } else {
        return 0;
    }
}