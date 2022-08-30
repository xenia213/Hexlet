<?php

/**
 * Реализуйте функцию getFormattedBirthday(), которая принимает на 
 * вход три параметра: день, месяц и год рождения, а возвращает их 
 * строкой в отформатированном виде, например: 20-02-1953.
 * 
 * <?php
 * 
 * $result = getFormattedBirthday(20, 2, 1953);
 * print_r($result); // => 20-02-1953
 * День и месяц нужно форматировать так, чтобы при необходимости 
 * добавлялся 0 слева. Например, если в качестве месяца пришла 
 * цифра 7, то в выходной строке она должна быть представлена как 07.
 */

function getFormattedBirthday($day, $mounth, $years)
{
    $format_day = sprintf("%02d", $day);
    $format_mounth = sprintf("%02d", $mounth);

    return "{$format_day}-{$format_mounth}-{$years}";
}

$result = getFormattedBirthday(20, 2, 1953);
print_r($result); // => 20-02-1953