<?php

/**
 * Реализуйте функцию slugify самостоятельно, не прибегая к 
 * \Funct\Strings\slugify. Преобразования, которые она должна делать:
 * 
 * Приводить к нижнему регистру все символы в строке
 * Удалять все пробелы
 * Соединять слова с помощью дефисов
 */

//use Funct;
//use Funct\Strings;
//use Funct\Collection;

//require __DIR__ . 'vendor/autoload.php';

function slugify($text)
{
    $lowerText = Strings\toLower($text);
    $arrayText = explode(" ", $lowerText);
    $compact = Collection\compact($arrayText);
    $separated = implode("-", $compact);
    return $separated;
}