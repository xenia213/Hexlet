<?php

/**
 * Анаграммы — это слова, которые образуются путём перестановки букв. 
 * Слова-анаграммы состоят из одного и того же набора букв и имеют 
 * одинаковую длину. Например:
 * 
 * спаниель — апельсин
 * карат — карта — катар
 * топор — ропот — отпор
 * 
 * src/Solution.php
 * Реализуйте функцию filterAnagrams(), которая находит все анаграммы слова.
 *  Функция принимает исходное слово и список для проверки (массив), 
 * а возвращает массив всех анаграмм. Если в списке слов отсутствуют 
 * анаграммы, то возвращается пустой массив.
 */

function filterAnagrams(string $world, array $list): array
{
    $arrayWorld = str_split($world);
    sort($arrayWorld);
    return array_values(array_filter($list, function ($letters) use ($arrayWorld) {
        $letter = str_split($letters);
        sort($letter);
        return $arrayWorld === $letter ;
    }));
}

filterAnagrams('abba', ['aabb', 'abcd', 'bbaa', 'dada']);
// ['aabb', 'bbaa']
 
filterAnagrams('racer', ['crazer', 'carer', 'racar', 'caers', 'racer']);
// ['carer', 'racer']
 
filterAnagrams('laser', ['lazing', 'lazy',  'lacer']);
// []