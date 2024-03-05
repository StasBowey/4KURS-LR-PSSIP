<!DOCTYPE html>
<html>
<head>
    <title>LR_21</title>
</head>
<body>
    <h1>Привет всем!!!</h1>
    <h2>Информация о разработчике:</h2>
    <p>Имя: Станислав</p>
    <p>Email: stasopop18@gmail.com</p>
    <form method="GET" action="index.php">
        <label for="name">Имя:</label>
        <input type="text" id="name" name="name">
        <input type="submit" value="Отправить">
    </form>
    <?php 
    $color = "red"; // Создание переменной с красным цветом
    $size = "50px"; // Создание переменной с размером
    $fio = "Шестакович Станислав Александрович"; // Переменная содержащая ФИО
    echo "<p style='color: $color; font-size: $size;'>$fio</p>"; // Вывод ФИО с указанием определённого цвета и размера
    
    define("NUM_E", 2.71828); // Константа NUM_E
    echo "Число е равно: " . NUM_E . "<br>"; // Вывод константы
    $num_e1 = NUM_E; // Присвоение переменной переменную константу
    echo "Тип переменной \$num_e1: " . gettype($num_e1) . "<br>"; // Получение типа переменной
    $num_e1 = (string) $num_e1; // Преобразование в строковый тип
    echo "Тип и значение переменной \$num_e1 после преобразования в строку: " . gettype($num_e1) . " = " . "<b>$num_e1</b>" . "<br>"; // Вывод нового типа переменной и его значения

    $num_e1 = (int) $num_e1; // Преобразование в целочисленный тип
    echo "Тип и значение переменной \$num_e1 после преобразования в целое число: " . gettype($num_e1) . " = " . "<b>$num_e1</b>" . "<br>"; // Вывод нового типа переменной и его значения

    $num_e1 = (bool) $num_e1; // Преобразование в булевский тип
    echo "Тип и значение переменной \$num_e1 после преобразования в булевский тип: " . gettype($num_e1) . " = " . "<b>$num_e1</b>" . "<br><br>"; // Вывод нового типа переменной и его значения

    // $_SERVER - суперглобальная переменная, содержащая информацию о сервере и среде исполнения
    echo "IP сервера: " . $_SERVER['SERVER_ADDR'] . "<br>";
    echo "Порт сервера: " . $_SERVER['SERVER_PORT'] . "<br>";
    echo "Имя сервера: " . $_SERVER['SERVER_NAME'] . "<br><br>";

    // $_GET и $_POST - суперглобальные переменные, используемые для получения данных из URL и форм.
    if (isset($_GET['name'])) {
        $name = htmlspecialchars($_GET['name']); // Очищаем от HTML и JS инъекций
        echo "Привет, $name!<br>";
    } else {
        echo "Привет, гость!<br>"; // Если параметр 'name' не был передан
    }
    
    // $_COOKIE - суперглобальная переменная, которая содержит данные, хранящиеся в куках.
    if (isset($_COOKIE['username'])) {
        echo "Привет, " . $_COOKIE['username'] . "!<br>";
    }

    // $_SESSION - суперглобальная переменная, используемая для работы с сессиями.
    session_start(); // Начало сессии
    $_SESSION['user_id'] = 123; // Установка значения в сессии

    // Где-то в другой части приложения
    session_start(); // Начало сессии
    echo "ID пользователя: " . $_SESSION['user_id'] . "<br>";

    // $_FILES - суперглобальная переменная, используемая для работы с файлами, отправленными через HTML-формы.
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $filename = $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], "uploads/$filename");
        echo "Файл $filename успешно загружен.<br>";
    }
    ?>
</body>
</html>
