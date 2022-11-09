<?php

/**
 * Реализуйте функцию subRat(), которая производит вычитание рациональных чисел. 
 * При этом (с точки зрения внутренней реализации) функция возвращает в качестве 
 * результата новую пару (т.е. исходные пары, являющиеся параметрами функции, не 
 * изменяются).
 * 
 * Реализуйте функцию equalRat(), которая делает проверку двух рациональных чисел 
 * на равенство.
 */

use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString;

function makeRat($numer, $denom)
{
    return cons($numer, $denom);
}

function numer($rat)
{
    return car($rat);
}

function denom($rat)
{
    return cdr($rat);
}

function subRat($first, $second)
{
    return makeRat(numer($first) * denom($second) - numer($second) * denom($first), denom($first) * denom($second));
}

function equalRat($first, $second)
{
    return numer($first) * denom($second) == numer($second) * denom($first);
}
