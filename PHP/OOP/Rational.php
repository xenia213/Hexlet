<?php

/**
 * Реализуйте класс для работы с рациональными числами, включающий в себя 
 * следующие методы:
 * 
 * Конструктор — принимает на вход числитель и знаменатель.
 * Метод getNumer() — возвращает числитель
 * Метод getDenom() — возвращает знаменатель
 * Сложение add() — прибавляет переданную дробь к дроби на которой был вызван метод.
 * Вычитание sub() — находит разность между дробью на которой был вызван 
 * метод и переданной дробью.
 * Нормализацию делать не надо!
 * 
 * Подобные абстракции, как правило, создаются неизменяемыми. Поэтому сделайте так, чтобы методы add() и sub() возвращали новое рациональное число, а не мутировали объект.
 */

class Rational
{
    public $numer;
    public $demon;

    function __construct($numer, $demon)
    {
        $this->numer = $numer;
        $this->demon = $demon;
    }

    function getNumer()
    {
        return $this -> numer;
    }

    function getDenom()
    {
        return $this -> demon;
    }

    function add($rational)
    {
        $numer = $this -> getNumer() * $rational -> getDenom() + $rational -> getNumer() * $this -> getDenom();
        $demon = $this -> getDenom() * $rational -> getDenom();
        return new Rational($numer, $demon);
    }

    function sub($rational)
    {
        $numer = $this -> getNumer() * $rational -> getDenom() - $rational -> getNumer() * $this -> getDenom();
        $demon = $this -> getDenom() * $rational -> getDenom();
        return new Rational($numer, $demon);
    }
}