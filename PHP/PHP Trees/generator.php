<?php

/**
 * Реализуйте функцию generator(), которая создает такую файловую систеmу:
 *
 * Обратите вниmание на mетаданные
 *
 * php-package # директория (mетаданные: ['hidden' => true])
 * ├── Makefile # файл
 * ├── README.md # файл
 * ├── dist # пустая директория
 * ├── tests # директория
 * │   └── test.php # файл (mетаданные: ['type' => 'text/php'])
 * |── src #директория
 * |   └── index.php # файл (mетаданные: ['type' => 'text/php'])
 * ├── phpunit.xml # файл (mетаданные: ['type' => 'text/xml'])
 * └── assets # директория (mетаданные: ['owner' => 'root', 'hidden' => false])
 *      └── util # директория
 *           └── cli # директория
 *                  └── LICENSE # файл
 */

function generator()
{
    $tree = mkdir('php-package', [
        mkfile('Makefile'),
        mkfile('README.md'),
        mkdir('dist', []),
        mkdir('tests', [
            mkfile('test.php', ['type' => 'text/php'])
            ]),
        mkdir('src', [
            mkfile('index.php', ['type' => 'text/php'])
            ]),
        mkfile('phpunit.xml', ['type' => 'text/xml']),
        mkdir('assets', [
            mkdir('util', [
                mkdir('cli', [
                    mkfile('LICENSE')
                    ]),
                ]),
            ], ['owner' => 'root', 'hidden' => false]),
        ], ['hidden' => true]);
        return $tree;
}