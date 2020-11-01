# Get count, sum nodes, comparison of conditions, to array, to string in binary tree. 

An example program is given in the file index.php.

* getCount () - Returns the number of nodes in the tree.
* getSum () - Returns the sum of all the keys in the tree.
* toArray () - Returns a one-dimensional array containing all keys.
* toString () - Returns the string representation of the tree.
* every ($ fn) - Checks if all the keys in the tree satisfy the condition specified in the passed function.
* some ($ fn) - Checks if any key of the tree satisfies the condition specified in the passed function.


# Example

1) Add tree 

$tree = new Node( 
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

2) Calculations

$tree->getCount();    // 9


$tree->getSum();     // 96


$tree->toArray();    // [9, 4, 8, 6, 3, 7, 17, 22, 20]


$tree->toString();   // '(9, 4, 8, 6, 3, 7, 17, 22, 20)'



$tree->every(fn($key) => $key <= 22);     // true


$tree->every(fn($key) => $key < 22);     // false


$tree->some(fn($key) => $key < 4);       // true


$tree->some(fn($key) => $key > 22);      // false
