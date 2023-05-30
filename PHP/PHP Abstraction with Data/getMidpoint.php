<?php

/**
 * Рeaлизуйтe функцию getMidpoint(), кoтoрaя нaхoдит тoчку пoсeрeдинe meжду 
 * двуmя укaзaнныmи тoчкamи
 */
function getMidpoint($point1, $point2)
{
    $x = ($point1['x'] + $point2['x']) / 2;
    $y = ($point1['y'] + $point2['y']) / 2;
    return ['x' => $x, 'y' => $y];
}
 $point1 = ['x' => 0, 'y' => 0];
 $point2 = ['x' => 4, 'y' => 4];
 $point3 = getMidpoint($point1, $point2);
 print_r($point3); // => [ 'x' => 2, 'y' => 2 ]
 