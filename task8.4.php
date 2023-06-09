<?php
function largestPrimeFactor($n) {
    $maxPrime = -1;

    // проверяем делители от 2 до квадратного корня из числа
    for ($i = 2; $i <= sqrt($n); $i++) {
        // если $i является делителем $n, продолжаем проверку
        while ($n % $i == 0) {
            $maxPrime = $i; // сохраняем максимальный простой делитель
            $n = $n / $i; // делим $n на найденный делитель
        }
    }

    // если после проверки все еще осталось число, большее 1, оно является простым делителем
    if ($n > 1) {
        $maxPrime = $n;
    }

    return $maxPrime;
}

echo largestPrimeFactor(600851475143); // выводит 6857

