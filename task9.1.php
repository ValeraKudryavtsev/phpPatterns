<?php
// Создаем массив на миллион элементов
$length = 1000000;
$arr = array();
for ($i = 0; $i < $length; $i++) {
    $arr[] = mt_rand(0, 1000000);
}

// Измеряем время выполнения сортировки пузырьком
$start_time = microtime(true);
for ($i = 0; $i < $length; $i++) {
    for ($j = 0; $j < $length - 1; $j++) {
        if ($arr[$j] > $arr[$j + 1]) {
            $temp = $arr[$j];
            $arr[$j] = $arr[$j + 1];
            $arr[$j + 1] = $temp;
        }
    }
}
$end_time = microtime(true);
$bubble_sort_time = $end_time - $start_time;
echo "Сортировка пузырьком: " . $bubble_sort_time . " секунд\n";

// Измеряем время выполнения сортировки выбором
$start_time = microtime(true);
for ($i = 0; $i < $length - 1; $i++) {
    $min_index = $i;
    for ($j = $i + 1; $j < $length; $j++) {
        if ($arr[$j] < $arr[$min_index]) {
            $min_index = $j;
        }
    }
    $temp = $arr[$i];
    $arr[$i] = $arr[$min_index];
    $arr[$min_index] = $temp;
}
$end_time = microtime(true);
$selection_sort_time = $end_time - $start_time;
echo "Сортировка выбором: " . $selection_sort_time . " секунд\n";

// Измеряем время выполнения быстрой сортировки
$start_time = microtime(true);
function quick_sort(&$arr, $left, $right) {
    if ($left < $right) {
        $pivot = partition($arr, $left, $right);
        quick_sort($arr, $left, $pivot - 1);
        quick_sort($arr, $pivot + 1, $right);
    }
}
function partition(&$arr, $left, $right) {
    $pivot = $arr[$right];
    $i = $left - 1;
    for ($j = $left; $j < $right; $j++) {
        if ($arr[$j] <= $pivot) {
            $i++;
            $temp = $arr[$i];
            $arr[$i] = $arr[$j];
            $arr[$j] = $temp;
        }
    }
    $temp = $arr[$i + 1];
    $arr[$i + 1] = $arr[$right];
    $arr[$right] = $temp;
    return $i + 1;
}
quick_sort($arr, 0, $length - 1);
$end_time = microtime(true);
$quick_sort_time = $end_time - $start_time;
echo "Быстрая сортировка: " . $quick_sort_time . " секунд\n";
