<?php

/**
 * Напишите функции car() и cdr(), основываясь на реализации функции cons():
 * function cons($a, $b)
 * {
 *     return function ($callback) use ($a, $b)
 *     {
 *         return $callback($a, $b);
 *     };
 * }
 */

function cons($first, $second)
{
    return function ($callback) use ($first, $second) {
        return $callback($first, $second);
    };
}

function car($callback)
{
    return $callback(function ($first, $second) {
        return $first;
    });
}

function cdr($callback)
{
    return $callback(function ($first, $second) {
        return $second;
    });
}
