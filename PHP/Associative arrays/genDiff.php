<?php

/**
 * Иногда в программировании возникает задача поиска разницы между двумя 
 * наборами данных, такими как ассоциативные массивы. Например, при поиске 
 * различий в json файлах. Для этого даже существуют специальные сервисы, 
 * например, http://www.jsondiff.com/ (попробуйте нажать на ссылку sample 
 * data и затем кнопку Compare).
 * 
 * src\Solution.php
 * Реализуйте функцию genDiff, которая сравнивает два ассоциативных 
 * массива и возвращает результат сравнения в виде ассоциативного массива. 
 * Ключами результирующего массива будут все ключи из двух входящих массивов, 
 * а значением строка с описанием отличий => added, deleted, changed или 
 * unchanged.
 * 
 * Возможные значения:
 * 
 * added — ключ отсутствовал в первом массиве, но был добавлен во второй
 * deleted — ключ был в первом массиве, но отсутствует во втором
 * changed — ключ присутствовал и в первом и во втором массиве, но 
 * значения отличаются
 * unchanged — ключ присутствовал и в первом и во втором массиве с 
 * одинаковыми значениями
 */

function genDiff($first, $second)
{
    $result = [];
    if (empty($second)) {
        $keys = array_keys($first);
        foreach ($keys as $key) {
            $result[$key] = 'deleted';
        }
    } elseif (empty($first)) {
        $keys2 = array_keys($second);
        foreach ($keys2 as $key2) {
            $result[$key2] = 'added';
        }
    } else {
        foreach ($second as $keySecond => $valueSecond) {
            foreach ($first as $keyFirst => $valueFirst) {
                if ($keyFirst === $keySecond) {
                    if ($valueFirst === $valueSecond) {
                        $result[$keyFirst] = 'unchanged';
                    } else {
                        $result[$keyFirst] = 'changed';
                    }
                } else {
                    if (!array_key_exists($keyFirst, $second)) {
                        $result[$keyFirst] = 'deleted';
                    }
                    if (!array_key_exists($keySecond, $first)) {
                        $result[$keySecond] = 'added';
                    }
                }
            }
        }
    }
    return $result;
}