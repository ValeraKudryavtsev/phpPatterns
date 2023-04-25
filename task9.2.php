<?php
// Удаление всех дубликатов
// Создаем массив
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 4, 4, 10);

// Удаляем все элементы с заданным значением
$remove_val = 4;
foreach ($arr as $key => $val) {
    if ($val == $remove_val) {
        unset($arr[$key]);
    }
}

// Выводим измененный массив
print_r($arr);

// Удаление только первого элемента с заданным значением
// Создаем массив
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 4, 4, 10);

// Удаляем первый элемент с заданным значением
$remove_val2 = 4;
foreach ($arr as $key => $val) {
    if ($val == $remove_val2) {
        unset($arr[$key]);
        break;
    }
}

// Выводим измененный массив
print_r($arr);