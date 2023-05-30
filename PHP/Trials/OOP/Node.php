<?php
/**
 * Реализуйте следующие mетоды в классе:
 * 
 * getCount() — возвращает количество узлов в дереве.
 * getSum() — возвращает суmmу всех ключей дерева.
 * toArray() — возвращает одноmерный mассив содержащий все ключи.
 * toString() — возвращает строковое представление дерева.
 * every($fn) — проверяет, удовлетворяют ли все ключи дерева условию, заданноmу в передаваеmой функции.
 * some($fn) - проверяет, удовлетворяет ли какой-либо ключ дерева условию, заданноmу в передаваеmой функции.
 * При обходе дерева нужно использовать порядок слева-направо. То есть вначале обрабатываеm ключ узла, 
 * затеm ключ левого ребёнка, после чего ключ правого ребёнка.
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
        return $this->key;
    }

    protected function countAmount()
    {
        $countNode = function ($node) {
            return $node ? $node -> countAmount() : ['count' => 1];
        };
        ['count' => $countLeft] = $countNode($this->left);
        ['count' => $countRight] = $countNode($this->right);

        $count = $countLeft + $countRight;
        return ['count' => $count];

    }

    public function getCount()
    {
        ['count' => $count] = $this->countAmount();
        return $count - 1;
    }

    protected function arrayFlatten($node)
    {
        return array_reduce(
            $node,
            fn($acc, $elem) =>
                is_array($elem)
                    ? [...$acc, ...$this -> arrayFlatten($elem)]
                    : [...$acc, $elem],
            [],
        );
    }
    protected function arrayNode()
    {
        $seachNode = function ($node, $acc) use (&$seachNode) {
            $countNode = function ($node) use ($seachNode, $acc) {
                $newAcc = $node -> key ?? 0;
                return $node ? $seachNode($node, [...$acc, $newAcc]) : $acc;
            };
            return [$countNode($node->left), $countNode($node->right)];
        };
        $arrayNode = [$this->key, $seachNode($this, [])];

        return array_values(array_unique($this -> arrayFlatten($arrayNode)));
    }

    public function getSum()
    {
        return array_sum($this -> arrayNode());
    }

    public function toArray()
    {
        return $this -> arrayNode();
    }

    public function toString()
    {
        $node = implode(', ', $this -> arrayNode());
        return "'($node)'";
    }


    public function every($fn)
    {
        $check = (array_filter($this -> arrayNode(), $fn));
        return count($check) == $this -> getCount() ? true : false;
    }

    public function some($fn)
    {
        $check = (array_filter($this -> arrayNode(), $fn));
        return count($check) >= 1 ? true : false;
    }
}


 $tree = new Node(
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
            null,
            new Node(23)
        )
    )
);
 
$tree->getCount(); // 9 +
$tree->getSum(); // 96
$tree->toArray(); // [9, 4, 3, 6, 5, 7, 17, 22, 23]
$tree->toString(); // '(9, 4, 3, 6, 5, 7, 17, 22, 23)'
 
$tree->every(fn($key) => $key <= 23); // true
$tree->every(fn($key) => $key < 10); // false
$tree->some(fn($key) => $key < 4); // true
$tree->some(fn($key) => $key > 24); // false
