<?php

// Линейный поиск
// Создаем массив
$arr = array(5, 3, 8, 6, 1, 9, 2, 7, 4);

// Ищем элемент
$search_val = 6;

// Счетчик шагов
$steps = 0;

// Линейный поиск
foreach ($arr as $key => $val) {
    $steps++;
    if ($val == $search_val) {
        echo "Элемент найден на позиции: " . $key . "<br>";
        echo "Количество шагов: " . $steps;
        break;
    }
}

if ($key == count($arr)) {
    echo "Элемент не найден";
}


// Бинарный поиск
// Создаем отсортированный массив
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9);

// Ищем элемент
$search_val = 6;

// Счетчик шагов
$steps = 0;

// Бинарный поиск
$left = 0;
$right = count($arr) - 1;
while ($left <= $right) {
    $steps++;
    $mid = (int)(($left + $right) / 2);
    if ($arr[$mid] == $search_val) {
        echo "Элемент найден на позиции: " . $mid . "<br>";
        echo "Количество шагов: " . $steps;
        break;
    } elseif ($arr[$mid] < $search_val) {
        $left = $mid + 1;
    } else {
        $right = $mid - 1;
    }
}

if ($left > $right) {
    echo "Элемент не найден";
}

// Интерполяционный поиск
// Создаем отсортированный массив
$arr = array(1, 3, 5, 7, 9, 11, 13, 15, 17, 19);

// Ищем элемент
$search_val = 13;

// Счетчик шагов
$steps = 0;

// Интерполяционный поиск
$left = 0;
$right = count($arr) - 1;
while ($left <= $right && $search_val >= $arr[$left] && $search_val <= $arr[$right]) {
    $steps++;
    $pos = $left + intval(($search_val - $arr[$left]) * ($right - $left) / ($arr[$right] - $arr[$left]));
    if ($arr[$pos] == $search_val) {
        echo "Элемент найден на позиции: " . $pos . "<br>";
        echo "Количество шагов: " . $steps;
        break;
    } elseif ($arr[$pos] < $search_val) {
        $left = $pos + 1;
    } else {
        $right = $pos - 1;
    }
}

if ($left > $right) {
    echo "Элемент не найден";
}
