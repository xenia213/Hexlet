<?php

/**
 * Реализуйте класс User, который создает пользователей. Конструктор класса 
 * принимает на вход два параметра: идентификатор и имя.
 * 
 * Реализуйте интерфейс ComparableInterface для класса User. Сравнение 
 * пользователей происходит на основе их идентификатора.
 */


//src\ComparableInterface.php
namespace App;

// BEGIN (write your solution here)
interface ComparableInterface
{
    public function __construct($id, $name);
    public function getId();
    public function getName();
}
// END


//src\User.php
namespace App;

// BEGIN (write your solution here)
class User implements ComparableInterface
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function compareTo($user)
    {
        return $this -> id === $user -> getId();
    }
}
// END
