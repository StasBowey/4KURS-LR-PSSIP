<?php
// 1
include 'header.php';
?>

    <section>
        <h2>Добро пожаловать на главную страницу</h2>
        <p>Демонстрация работы оператора включения include</p>
    </section>

<?php
// Заданный диаметр окружности
$diameter = 10;

// Вычисление длины окружности
$pi = 3.14159; // приближенное значение числа пи
$length = $pi * $diameter;

echo "Длина окружности с диаметром $diameter равна $length единиц. <br>";

$surname = "Хомчик";
$name = "Данил";

$n = 16;

// Использование цикла while
$count = 0;
while ($count < $n) {
    echo "Фамилия: $surname, Имя: $name <br>";
    $count++;
}

// Создание ассоциативного массива
$students = array(
    "Иванов" => 200,
    "Петров" => 340,
    "Сидоров" => 800
);

// Вывод массива на экран
echo "Ассоциативный массив 'Студент': <br>";
foreach ($students as $name => $stipend) {
    echo "Студент: $name, Стипендия: $stipend <br>";
}

// Подсчет суммарной величины начисленной стипендии
$total_stipend = array_sum($students);

// Вывод суммарной величины начисленной стипендии
echo "Суммарная величина начисленной стипендии: $total_stipend <br>";

// Создание строковых переменных
$s1 = "Я люблю Беларусь";
$s2 = "Я учусь в Политехническом колледже";

// 1. Определение длины строки s2
$length_s2 = strlen($s2);
echo "Длина строки s2: $length_s2<br>";

// 2. Выделение 16-го символа в строке s1 и определение его ASCII-кода
$char_16_s1 = mb_substr($s1, 15, 1, 'UTF-8'); 
$ascii_code = ord($char_16_s1);
echo "16-й символ в строке s1: $char_16_s1, его ASCII-код: $ascii_code<br>";

// 3. Замена в строке s1 слова "Беларусь" на "Гродно"
$s1_modified = str_replace("Беларусь", "Гродно", $s1);
echo "Строка s1 после замены: $s1_modified <br>";

function custom_formula($x, $y) {
    // Вычисление числителя
    $numerator = (sqrt(abs($x - 1)) - sqrt(abs(M_PI * $x)));
    
    // Вычисление знаменателя
    $denominator = (1 + ($x ** 2) / 2 + ($y ** 2) / 4);
    
    // Вычисление результата
    $result = $numerator / $denominator;
    
    return $result;
}

// Пример использования функции
$x_value = 3;
$y_value = 2;
$result_value = custom_formula($x_value, $y_value);
echo "Результат вычислений по пользовательской формуле: $result_value";
?>
