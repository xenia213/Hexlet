<?php

/**
 * Измените функцию random() из видео так, чтобы можно было обнулять 
 * сгенерированную последовательность.
 */

function random($seed)
{
    $reset = $seed;
    return function ($func = 'generate') use (&$seed, $reset) {
        switch ($func) {
            case 'generate':
                $a = 45;
                $c = 21;
                $m = 67;
                $seed = ($a * $seed + $c) % $m;

                return $seed;
                break;
            case "reset":
                return $seed = $reset;
                break;
        };
    };
}
