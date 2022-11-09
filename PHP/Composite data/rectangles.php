<?php

/**
 * Реализуйте абстракцию (набор функций) для работы с прямоугольником, стороны которого всегда 
 * параллельны осям. Прямоугольник может располагаться в любом месте координатной плоскости.
 * 
 * При такой постановке задачи достаточно знать только три параметра для однозначного задания 
 * прямоугольника на плоскости: координаты левой-верхней точки, ширину и высоту. Зная их, мы 
 * всегда можем построить прямоугольник одним единственным способом.
 *       |
 *     4 |    точка   ширина
 *       |       *-------------
 *     3 |       |            |
 *       |       |            | высота
 *     2 |       |            |
 *       |       --------------
 *     1 |
 *       |
 * ------|---------------------------
 *     0 |  1   2   3   4   5   6   7
 *       |
 *       |
 * 
 * Основной интерфейс:
 * 
 * makeRectangle() (конструктор) - создаёт прямоугольник. Принимает параметры: левую-верхнюю точку, 
 * ширину и высоту.
 * Селекторы getStartPoint(), getWidth() и getHeight()
 * 
 * Вспомогательные функции для выполнения расчетов:
 * 
 * getSquare() - возвращает площадь прямоугольника ($a * $b).
 * getPerimeter() - возвращает периметр прямоугольника (2 * ($a + $b)).
 * containsTheOrigin() - проверяет, принадлежит ли центр координат прямоугольнику (не лежит на 
 * границе прямоугольника, а находится внутри). Чтобы в этом убедиться, достаточно проверить, что 
 * все вершины прямоугольника лежат в разных квадрантах (их можно вычислить в момент проверки).
 */


function makeRectangle($p, $width, $height)
{
    return [
        'p' => $p,
        'width' => $width,
        'height' => $height
    ];
}

function getStartPoint($rectangle)
{
    return $rectangle['p'];
}

function getWidth($rectangle)
{
    return $rectangle['width'];
}

function getHeight($rectangle)
{
    return $rectangle['height'];
}

function getSquare($rectangle)
{
    return getWidth($rectangle) * getHeight($rectangle);
}

function getPerimeter($rectangle)
{
    return 2 * (getWidth($rectangle) + getHeight($rectangle));
}

function containsTheOrigin($rectangle)
{
    $p = getStartPoint($rectangle);
    $width = getWidth($rectangle);
    $height = getHeight($rectangle);
    $b = makePoint((getX($p) + $width), (getY($p)));
    $c = makePoint((getX($b)), (getY($b) - $height));
    $d = makePoint((getX($c) - $width), (getY($c)));
    $arrayPoint = [getQuadrant($p), getQuadrant($b), getQuadrant($c), getQuadrant($d)];
    $sortPoint = array_unique($arrayPoint);

    if (in_array(null, $arrayPoint)) {
        return false;
    } elseif (count($sortPoint) == 4) {
        return true;
    } else {
        return false;
    }
}