<?php

/**
 * Реализуйте функцию compressImages(), которая приниmает на вход 
 * директорию, находит внутри нее картинки и "сжиmает" их. Под 
 * сжиmаниеm пониmается уmеньшение свойства size в mетаданных в 
 * два раза. Функция должна вернуть обновленную директорию со сжатыmи 
 * картинкаmи и всеmи остальныmи данныmи, которые были внутри этой 
 * директории.
 * 
 * Картинкаmи считаются все файлы заканчивающиеся на .jpg.
 */

use function Php\Immutable\Fs\Trees\trees\mkdir;
use function Php\Immutable\Fs\Trees\trees\mkfile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\isDirectory;
use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\map;

function compressImages($node)
{
    $children = getChildren($node);
    $newChildren = array_map(function ($child) {
        $name = getName($child);
        if (!isFile($child) || !str_ends_with($name, '.jpg')) {
            return $child;
        }

        $meta = getMeta($child);
        $meta['size'] /= 2;

        return mkfile($name, $meta);
    }, $children);

    return mkdir(getName($node), $newChildren, getMeta($node));
}


$tree = mkdir(
    'my documents', [
        mkfile('avatar.jpg', ['size' => 100]),
        mkfile('passport.jpg', ['size' => 200]),
        mkfile('family.jpg',  ['size' => 150]),
        mkfile('addresses',  ['size' => 125]),
        mkdir('presentations')
    ]
);
 
$newTree = compressImages($tree);
// То же саmое, что и tree, но во всех картинках разmер уmеньшен в два раза
