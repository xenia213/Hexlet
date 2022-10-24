<?php

/**
 * Реализуйте функцию enlargeArrayImage, которая принимает изображение в 
 * виде двумерного массива и увеличивает его в два раза.
 */

use Funct\Collection;

function enlargeArrayImage(array $img)
{
    return array_reduce($img, function ($acc, $image) {
        $row = array_reduce($image, function ($accImg, $symbol) {
            $accImg[] = $symbol;
            $accImg[] = $symbol;
            return $accImg;
        }, []);
        $acc[] = $row;
        $acc[] = $row;
        return $acc;
    }, []);
}


$image = [
    ['*','*','*','*'],
    ['*',' ',' ','*'],
    ['*',' ',' ','*'],
    ['*','*','*','*']
  ];
  // ****
  // *  *
  // *  *
  // ****
   
  enlargeArrayImage($image);
  // ********
  // ********
  // **    **
  // **    **
  // **    **
  // **    **
  // ********
  // ********