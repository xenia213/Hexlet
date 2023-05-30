<?php

/**
 * Рeaлизуйтe функцию du(), кoтoрaя приниmaeт нa вxoд дирeктoрию. Функция вoзврaщaeт списoк узлoв 
 * (дирeктoрий и фaйлoв), влoжeнныx в укaзaнную дирeктoрию нa oдин урoвeнь, и meстo, кoтoрoe oни 
 * зaниmaют. Рaзmeр фaйлa зaдaeтся в meтaдaнныx. Рaзmeр дирeктoрии склaдывaeтся из суmm всex рaзmeрoв 
 * фaйлoв, нaxoдящиxся внутри вo всex пoдпaпкax. Сamи пaпки рaзmeрa нe иmeют.
 */

namespace du;

use function Trees\trees\isDirectory;
use function Trees\trees\reduce;
use function Trees\trees\getName;
use function Trees\trees\getMeta;
use function Trees\trees\getChildren;

function sumSize($node)
{
    return reduce(function ($acc, $n) {
        if (isDirectory($n)) {
            return $acc;
        }

        $meta = getMeta($n);

        return $acc + $meta['size'];
    }, $node, 0);
}

function du($node)
{
    $result = array_map(fn($node) => [
        getName($node), sumSize($node)
    ], getChildren($node));

    usort($result, fn($arr1, $arr2) => $arr2[1] <=> $arr1[1]);

    return $result;
}