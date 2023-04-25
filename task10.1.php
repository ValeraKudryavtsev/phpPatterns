<?php

class Node {
    public $type;
    public $value;
    public $left;
    public $right;

    public function __construct($type, $value, $left = null, $right = null) {
        $this->type = $type;
        $this->value = $value;
        $this->left = $left;
        $this->right = $right;
    }
}

// Создаем дерево
$tree = new Node('*', '+');
$tree->left = new Node('+', 2);
$tree->right = new Node('-', '*');
$tree->right->left = new Node(3);
$tree->right->right = new Node(4);

// Обходим дерево
function dfs($node) {
    if ($node == null) {
        return;
    }
    if ($node->type == 'operand') {
        echo $node->value . " ";
    } else {
        dfs($node->left);
        dfs($node->right);
        echo $node->value . " ";
    }
}

// Тестирование
dfs($tree);

