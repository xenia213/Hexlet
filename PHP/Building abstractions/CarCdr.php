<?php

/**
 * В текущем задании представлен другой способ реализации пар.
 *
 * Допишите функцию car() основываясь на том как работает функция cons().
 * Допишите функцию cdr() основываясь на том как работает функция cons().
 */

function cons($x, $y)
{
    return function ($func) use ($x, $y) {
        return $func($x, $y);
    };
}

function car(callable $pair)
{
    return $pair(function ($x, $y) {
        return $x;
    }); 
}

function cdr(callable $pair)
{
    return $pair(function ($x, $y) {
        return $y;
    }); 
}

$pair = cons(1, 2);
