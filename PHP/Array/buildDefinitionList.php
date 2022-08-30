<?php

/**
 * Реализуйте функцию buildDefinitionList, которая генерирует html список 
 * определений (теги dl, dt и dd) и возвращает получившуюся строку. При 
 * отсутствии элементов в массиве функция возвращает пустую строку.
 */

function buildDefinitionList($item)
{
    if (!empty($item)) {
        $parts = [];
        foreach ($item as $text) {
            $parts[] = "<dt>{$text[0]}</dt><dd>{$text[1]}</dd>";
        }
        $innerText = implode('', $parts);
        $result = "<dl>{$innerText}</dl>";
        return $result;
    } else {
        return '';
    }
}