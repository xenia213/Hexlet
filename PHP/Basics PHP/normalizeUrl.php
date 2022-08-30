<?php

/**
 * Реализуйте функцию normalizeUrl(), которая выполняет так 
 * называемую нормализацию данных. Она принимает адрес сайта 
 * и возвращает его с https:// в начале.
 * 
 * Функция принимает адреса в виде:
 * 
 * АДРЕС
 * http://АДРЕС
 * https://АДРЕС
 * Но всегда возвращает URL в виде https://АДРЕС
 */

function normalizeUrl($adress)
{
    $url = 'https://';
    $url_ps = substr($adress, 0, 8);
    $url_p = substr($adress, 0, 7);

    if ( $url_ps === $url) {

         return $adress;

    } elseif ($url_p === 'http://') {

         $adress_two = substr($adress, 7);
         return $url.$adress_two;

     } else {

         return $url.$adress;
     }
}

 $result = normalizeUrl('google.com');          
 
 print_r($result); 