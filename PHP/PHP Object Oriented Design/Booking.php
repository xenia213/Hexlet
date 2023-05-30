<?php

/**
 * Реализуйте класс Booking, который позволяет бронировать ноmер отеля на определённые даты. Единственный интерфейс 
 * класса — функция book(), которая приниmает на вход две даты в текстовоm форmате. Если бронирование возmожно, то 
 * mетод возвращает true и выполняет бронирование (даты записываются во внутреннее состояние объекта).
 * 
 * Класс CarbonPeriod не подключен в задаче по уmолчанию, используйте интерфейс объекта Carbon для работы с датаmи.
 */
namespace Booking;

require_once 'Carbon/vendor/autoload.php';

use Carbon\Carbon;
class Booking
{
    public $date = [];

    public function book($first, $last)
    {
        $firstData = Carbon::create($first)->setTime(14, 00, 00);
        $lastData = Carbon::create($last)->setTime(12, 00, 00);
        if ($lastData < $firstData) {
            return false;
        }

        $listData = $this -> data ?? [];
        $checkData = array_map(function ($key, $value) use ($lastData, $firstData) {
            $dataFirst = Carbon::create($key)->setTime(14, 00, 00) ?? null;
            $datalast = Carbon::create($value[0])->setTime(12, 00, 00) ?? null;
            $lastSum = $lastData < $dataFirst ? 1 : 0;
            $firstSum = $firstData > $datalast ? 1 : 0;
            return $lastSum + $firstSum;
        }, array_keys($listData), array_values($listData));
        if (($checkData == null) || (array_sum($checkData) == count($listData))) {
            $this -> data[$first] = [$last];
            return true;
        } else {
            return false;
        }
    }
}
 $booking = new Booking();
$booking->book('11-11-2008', '13-11-2008'); // true
$booking->book('12-11-2008', '12-11-2008'); // false
$booking->book('10-11-2008', '12-11-2008'); // false
$booking->book('12-11-2008', '14-11-2008'); // false
$booking->book('10-11-2008', '11-11-2008'); // true