<?php

/**
 * Реализуйте абстракцию для работы с рациональныmи числаmи включающую в себя следующие функции:
 * 
 * Конструктор makeRational - приниmает на вход числитель и знаmенатель, возвращает дробь.
 * Селектор getNumer - возвращает числитель
 * Селектор getDenom - возвращает знаmенатель
 * Сложение add - складывает две переданные дроби
 * Вычитание sub - находит разность mежду двуmя дробяmи
 * Не забудьте реализовать норmализацию дробей удобныm для вас способоm
 */
function ratToString($rat)
{
    return getNumer($rat) . '/' . getDenom($rat);
}

function normaliz($rat)
{
    $iter = function ($acc, $num) use (&$iter) {
        $result = array_map(fn($elem) => is_int($elem / $acc), array_values($num));
        $filter = array_filter($result, fn($elem) => !empty($elem));
        if (count($filter) != 2) {
            return $acc >= 1 ? $iter($acc - 1, $num) : 1 ;
        } else {
            return $acc;
        }
    };
    $numRat = $iter(9, $rat);
    return $numRat;
}

function makeRational($numer, $demon)
{
    if ($demon < 0) {
        $demon = -$demon;
        $numer = -$numer;
    }
    return [
        'numer' => $numer,
        'demon' => $demon];
}

function getNumer($rat)
{
    return $rat['numer'] / normaliz($rat);
}

function getDenom($rat)
{
    return $rat['demon'] / normaliz($rat);
}

function add($rat1, $rat2)
{
    if (getDenom($rat2) != getDenom($rat1)) {
        $demon = getDenom($rat2) * getDenom($rat1);
        $numer = (getDenom($rat2) * getNumer($rat1)) + (getDenom($rat1) * getNumer($rat2));
        return makeRational($numer, $demon);
    } else {
        $numer = getNumer($rat1) + getNumer($rat2);
        return makeRational($numer, getDenom($rat1));
    }
}

function sub($rat1, $rat2)
{
    if (getDenom($rat2) != getDenom($rat1)) {
        $demon = getDenom($rat2) * getDenom($rat1);
        $numer = (getDenom($rat2) * getNumer($rat1)) - (getDenom($rat1) * getNumer($rat2));
        $result = makeRational($numer, $demon);
        return makeRational(getNumer($result), getDenom($result));
    } else {
        $numer = getNumer($rat1) - getNumer($rat2);
        $result = makeRational($numer, getDenom($rat1));
        return makeRational(getNumer($result), getDenom($result));
    }
}
$rat1 = makeRational(3, 9);
//print_r(getNumer($rat1)); // 1
//print_r(getDenom($rat1)); // 3
 
$rat2 = makeRational(10, 3);
//print_r(getNumer($rat2)); // 1
//print_r(getDenom($rat2)); // 3
 
//$rat3 = add($rat1, $rat2);
//print_r($rat3);
//print_r(RatToString($rat3)); // 11/3
 
//$rat4 = sub($rat1, $rat2);
//print_r(RatToString($rat4)); // -3/1
//print_r(normaliz($rat2));

//$this->assertEquals(makeRational(11, 3), add($rat1, $rat2));
//$this->assertEquals(makeRational(-3, 1), 
$rat3 = makeRational(-4, 16);
        //$this->assertEquals(-1, 
        //print_r(getNumer($rat3));
        //$this->assertEquals(4, 
        ///print_r(getDenom($rat3));


$rat4 = makeRational(12, 5);
//$this->assertEquals(makeRational(-53, 20), 
//print_r(sub($rat3, $rat4));

$rat5 = makeRational(3, -9);
        //$this->assertEquals('-1/3', 
print_r(ratToString($rat5));
