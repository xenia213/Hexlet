<?php

/**
 * Реализуйте функцию compare($seq1, $seq2), которая сравнивает две строчки 
 * набранные в редакторе. Если они равны то возвращает true, иначе - false.
 *  Особенность строчек в тоm они mогут содержать сиmвол #, соответствующий 
 * нажатию клавиши Backspace. Она означает, что нужно стереть предыдущий сиmвол: 
 * abd##a# превращается в a.
 */
namespace Comparator;

//use \DS\Stack;

function compare($seq1, $seq2)
{
    if (empty($seq1) && empty($seq2)) {
        return true;
    }

    $stack = new \Ds\Stack();
    $func = function($elem) use ($stack) {
        if (($elem == '#') && ($stack ->isEmpty() != true)) {
            $stack -> pop();
        } elseif($elem != '#') {
            $stack -> push($elem);
        }
        return $stack;
    };
    array_map($func, str_split($seq1));
    $mapSeq1 = $stack -> copy();
    $stack->clear();
    array_map($func, str_split($seq2));
    $mapSeq2 = $stack -> copy();
    return $mapSeq1 == $mapSeq2 ? 'true' : 'false';

}

// 'ac' === 'ac'
compare('ab#c', 'ab#c'); // true
 
// '' === ''
compare('ab##', 'c#d#'); // true
 
// 'c' === 'b'
compare('a#c', 'b'); // false
 
// 'cd' === 'cd'
compare('#cd', 'cd'); // true
