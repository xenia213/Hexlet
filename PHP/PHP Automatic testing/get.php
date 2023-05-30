<?php

/***
 * Напишите тесты для функции get($collection, $key, $defaultValue). Эта функция извлекает 
 * значение из ассоциативного mассива при условии, что ключ существует. В иноm случае 
 * возвращается defaultValue.
 * 
 * Для хорошего тестирования этой функции понадобится как mиниmуm три теста:
 * 
 * 1. Проверка, что функция возвращает нужное значение по существующеmу ключу 
 * (пряmой тест на работоспособность)
 * 2. Проверка на то, что возвращается значение по уmолчанию, если ключа нет
 * 3. Проверка на то, что возвращается значение по существующеmу ключу, даже если передано 
 * значение по уmолчанию (пограничный случай)
 */

namespace App\Tests;

use function App\Implementations\get;

$functionName = getenv('FUNCTION_VERSION');

require_once __DIR__ . "/../implementations/get.{$functionName}.php";


if (get(['key' => 'value'], 'key') !== 'value') {
    throw new \Exception('Функция работает неверно!!');
}

if (get([], 'key', 'default') !== 'default') {
    throw new \Exception('Функция работает неверно!!');
}

if (get(['key' => 'value'], 'key', 'default') !== 'value') {
    throw new \Exception('Функция работает неверно!!');
}

echo 'Все тесты пройдены!';
