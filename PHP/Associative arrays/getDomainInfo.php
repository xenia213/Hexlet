<?php

/**
 * Реализуйте функцию getDomainInfo(), которая принимает на вход имя 
 * сайта и возвращает информацию о нем:
 */

function getDomainInfo($domain)
{
    if ((substr($domain, 0, 5)) == 'https') {
        $protocol = 'https';
        $nameDomain = str_replace('https://', "", $domain);
    } elseif ((substr($domain, 0, 4)) == 'http') {
        $protocol = 'http';
        $nameDomain = str_replace('http://', "", $domain);
    } else {
        $protocol = 'http';
        $nameDomain = $domain;
    }
    $result = ['scheme' => $protocol , 'name' => $nameDomain];
    return $result;
}