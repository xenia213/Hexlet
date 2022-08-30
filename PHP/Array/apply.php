<?php

/**
 * Реализуйте функцию apply(), которая применяет указанную операцию к 
 * переданному массиву и возвращает новый массив. Всего нужно реализовать 
 * три операции:
 * 
 * reset - Сброс массива
 * remove - Удаление значения по индексу
 * change - Обновление значения по индексу
 */

function apply(array $arr, string $operationName, int $index = null, $value = null): array
{
    // BEGIN (write your solution here)
    if ($operationName === 'reset') {
        //unset($animals[1]);
        $len_arr = count($arr);
        for ($i = 0; $i < $len_arr; $i++) {
            unset($arr[$i]);
        }
        return $arr;
    } elseif ($operationName === 'remove') {
        unset($arr[$index]);
        return $arr;
    } elseif ($operationName === 'change') {
        $arr[$index] = $value;
        return $arr;
    }
    // END
}