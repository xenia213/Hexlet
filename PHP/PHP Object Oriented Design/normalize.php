<?php

/**
 * Реализуйте функцию normalize() которая приниmает на вход список городов, 
 * производит внутри некоторые преобразования и возвращает структуру 
 * определенного форmата.
 */

 namespace Normalize;

 require_once 'vendor/autoload.php';

function normalize($list)
{
    $newList = array_reduce($list, function ($acc, $item) {
        $acc[] = array_map(fn($elem) => strtolower(trim($elem)) ,$item);
        return $acc;
    });
    $grouped = collect($newList) ->mapToGroups(function ($item, $key) {
                return [$item['country'] => $item['name']];
                }) ->sort() -> map(fn($num) => $num -> unique() -> sort() -> values()) ->toArray();
    return $grouped;

    /**
     * return collect($raw)
        ->map(fn($value) =>
            array_map(fn($item) =>
                mb_strtolower($item), $value))
        ->map(fn($value) =>
            array_map(fn($item) =>
                trim($item), $value))
        ->mapToGroups(fn($item) =>
            [$item['country'] => $item['name']])
        ->map(fn($cities) =>
            $cities->unique()->sort()->values())
        ->sortKeys()
        ->toArray();
     */
}
$raw = [
    [
        'name' => 'istambul',
        'country' => 'turkey'
    ],
    [
        'name' => 'Moscow ',
        'country' => ' Russia'
    ],
    [
        'name' => 'iStambul',
        'country' => 'tUrkey'
    ],
    [
        'name' => 'antalia',
        'country' => 'turkeY '
    ],
    [
        'name' => 'samarA',
        'country' => '  ruSsiA'
    ],
];

$actual = normalize($raw);
// $expected = [
//     'russia' => [
//         'moscow', 'samara'
//     ],
//     'turkey' => [
//         'antalia', 'istambul'
//     ]
// ];