<?php

/** 
 * Реализуйте функцию sortDeps(), которая принимает на вход список зависимостей и 
 * возвращает список (массив) отсортированных узлов.
 */

function sortDeps($deps)
{

    $depKeys = array_keys($deps);

    $iter = function ($acc, $elem) use (&$iterChildren, $deps) {
        return count($deps[$elem]) > 0 ?
            [...$acc, ...$iterChildren($deps[$elem]), $elem] :
            [...$acc, $elem];
    };

    $iterChildren = function ($child) use ($depKeys, $iter){
        $toIterChild = function($acc, $elem) use ($depKeys, $iter) {
           return in_array($elem, $depKeys) ?
                $iter($acc, $elem) :
                [...$acc, $elem];
        };
        return array_reduce($child, $toIterChild, []);
    };
    $sortDeps = array_reduce($depKeys, $iter, []);
    return array_reduce($sortDeps, function ($acc, $elem) {
        return in_array($elem, $acc) ? $acc : [...$acc, $elem];
    }, []);

}


 $deps1 = [
    'mongo' => [],
    'tzinfo' => ['thread_safe'],
    'uglifier' => ['execjs'],
    'execjs' => ['thread_safe', 'json'],
    'redis' => [],
  ];

  $deps2 = [
    'mongo' => [],
    'tzinfo' => ['thread_safe' ],
    'thread_safe' => ['argrgr' ],
    'uglifier' => ['execjs'],
    'execjs' => ['thread_safe', 'json'],
    'redis' => [],
  ];
  print_r(sortDeps($deps1));
  // => ['mongo', 'thread_safe', 'tzinfo', 'json', 'execjs', 'uglifier', 'redis'];
