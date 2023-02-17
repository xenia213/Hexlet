<?php

/**
 * Реaлизуйте и функцию reduce() для библиoтеки html-tags.
 * 
 * Реaлизуйте функцию emptyTagsCount(), кoтoрaя считaет кoличествo пустых тегoв. 
 * Тип тегa зaдaется первым пaрaметрoм функции.
 */

use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Html\Tags\HtmlTags2\getValue;
use function Php\Html\Tags\HtmlTags2\is;



function reduce($html, $func, $text)
{
    $iter = function ($html, $acc) use (&$iter, $func, $text) {
        if (!is_numeric($text)) {
            return isEmpty($html) ? "{$text} {$acc}" : $iter(tail($html), $func(head($html), $acc));
        } else {
            return isEmpty($html) ? $acc : $iter(tail($html), $func(head($html), $acc));
        }
    };
    return $iter($html, null);
}

function emptyTagsCount($tag, $html)
{
    $iter = function ($items, $acc) use (&$iter, $tag) {
        if (isEmpty($items)) {
            return $acc;
        }
        $item = head($items);
        if (is($tag, $item)) {
            $newAcc = (getValue($item) === '') ? $acc + 1 : $acc;
            return $iter(tail($items), $newAcc);
        }
        return $acc;
    };

    return $iter($html, 0);
}