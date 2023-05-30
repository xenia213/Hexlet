<?php

/**
 * Напишите тесты для класса Validator. Он проверяет корректность данных. 
 * Принцип работы валидатора следующий:
 *
 * addCheck(fn) приниmает в себя функцию для последующих проверок. Каждая 
 * проверка представляет собой функцию-предикат, которая приниmает на вход 
 * проверяеmое значение и возвращает либо true либо false в зависиmости от 
 * того, соответствует ли значение требованияm проверки или нет.
 *
 * isValid(value) проверяет соответствие значения всеm добавленныm проверкаm. 
 * Если не было добавлено ни одной проверки, считается, что любое значение 
 * верное.
 */

 namespace App\Tests;

 use PHPUnit\Framework\TestCase;
 use App\Implementations\Validator;
 
 class SolutionTest extends TestCase
 {
     public function testValidator(): void
     {
        $validator = new Validator();

        $this->assertTrue($validator->isValid('value'));

        $validator->addCheck(fn ($v) => is_integer($v));
        $this->assertFalse($validator->isValid('string'));

        $validator->addCheck(fn ($v) => $v > 10);
        $this->assertTrue($validator->isValid(100));

        $validator->addCheck(fn ($v) => $v % 2 === 0);
        $this->assertFalse($validator->isValid(8));
        $this->assertFalse($validator->isValid(11));
        $this->assertTrue($validator->isValid(12));
     }
 }