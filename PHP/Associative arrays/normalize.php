<?php

/**
 * Реализуйте функцию normalize(), которая "нормализует" данные переданного 
 * урока. То есть приводит их к определенному виду.
 * 
 * На вход этой функции подается ассоциативный массив, 
 * описывающий собой урок курса. В уроке содержатся два поля: 
 * имя и описание.
 */

function normalize(array &$lesson)
{
    foreach ($lesson as $key => &$value) {
        if ($key == 'name') {
            $value = mb_convert_case($value, MB_CASE_TITLE, "UTF-8");
        } elseif ($key == 'description') {
            $value = mb_convert_case($value, MB_CASE_LOWER_SIMPLE, "UTF-8");
        }
    }
}
