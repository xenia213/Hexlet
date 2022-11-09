<?php

/**
 * Реализуйте функцию reversePair(), которая принимает на вход пару и возвращает другую, 
 * в которой значения переставлены местами
 * 
 * Реализуйте функцию sumOfPairs(), которая принимает на вход две пары и возвращает новую
 *  пару, в элементах которой находятся суммы элементов из исходных пар
 * 
 * Однажды вы сидели дома, когда курьер Василий принес вам коробку. С коробкой шла 
 * записка следующего содержания:
 * Коробка состоит из двух отсеков, в одном из которых письмо, а в другом лежит еще 
 * одна коробка, в которой также два отсека и точно также один отсек с письмом, а в 
 * другом - коробка. Коробки могут быть вложены друг в друга сколько угодно раз. Вам 
 * нужно добраться до коробки, внутри которой нет вложенной коробки ни в одном из двух 
 * отсеков, и отдать ее курьеру.
 * Подчеркну, что во всех коробках, кроме той последней, в одном отсеке письмо 
 * (любые данные, которые не являются парой), а в другом - всегда коробка, но никогда 
 * не две коробки одновременно. Сами отсеки при этом могут меняться, то есть в одной 
 * коробке отсеком с письмом может быть первый, а в другой - последний.
 * Реализуйте рекурсивную функцию findPrimitiveBox(), которая принимает на вход 
 * "коробку" (пару), находит внутри нее пару без вложенных пар (как описано выше) 
 * и возвращает наружу.
 */
use function Php\Pairs\Pairs\cons;
use function Php\Pairs\Pairs\car;
use function Php\Pairs\Pairs\cdr;
use function Php\Pairs\Pairs\toString;


function reversePair($pair)
{
    return (cons(cdr($pair), car($pair)));
}

function sumOfPairs($pair1, $pair2)
{
    $left = car($pair1) + car($pair2);
    $right = cdr($pair1) + cdr($pair2);
    return cons($left, $right);
}

function findPrimitiveBox($pair)
{
    $iter = function ($acc, $pair) use (&$iter) {
        if ($pair == null) {
            return $acc;
        }
        $rightPair = cdr($pair);
        $leftPair = car($pair);
        if (isPair($rightPair)) {
            return $iter(cons($rightPair, $acc), cdr($pair));
        } elseif (isPair($leftPair)) {
            return $iter(cons($leftPair, $acc), car($pair));
        } else {
            return $pair;
        }
    };

    return ($iter(null, $pair));
}



