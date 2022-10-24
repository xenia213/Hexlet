<?php

/**
 * Для задания цветов в HTML и CSS используются числа в шестнадцатеричной 
 * системе счисления. Чтобы не возникало путаницы в определении системы 
 * счисления, перед шестнадцатеричным числом ставят символ решетки #, 
 * например, #135278. Обозначение цвета (rrggbb) разбивается на три 
 * составляющие, где первые два символа обозначают красную компоненту 
 * цвета, два средних — зеленую, а два последних — синюю. Таким образом 
 * каждый из трех цветов — красный, зеленый и синий — может принимать 
 * значения от 00 до FF в шестнадцатеричной системе исчисления.
 * 
 * src/Solution.php
 * При работе с цветами часто нужно получить отдельные значения красного, 
 * зеленого и синего (RGB) компонентов цвета в десятичной системе 
 * исчисления и наоборот. Реализуйте функции rgbToHex и hexToRgb, 
 * которые конвертируют цвета в соответствующие представления.
 * 
 * Функция hexToRgb принимает строку с цветом в шестнадцатеричном формате 
 * и возвращает массив компонентов.
 * 
 * Функция rgbToHex принимает 3 параметра (цветные компоненты) и 
 * возвращает строку.
 */

function hexToRgb($color)
{
    $red = hexdec(substr($color, 1, 2));
    $green = hexdec(substr($color, 3, 2));
    $blue = hexdec(substr($color, 5, 2));
    return ['r' => $red, 'g' => $green, 'b' => $blue];
}
function rgbToHex(...$colorRgb)
{
    $colorHex = array_map(function ($color) {
        $colorInHex = dechex($color);
        return strlen($colorInHex) === 1 ? "0$colorInHex" : $colorInHex;
    }, $colorRgb);
    return '#' . implode('', $colorHex);
}


/*function rgbToHex(mixed ...$colors): string
{
    $hex = array_map(fn($channel) => str_pad(dechex($channel), 2, '0', STR_PAD_LEFT), $colors);
    return '#' . implode('', $hex);
}

function hexToRgb(string $hex): array
{
    $value = ltrim($hex, '#');
    [$r, $g, $b] = array_map(fn($color) => hexdec($color), str_split($value, 2));
    return ['r' => $r, 'g' => $g, 'b' => $b];
}*/
