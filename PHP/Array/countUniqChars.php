<?php

/**
 * Реализуйте функцию countUniqChars, которая получает на вход строку и 
 * считает, сколько символов (уникальных символов) использовано в этой 
 * строке. Например, в строке 'yy' всего один уникальный символ — y. А 
 * в строке '111yya!' — четыре уникальных символа: 1, y, a и !.
 * 
 * Задание необходимо выполнить без использования функций array_unique 
 * и count_chars.
 */

function countUniqChars($text)
{
    $sum = 0;
    $result = [];
    if ($text != '') {
        $text_array = mb_str_split($text);
        foreach ($text_array as $item) {
            if (!in_array($item, $result)) {
                $result[] = $item;
                $sum++;
            }
        }
        return $sum;
    } else {
        return 0;
    }
}