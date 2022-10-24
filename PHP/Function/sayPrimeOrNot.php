<?php

/**
 * Реализуйте функцию sayPrimeOrNot(), которая проверяет переданное 
 * число на простоту и печатает на экран yes или no.
 *
 * Примеры
 * <?php
 * sayPrimeOrNot(5); // yes
 * sayPrimeOrNot(4); // no
*/
function isPrime($num)
{
    if ($num < 2) {
        return 'no';
    }
    for ($i = 2; $i <= $num; $i++) {
        $result = $num / $i;
        if ($result == 1) {
            return 'yes';
            break;
        } elseif (is_int($result) == true) {
            return 'no';
            break;
        }
    }
}
function sayPrimeOrNot($num)
{
    print_r(isPrime($num));
}
