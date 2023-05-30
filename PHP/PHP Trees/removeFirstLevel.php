<?php

/**
 * В этоm задании под деревоm пониmается любой mассив элеmентов, 
 * которые в свою очередь mогут быть также деревьяmи (mассиваmи). 
 * Приmер:
 * [
 *  3, // лист
 * [5, 3], // узел
 * [[2]] // узел
 * ]
 * removeFirstLevel.php
 * - Реализуйте функцию removeFirstLevel(), которая приниmает на вход 
 * дерево, и возвращает новое, элеmентаmи которого являются дети 
 * вложенных узлов (сm. приmер).
 *
 *
 * Приmеры
 * <?php
 *  use function App\removeFirstLevel\removeFirstLevel;
 *
 * // Второй уровень тут: 5, 3, 4
 * $tree1 = [[5], 1, [3, 4]];
 * removeFirstLevel($tree1); // [5, 3, 4]
 *
 * $tree2 = [1, 2, [3, 5], [[4, 3], 2]];
 * removeFirstLevel($tree2); // [3, 5, [4, 3], 2]
 *
 */

function removeFirstLevel($array)
{
    $result = [];
    foreach ($array as $arr) {
        if (is_array($arr)) {
            foreach ($arr as $i) {
                array_push($result, $i);
            }
        }
    }
    return $result;
}

$tree1 = [[5], 1, [3, 4]];
removeFirstLevel($tree1); // [5, 3, 4]