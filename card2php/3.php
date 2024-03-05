<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abityr";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Проверка, был ли отправлен запрос на поиск
if(isset($_POST['submit'])) {
    // Получение значения для поиска
    $search_lastname = $_POST['lastname'];
    
    // Подготовка и выполнение запроса на поиск
    $sql = "SELECT * FROM abiturienti WHERE lastname LIKE '%$search_lastname%'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Вывод результатов поиска
        while($row = $result->fetch_assoc()) {
            echo "Фамилия: " . $row["Lastname"]. " Имя: " . $row["Name"]. " Отчество: " . $row["Surname"]. " Дата рождения: " . $row["DateBirth"]. " Специальность: " . $row["Speciality"]. "<br>";
        }
    } else {
        echo "Записей не найдено.";
    }
}

// Закрытие соединения с базой данных
$conn->close();
?>
