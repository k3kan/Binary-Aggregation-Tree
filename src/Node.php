<?php

namespace Binary\Aggregation\Tree;

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

    public function getNode($tree, $acc)
    {
        if ($tree->key !== null) {
            $acc[] = $tree->key;
        }
        $arrayTree = [$tree];
        return array_reduce($arrayTree, function ($newAcc, $node) use ($acc) {
            if ($node->left !== null) {
                $acc[] = $this->getNode($node->left, $newAcc);
            }
            if ($node->right !== null) {
                $acc[] = $this->getNode($node->right, $newAcc);
            }
            return $acc;
        }, $acc);
    }

    public function flatten(array $array)
    {
        $return = array();
        array_walk_recursive($array, function ($a) use (&$return) {
            $return[] = $a;
        });
        return $return;
    }

    public function getKeysTree()
    {
        $tree = new Node($this->key, $this->left, $this->right);
        $nodes = $this->getNode($tree, []);
        $flatten = $this->flatten($nodes);
        $keysTree = array_unique($flatten);
        return $keysTree;
    }

    public function toArray()
    {
        return array_values($this->getKeysTree());
    }
    public function getSum()
    {
        return array_sum($this->getKeysTree());
    }
    public function getCount()
    {
        return count($this->getKeysTree());
    }
    public function toString()
    {
        $string = implode(", ", $this->getKeysTree());
        return "($string)";
    }
    public function every($term)
    {
        $checkTerm = array_filter($this->getKeysTree(), $term);
        if (count($this->getKeysTree()) === count($checkTerm)) {
            return true;
        }
        return false;
    }
    public function some($term)
    {
        $checkTerm = array_filter($this->getKeysTree(), $term);
        if (count($checkTerm) > 0) {
            return true;
        }
        return false;
    }
}
