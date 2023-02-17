<?php

/**
 * Реaлизуйте функцию filter() для библиoтеки html-tags, испoльзуя итерaтивный прoцесс.
 * 
 * Реaлизуйте функцию quotes(), кoтoрaя извлекaет из HTML тексты цитaт и вoзврaщaет списoк цитaт.
 */

use function Php\Pairs\Data\Lists\l;
use function Php\Pairs\Data\Lists\head;
use function Php\Pairs\Data\Lists\tail;
use function Php\Pairs\Data\Lists\cons;
use function Php\Pairs\Data\Lists\reverse;
use function Php\Pairs\Data\Lists\isEmpty;
use function Php\Html\Tags\HtmlTags\getValue;
use function Php\Html\Tags\HtmlTags\is;
use function Php\Html\Tags\HtmlTags\map;


function filter($elements, $func)
{
    $iter = function ($items, $acc) use (&$iter, $func) {
        if (isEmpty($items)) {
            return ($acc);
        }
        $headItems = head($items);
        $tailItems = tail($items);

        if ($func($headItems)) {
            return cons($headItems, $iter($tailItems, $acc));
        }
        return $iter($tailItems, $acc);
    };

    return $iter($elements, l());
}

function quotes($elements)
{
    $filtered = filter($elements, fn($element) => is('blockquote', $element));
    $result = map($filtered, fn($element) => getValue($element));
    return $result;
}

function removeHeaders($elements)
{
    if (isEmpty($elements)) {
        return l();
    }

    $element = head($elements);
    $tailElements = tail($elements);
    if (is('h1', $element)) {
        return removeHeaders($tailElements);
    }
    return cons($element, removeHeaders($tailElements));
}
