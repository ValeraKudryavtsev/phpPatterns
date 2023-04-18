<?php

// Путь к корневой директории
$path = '/var/www/html';

// Итератор для получения списка файлов и директорий
$iterator = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST
);

// Отображаем список файлов и директорий
foreach ($iterator as $file) {
    // Определяем отступы для вывода вложенных директорий
    $depth = $iterator->getDepth();
    $indent = str_repeat(' ', $depth * 4);

    // Выводим имя файла или директории
    echo $indent . $file->getFilename() . PHP_EOL;
}

