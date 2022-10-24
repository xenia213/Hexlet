<?php

/**
 * Реализуйте функцию getHiddenFilesCount(), которая считает количество
 *  скрытых файлов в директории и всех поддиректориях. Скрытым файлом 
 * в Linux системах считается файл, название которого начинается с 
 * точки.
 */

function getHiddenFilesCount($node)
{
   $name = getName($node);
   if ((isFile($node)) || (str_starts_with($name, '.'))) {
       return 1;
   }

   $children = getChildren($node);
   $hiddenFiles = array_map(fn($child) => getHiddenFilesCount($child), $children);
   return array_sum($hiddenFiles);
}