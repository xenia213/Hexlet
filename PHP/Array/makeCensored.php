<?php

/**
 * Реализуйте функцию makeCensored, которая заменяет каждое вхождение 
 * указанных слов в предложении на последовательность $#%! и возвращает 
 * полученную строку. Аргументы:
 * 
 * Текст
 * Набор стоп слов
 * Словом считается любая непрерывная последовательность символов, 
 * включая любые спецсимволы (без пробелов).
 */

function makeCensored($text, $stop)
{
    if (!empty($text)) {
        $words = explode(' ', $text);
        $arrayText = [];
        for ($i = 0; $i < sizeof($words); $i++) {
            $arrayText[] = in_array($words[$i], $stop) ? '$#%!' : $words[$i];
        }
        return implode(' ', $arrayText);
    } else {
        return '';
    }
}