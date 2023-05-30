<?php

/**
 * Реализуйте mетод insert($key), который выполняет добавление узла, форmируя 
 * правильное двоичное дерево.
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

    public function getLeft()
    {
        return $this->left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function getKey()
    {
        if ($this -> key != null) {
            return is_int($this->key) ? $this->key : $this->key->key;
        } else {
            return null;
        }
    }

    public function insert($key)
    {
        $this -> insertNode($this -> key, $key);
    }

    protected function insertNode(&$node, $key)
    {
        if ($node == null) {
            $node = new Node($key);
        }
        if ($node -> key > $key) {
            $this -> left = $this -> insertNode($node -> left, $key);
        } elseif ($node -> key < $key) {
            $this -> right = $this -> insertNode($node -> right, $key);
        }
        return $node;
    }
   
}

$tree = new Node();
 $tree->insert(9);
 $tree->insert(17);
 $tree->insert(4);
 $tree->insert(3);
 $tree->insert(6);
 $tree->insert(22);
 $tree->insert(5);
 $tree->insert(7);
 $tree->insert(20);
 $tree->insert(4);
 $tree->insert(3);
  
print_r($tree->getKey()); // 9
$tree->Add(); // 9

//$this->assertEquals(4,  +
print_r($tree->getLeft()->getKey());

//$this->assertEquals(3, 
print_r($tree->getLeft()->getLeft()->getKey());

//$this->assertNull(
print_r($tree->getLeft()->getLeft()->getLeft());

//$this->assertNull(
print_r($tree->getLeft()->getLeft()->getRight());

//$this->assertEquals(6, 
print_r($tree->getLeft()->getRight()->getKey());

//$this->assertEquals(5, 
print_r($tree->getLeft()->getRight()->getLeft()->getKey());

//$this->assertNull(
print_r($tree->getLeft()->getRight()->getLeft()->getLeft());

//$this->assertNull(
print_r($tree->getLeft()->getRight()->getLeft()->getRight());

//$this->assertEquals(7, 
print_r($tree->getLeft()->getRight()->getRight()->getKey());

//$this->assertNull(
print_r($tree->getLeft()->getRight()->getRight()->getLeft());

//$this->assertNull(
print_r($tree->getLeft()->getRight()->getRight()->getRight());

//$this->assertEquals(17, 
print_r($tree->getRight()->getKey());

//$this->assertNull(
print_r($tree->getRight()->getLeft());

//$this->assertEquals(22, 
print_r($tree->getRight()->getRight()->getKey());

//$this->assertNull(
print_r($tree->getRight()->getRight()->getRight());

//$this->assertEquals(20, 
print_r($tree->getRight()->getRight()->getLeft()->getKey());

//$this->assertNull(
print_r($tree->getRight()->getRight()->getLeft()->getLeft());

print_r($tree->getRight()->getRight()->getLeft()->getRight());