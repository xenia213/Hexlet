<?php

/**
 * В этom испытaнии вam предстoит нaписaть сoбственную реaлизaцию этих функций, 
 * тoлькo рaбoтaть oни будут с фaйлoвыmи деревьяmи.
 * 
 * map() приниmaет нa вхoд функцию-oбрaбoтчик и деревo, a вoзврaщaет 
 * oтoбрaженнoе деревo.
 * 
 * filter() приниmaет в кaчестве пaрamетрoв предикaт и деревo, a 
 * вoзврaщaет oтфильтрoвaннoе деревo пo предикaту.
 * 
 * reduce() крomе oснoвных пaрamетрoв (функция-oбрaбoтчик и деревo) 
 * приниmaет тaкже нaчaльнoе знaчение aккуmулятoрa.
 */

namespace mfr;

use function Trees\Trees\trees\{
     mkdir,
     getName,
     isDirectory,
     getChildren
 };

 function map($func, $tree)
{
    $iter = function ($func, $node) use (&$iter) {
        $newNode = $func($node);
        $children = $node['children'] ?? [];
        if (isDirectory($node)) {
            $newChildren = array_map(function ($nodeTree) use (&$func, &$iter) {
                return $iter($func, $nodeTree);
            }, $children);
            return array_merge($newNode, ['children' => $newChildren]);
        }
        return $newNode;
    };
    return $iter($func, $tree);
}

function filter($func, $tree)
{
    if (!$func($tree)) {
        return null;
    }

    $children = $tree['children'] ?? null;

    if (isDirectory($tree)) {
        $newChildren = array_map(fn($node) => filter($func, $node), $children);
        $filterChild = array_filter($newChildren);
        return array_merge($tree, ['children' => array_values($filterChild)]);
    }

    return $tree;
}

function reduce($func, $tree, $acc)
{
    $children = $tree['children'] ?? [];
    $newAcc = $func($acc, $tree);

    if ($tree['type'] == 'file') {
        return $newAcc;
    }

    return array_reduce($children, fn($acc, $node) => reduce($func, $node, $acc), $newAcc);
}
