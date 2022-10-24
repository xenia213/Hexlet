<?php

/**
 * Реализуйте функцию decode(), которая принимает cтроку в виде 
 * графического представления линейного сигнала и возвращает строку с 
 * бинарным кодом.
 */

function decode($signal)
{
    $values = preg_split("//u", $signal, -1, PREG_SPLIT_NO_EMPTY);
    return array_reduce(array_keys($values), function ($acc, $i) use ($values) {
        if ($i !== 0) {
            if ($values[$i - 1] === '|' && $values[$i] !== '|') {
                return "{$acc}1";
            } elseif ($values[$i - 1] !== '|' && $values[$i] !== '|') {
                return "{$acc}0";
            } else {
                return $acc;
            }
        } elseif ($values[$i] !== '|') {
            return "{$acc}0";
        } else {
            return $acc;
        }
    }, '');
}

$signal = '_|¯|____|¯|__|¯¯¯';
decode($signal); // '011000110100'
 
$signal_2 = '|¯|___|¯¯¯¯¯|___|¯|_|¯';
//decode($signal_2); // '110010000100111'
 
$signal_3 = '¯|___|¯¯¯¯¯|___|¯|_|¯';
//decode($signal_3); // '010010000100111'
