<?php
// Укажите путь к вашему файлу
$filename = 'C:\localhost\Portfolio\Laba8\Laba2\laba2.txt';

// Проверяем, существует ли файл
if (!file_exists($filename)) {
    die("Файл не найден.");
}

// Открываем файл для чтения
$file = fopen($filename, 'r');
if (!$file) {
    die("Не удалось открыть файл.");
}

$lineNumbers = []; // Массив для хранения номеров строк
$lineNumber = 0;   // Счетчик строк

// Читаем файл построчно
while (($line = fgets($file)) !== false) {
    $lineNumber++; // Увеличиваем номер строки
    // Проверяем, содержит ли строка слово "мель" с помощью регулярного выражения
    if (preg_match('/\bмель\b/u', $line)) {
        $lineNumbers[] = $lineNumber; // Добавляем номер строки в массив
    }
}

// Закрываем файл
fclose($file);

// Выводим результат
if (!empty($lineNumbers)) {
    echo "Слово 'мель' найдено в следующих строках: " . implode(', ', $lineNumbers) . ".\n";
} else {
    echo "Слово 'мель' не найдено в файле.\n";
}
?>