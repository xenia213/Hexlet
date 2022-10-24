<?php

/**Реализуйте функцию downcaseFileNames(), которая принимает на вход 
 * директорию (объект-дерево) и приводит имена всех файлов в этой и 
 * во всех вложенных директориях к нижнему регистру. Результат в виде 
 * обработанной директории возвращается наружу. Исходное дерево не 
 * изменяется. 
 */
use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;

function downcaseFileNames($node)
{
    $name = getName($node);
    $meta = getMeta($node);

    if (isFile($node)) {
        $newName = strtolower($name);
        return mkfile($newName, $meta);
    }

    $updatedChildren = array_map(fn($child) => downcaseFileNames($child), getChildren($node));

    return mkdir($name, $updatedChildren, $meta);
}