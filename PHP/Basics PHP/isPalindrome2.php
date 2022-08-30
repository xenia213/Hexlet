<?php

/**
 * Палиндром — число, слово или текст, одинаково читающееся в обоих 
 * направлениях. Например: "радар", "топот".
 *
 * Реализуйте функцию isPalindrome(), которая принимает на вход слово, 
 * определяет является ли оно палиндромом и возвращает логическое значение.
 *
 * Для определения является ли слово палиндромом, достаточно сравнивать 
 * попарно символы с обоих концов слова. Если они все равны, то это 
 * палиндром. Решите задачу без использования реверса строки 
 * (функция strrev()).

 */

function isPalindrome($text)
{
    $i = 0;
    $middle = ceil(strlen($text) / 2);
    $end = strlen($text)-1;

    if ($end > 1) {
        while ($i < $middle ) {
            --$end;
            ++$i;
            $startText = '';
            $finishText = '';
            $startText = "{$startText}{$text[$i]}";
            $finishText = "{$finishText}{$text[$end]}";
        }
        if(($startText == $finishText) && $end % 2 == 0) {
            return true;
        } elseif ((($startText == $finishText) && $end % 2 >= 1)) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}