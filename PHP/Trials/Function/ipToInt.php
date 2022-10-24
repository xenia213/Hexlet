<?php

/**
 * Реализуйте функции ipToInt() и intToIp(), которые преобразовывают 
 * представление IP-адреса из десятичного формата с точками в 32-битное 
 * число в десятичной форме и обратно.
 * 
 * Функция ipToInt() принимает на вход строку и должна возвращать число. 
 * А функция intToIp() наоборот: принимает на вход число, а возвращает 
 * строку.
 * 
 * Эту задачу можно решить с помощью функций long2ip и ip2long, но 
 * подразумевается что вы сделаете это без их использования.
 */

function ipToInt(string $ip): int
{
    $ip8 = explode('.', $ip);
    $ip32 = array_map(function($intIp) {
        return str_pad(decbin($intIp), 8, "0", STR_PAD_LEFT);
    }, $ip8);
    return bindec(implode('', $ip32));
}

function intToIp(int $ip): string
{
    $ipBin = str_pad(decbin($ip), 32, "0", STR_PAD_LEFT);
    $ip32 = str_split($ipBin, 8);
    $ip8 = array_map(function($strIp) {
        return bindec($strIp);
    }, $ip32);
    return implode('.', $ip8);
}

