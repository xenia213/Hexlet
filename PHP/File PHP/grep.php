<?php

/**
 * Реализуйте функцию grep, принимающую на вход два параметра: подстроку 
 * для сопоставления и шаблон в формате glob, по которому будет происходить 
 * поиск.
 * 
 * Функция должна вернуть список всех строк файлов, в которых 
 * содержится подстрока. Поиск должен производиться по всем файлам 
 * переданного шаблона. Поиск не должен учитывать файлы в поддиректориях.
 * 
 * Пример:
 * 
 *  <?php
 *  count(grep('test', './*')); // 3
 */

function grep($string, $path)
{
    // BEGIN (write your solution here)
    $iterator = new \GlobIterator($path);
    $lines = [];

    foreach ($iterator as $path => $fileInfo) {
        if (!$fileInfo -> isFile()) {
            continue;
        }
        $content = file($path);
        foreach ($content as $line) {
            if (false !== strpos($line, $string)) {
                $lines[] = $line;
            }
        }
    }
    return $lines;
    // END
}