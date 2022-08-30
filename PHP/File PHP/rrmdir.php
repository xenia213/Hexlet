<?php

/**
 * Реализуйте функцию rrmdir, удаляющую директорию рекурсивно, то есть вместе 
 * со всем своим содержимым.
 */

function rrmdir($dir)
{
    // BEGIN (write your solution here)
    $files = array_diff(scandir($dir), array('.','..'));
    foreach ($files as $file) {
        (is_dir("$dir/$file")) ? rrmdir("$dir/$file") : unlink("$dir/$file");
    }
    return rmdir($dir);
    // END
}