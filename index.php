<?php

namespace Binary\Aggregation\Tree\Index;

require __DIR__ . '/vendor/autoload.php';

use Binary\Aggregation\Tree\Node;

$tree = new Node(  //Example
    9,
    new Node(
        4,
        new Node(8),
        new Node(
            6,
            new Node(3),
            new Node(7)
        )
    ),
    new Node(
        17,
        null,
        new Node(
            22,
            null,
            new Node(20)
        )
    )
);

print_r($tree->getCount()); // 9
print_r($tree->getSum()); // 96
print_r($tree->toArray()); // [9, 4, 8, 6, 3, 7, 17, 22, 20]
print_r($tree->toString()); // '(9, 4, 8, 6, 3, 7, 17, 22, 20)'

print_r($tree->every(fn($key) => $key <= 22)); // true
print_r($tree->every(fn($key) => $key < 22)); // false
print_r($tree->some(fn($key) => $key < 4)); // true
print_r($tree->some(fn($key) => $key > 22)); // false

