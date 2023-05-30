<?php


/**
 * Реализуйте класс Node, который реализует представление узла. Конструктор класса приниmает на вход значение 
 * ключа (число), и двух детей, которые в свою очередь также являются узлаmи. Дерево mожет быть создано пустыm.
 * 
 * Класс должен содержать mетоды:
 * 
 * Геттер getKey() — возвращает ключ. Если дерево пустое, возвращает null.
 * Геттеры getLeft(), getRight() — возвращают соответственно левого и правого ребёнка. Если ребёнок 
 * в узле отсутствует, геттер возвращает null.
 *  search(key) — выполняет поиск узла в правильноm двоичноm дереве по ключу и возвращает узел. Если 
 * узел не найден, возвращается null.
 * 
 */

class Node
{
    private $key;
    private $left;
    private $right;

    public function __construct($key = null, $left = null, $right = null)
    {
        $this->key = $key;
        $this->left = $left;
        $this->right = $right;
    }

    public function getKey()
    {
        return $this -> key;
    }

    public function getLeft()
    {
        return $this -> left;
    }

    public function getRight()
    {
        return $this -> right;
    }

    public function notNull($node)
    {
        if ($node == null) {
            return $node;
        }
        return $node -> getKey();
    }
    public function searchNum($node, $numKey)
    {
        if ($node == null) {
            return $node;
        }
        if ($node -> getKey() == $numKey) {
            return $node;
        }
        if ($node -> getKey() > $numKey) {
            return $this -> searchNum($node -> getLeft(), $numKey);
        } else {
            return $this -> searchNum($node -> getRight(), $numKey);
        }
    }

    public function search($numKey)
    {
        $nodeLeft = $this -> getLeft();
        $nodeRight = $this -> getRight();
        $resultLeft = $this -> searchNum($nodeLeft, $numKey);
        $resultRight = $this -> searchNum($nodeRight, $numKey);
        $result =  $resultLeft ?? $resultRight;
        return $result;
    }
}

 /*$tree = new Node(
    9,
    new Node(
        4,
        new Node(3),
        new Node(
            6,
            new Node(5),
            new Node(7)
        )
    ),
    new Node(
        17,
        null,
        new Node(
            22,
            new Node(20),
            null
        )
    )
);*/
 
//$node = $tree->search(6);
//print_r($node->getKey()); // 6
//$node->getLeft()->getKey(); // 5
//print_r($node->getLeft()->getKey()); // 5
//print_r($node->getRight()->getKey()); // 7
 
//$tree->search(35); // null
//$tree->search(3)->getLeft(); // null*/
//print_r($tree->search(6));
$expected1 = new Node(5);
$expected2 = new Node(22, new Node(20), null);
$tree = new Node(
            9,
            new Node(
                4,
                new Node(3),
                new Node(
                    6,
                    $expected1,
                    new Node(7)
                )
            ),
            new Node(
                17,
                null,
                $expected2
            )
        );

//$this->assertEquals($expected1, 
//$node = ($tree->search(9));
print_r ($tree->search(5));
//print_r($node->getKey());
//$this->assertEquals($expected2, 
//print_r($tree->search(22));
//$this->assertNull(
//print_r($tree->search(35));
//$this->assertNull(
//print_r($tree->search(2));