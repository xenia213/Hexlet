<?php

/**
 * Класс Db представляет собой простую реализацию NoSQL базы данных, основанной на файлах. Она обладает очень простым интерфейсом. Метод get() принимает на вход ключ (любая строка) и возвращает значение этого ключа. Метод set() принимает на вход ключ и значение (любая строка).
 * 
 * Ограничения:
 * 
 * Максимальный размер ключа 8 байт.
 * Максимальный размер значения 100 байт.
 */

class Db
{
    private const KEY_LENGTH = 8;
    private const VALUE_LENGTH = 100;
    // BEGIN (write your solution here)
    private const ZERO = "\0";

    private $db;

    public function __construct($file)
    {
        if (!file_exists($file)) {
            touch($file);
        }
        $this->db = new \SplFileObject($file, 'r+');
    }

    public function get($key)
    {
        $this->db->rewind();
        while (!$this->db->eof()) {
            $currentKey = rtrim($this->db->fread(self::KEY_LENGTH), self::ZERO);
            $currentValue = rtrim($this->db->fread(self::VALUE_LENGTH), self::ZERO);
            if ($key === $currentKey) {
                return $currentValue;
            }
        }

        throw new Db\NotFoundException("'$key' is not exists");
    }

    public function set($key, $value)
    {
        $this->db->rewind();
        while (!$this->db->eof()) {
            $currentKey = rtrim($this->db->fread(self::KEY_LENGTH), self::ZERO);
            if ($key === $currentKey) {
                $this->write($value, self::VALUE_LENGTH);
                return;
            }
            $this->db->fread(self::VALUE_LENGTH);
        }

        $this->write($key, self::KEY_LENGTH);
        $this->write($value, self::VALUE_LENGTH);
    }

    private function write($data, $length)
    {
        $zeroLength = $length - strlen($data);
        $this->db->fwrite($data);
        $this->db->fwrite(str_repeat(self::ZERO, $zeroLength));
    }
    // END
}
