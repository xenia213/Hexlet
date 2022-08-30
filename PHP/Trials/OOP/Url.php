<?php

/**
 * Реализуйте класс Url который описывает переданный в конструктор HTTP 
 * адрес и позволяет извлекать из него части:
 */

namespace App;

class Url implements UrlInterface
{
    // BEGIN (write your solution here)
    private $address;

    public function __construct($address)
    {
        $this -> address = $address;
    }

    public function getScheme()
    {
        return parse_url($this -> address, PHP_URL_SCHEME);
    }

    public function getHost()
    {
        return parse_url($this -> address, PHP_URL_HOST);
    }

    public function getQueryParams()
    {
        $params = parse_url($this -> address, PHP_URL_QUERY);
        $params = explode("&", $params);
        $result = [];
        foreach ($params as $param) {
            $temp = explode("=", $param);
            $result[$temp[0]] = $temp[1];
        }
        return $result;
    }

    public function getQueryParam($key, $defaultValue = null)
    {
        $param = $this -> getQueryParams();
        $i = 0;
        foreach ($param as $keyParam => $value) {
            if ($key === $keyParam) {
                return $value;
            } else {
                $i++;
            }
        }
        if ($i > 1) {
            return $defaultValue;
        }
    }

    // END
}