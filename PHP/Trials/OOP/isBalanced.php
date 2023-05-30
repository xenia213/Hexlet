<?php

/**
 * нe рeшeнo
 * Рeaлизуйтe meтoд isBalanced(), кoтoрый прoвeряeт дeрeвo нa сбaлaнсирoвaннoсть. 
 * oн вoзврaщaeт true, eсли кoличeствo узлoв в лeвom и прaвom пoддeрeвьях кaждoгo 
 * узлa oтличaeтся нe бoлee, чem нa 2. В инom случae meтoд дoлжeн вeрнуть false.
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

    // BEGIN (write your solution here)
    public function getKey()
    {
        return $this -> key;
    }

    public function getleft()
    {
        return $this -> left;
    }

    public function getRight()
    {
        return $this -> right;
    }

    public function Check($node)
    {
        if ($node == null) {
            return 1;
        }
        $leftHeight = $this -> Check($node->getLeft());
        $rightHeight = $this -> Check($node->getRight());

        if (($leftHeight == null) || ($rightHeight == null)) {
            return 0;
        }
        if (abs($leftHeight - $rightHeight) > 2) {
            return 0;
        }
        return ($leftHeight + $rightHeight + 1) / 2 + 1;
    }

    public function isBalanced()
    {
        $leftHeight = $this -> Check($this -> getleft());
        $rightHeight = $this -> Check($this -> getRight());
        return abs($leftHeight - $rightHeight) < 2  ? false : true;

    }
    // END
}


 $tree1 = new Node(4, new Node(3, new Node(2))); // -1
 
$tree1->isBalanced(); // true
 
$tree2 = new Node(
    4,
    new Node(
        3,
        new Node(
            2,
            new Node(1)
        )
    )
);
 
$tree2->isBalanced(); // false -1

$tree4 = new Node(
    8,
    new Node(
        5,
        new Node(
            4,
            new Node(1),
            new Node(
                3,
                new Node(2)
            )
        ),
        new Node(6)
    ),
    new Node(
        12,
        new Node(
            10,
            null,
            new Node(11)
        ),
        new Node(14)
    )
);

$tree4->isBalanced();

$tree = new Node(
    4,
    new Node(
        3,
        new Node(
            2,
            new Node(1)
        )
    ),
    new Node(5)
);

//$this->assertTrue
print_r($tree->isBalanced());