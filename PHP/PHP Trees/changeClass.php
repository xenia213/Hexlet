<?php

/**
 * Реализуйте функцию changeClass, которая приниmает на вход html-дерево и заmеняет во всех 
 * узлах переданное иmя класса на новое. Иmена классов передаются через параmетры.
 */
namespace changeClass;

function changeClass($tree, $oldName, $newName)
{
    $internalFiltered = array_map(function ($node) use ($oldName, $newName) {
        if ($node['type'] === 'tag-internal') {
            if (array_key_exists('className', $node)) {
                if ($node['className'] == $oldName) {
                      $node['className'] = $newName;
                }
            }
            return changeClass($node, $oldName, $newName);
        }
        return $node;
    }, $tree['children']);

    $tree['children'] = $internalFiltered;
      return $tree;
}
