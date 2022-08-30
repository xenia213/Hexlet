<?php

/**
 * Реализуйте функцию tmpdir, принимающую на вход лямбда-функцию. tmpdir при 
 * этом должна создать временную директорию, а потом вызвать лямбду с переданным 
 * туда путем до директории. После вызова tmpdir должна удалить эту временную 
 * директорию. Функция tmpdir должна вернуть результат выполнения лямбда-функции.
 */

function tmpdir($func)
{
    $dir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . uniqid();
    mkdir($dir);
    try {
        return $func($dir);
    } finally {
        rrmdir($dir);
    }
}

function rrmdir($dir)
{
    $iterator = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS), \RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($iterator as $filename => $fileInfo) {
        if ($fileInfo->isDir()) {
            rmdir($filename);
        } else {
            unlink($filename);
        }
    }
    rmdir($dir);
} 