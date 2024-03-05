<?php
// 1
include 'header.php';
?>

    <section>
        <h2>Добро пожаловать на главную страницу</h2>
        <p>Демонстрация работы оператора включения include</p>
    </section>

<?php
// 2
$p = "Программа";
$s = "работает";
$result = $p . " " . $s;
$result .= " хорошо";
echo $result . "<br><br>";

// 3
$fio = "Шестакович Станислав Александрович";
$group = "ПЗТ-36";
$all = $fio . " " . $group;

for ($i = 0; $i < 5; $i++) {
    echo $all . "<br>";
}
echo "<br>";
// 4
$products = array(
    "Кефир" => 1.6,
    "Молоко" => 1.7,
    "Сметана" => 2.9
);

$sum = 0;

foreach ($products as $product => $price) {
    $sum += $price;
    echo "Цена за $product: $price BYN" . "<br>";
}

echo "Сумма всех продуктов: $sum BYN" . "<br><br>";

// 5
$s1 = "Шестакович" . "<br>";
$s2 = "Улица Новооктябрьская 14, к. 404" . "<br>";

$length = strlen($s1);
echo "Длина строки s1: $length" . "<br>";

$s3 = $s1 . $s2;
echo $s3 . "<br>";

$uppercase = mb_strtoupper($s2, "UTF-8");
echo $uppercase . "<br><br>";

// 6
$x = 2;
$y = 3;
$z = sqrt(abs($x * $x - 0.1) / $x * $x + 0.1) + ($x + $y * $y * $y) / log(8, 1 + $x * $x);
echo "Результат выполнения мат. функции: $z";
?>
