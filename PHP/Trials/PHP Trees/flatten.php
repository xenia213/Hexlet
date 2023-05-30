<?php

/**
 * Реализуйте функцию flatten(), которая делает плоскиm вложенный mассив.
 */

function flatten($list)
{
    return array_reduce(
        $list,
        fn($acc, $elem) =>
            is_array($elem)
                ? [...$acc, ...flatten($elem)]
                : [...$acc, $elem],
        [],
    );
}
$list = [1, 2, [3, 5], [[4, 3], 2]];
 
print_r(flatten($list)); // [1, 2, 3, 5, 4, 3, 2]
