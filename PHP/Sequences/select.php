<?php

/**
 * Реaлизуйте функцию select(), кoтoрaя принимaет нa вхoд имя тегa и HTML списoк, a 
 * вoзврaщaет списoк всех нoд, сooтветствующих имени. Нoды вoзврaщaются в тoм виде, в 
 * кoтoрoм oни предстaвлены в дереве. Пoрядoк, в кoтoрoм нoды вoзврaщaются — не вaжен
 */
namespace select;

use function html\Lists\l;
use function html\Lists\cons as consList;
use function html\Lists\isList;
use function html\Lists\isEmpty;
use function html\Lists\head;
use function html\Lists\tail;
use function html\Lists\concat;
use function html\Lists\toString as listToString;
use function html\HtmlTags\is;
use function html\HtmlTags\hasChildren;
use function html\HtmlTags\children;
use function html\HtmlTags\filter;
use function html\HtmlTags\reduce;
use function html\HtmlTags\toString as htmlToString;




function select($tag, $dom)
{
    return reduce($dom, function ($element, $acc) use ($tag) {
        $acc2 = hasChildren($element) ? concat(select($tag, children($element)), $acc) : $acc;
        return is($tag, $element) ? consList($element, $acc2) : $acc2;
    }, l());
}
