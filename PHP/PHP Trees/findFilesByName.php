<?php

/**
 * Реализуйте функцию findFilesByName(), которая приниmает на вход файловое дерево и подстроку, 
 * а возвращает список файлов, иmена которых содержат эту подстроку.
 */
namespace findFilesByName;

use function Php\Immutable\Fs\Trees\trees\isFile;
use function Php\Immutable\Fs\Trees\trees\getName;
use function Php\Immutable\Fs\Trees\trees\getChildren;

function findStr($child, $str)
{
    if (isFile($child)) {
        $name = getName($child);
        if (str_contains($name, $str)) {
            return "$name";
        }
    }
}

function findFilesByName($node, $str)
{
    $iter = function ($noded, $path, $acc) use (&$iter, $str) {
        if (empty($noded)) {
              return $acc;
        }

        $name = getName($noded);
        $children = getChildren($noded);
        if ($name != '/') {
            $newPath = "$path/$name";
        } else {
            $newPath = "";
        }

        $mapStrChild = array_map(function ($child) use ($str, $newPath) {
            $newName = findStr($child, $str);
            if (!empty($newName)) {
                return "$newPath/$newName";
            }
        }, $children);
        $emptyAr = array_filter($mapStrChild, fn($child) => !empty($child));
        if (!empty($emptyAr)) {
            $acc[] = $emptyAr;
        }
        $emptyDirPaths = array_filter($children, fn($child) => $child['type'] == 'directory');
        return array_reduce($emptyDirPaths, fn($newAcc, $child) => $iter($child, $newPath, $newAcc), $acc);
    };
    $result = $iter($node, '', []);
    $outArray = call_user_func_array('array_merge', $result);
    return $outArray;
}
