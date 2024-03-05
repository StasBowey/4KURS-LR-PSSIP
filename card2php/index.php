<!-- form.php -->
<?php
// Начинаем сессию
// session_start();

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     //Получаем значения из формы
//     $firstName = $_POST['firstName'];
//     $lastName = $_POST['lastName'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
    
//     //Устанавливаем сессионные переменные
//     $_SESSION['user']['email'] = $email;
//     $_SESSION['user']['phone'] = $phone;
    
//     //Переходим на страницу 2.php
//     header('Location: 2.php');
//     exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
    <form method="post" action="2.php">
        <label for="firstName">First Name:</label><br>
        <input type="text" id="firstName" name="firstName" required><br>
        <label for="lastName">Last Name:</label><br>
        <input type="text" id="lastName" name="lastName" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>
        <!-- Измененные имена скрытых полей -->
        <input type="hidden" name="session_id" value="<?php echo session_id(); ?>">
        <input type="hidden" name="email_hidden" value="<?php echo $email; ?>">
        <input type="hidden" name="phone_hidden" value="<?php echo $phone; ?>">
        <input type="submit" value="Send">
    </form>
    
    <h2>Добавление записи в базу данных</h2>
    <form action="index.php" method="post">
        <label for="lastname">Фамилия:</label><br>
        <input type="text" id="lastname" name="lastname" required><br>
        <label for="name">Имя:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="surname">Отчество:</label><br>
        <input type="text" id="surname" name="surname" required><br>
        <label for="dateBirth">Дата рождения:</label><br>
        <input type="text" id="dateBirth" name="dateBirth" required><br>
        <label for="speciality">Специальность:</label><br>
        <input type="text" id="speciality" name="speciality" required><br><br>
        <input type="submit" name="submit" value="Добавить запись и обновить">
    </form>
    <br>
    <form action="3.php" method="post">
        <label for="lastname"><b><i>Поиск по БД</i></b></label><br>
        <input type="text" id="lastname" name="lastname" required><br>
        <input type="submit" name="submit" value="Поиск">
    </form>

    <form action="index.php" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" name="submit" value="Подписаться на рассылку">
    </form>
    
</body>
</html>

<?php
// Проверка, была ли отправлена форма
if(isset($_POST['submit'])) {
    // Получение данных из формы
    $email = $_POST['email'];
    
    // Дополнительные проверки данных, если необходимо
    
    // Вывод сообщения в диалоговое окно
    echo "<script>alert('Вы подписались на рассылку!');</script>";
}
?>

<?php
    // Функция для подключения к базе данных
    function connectToDatabase() {
        $servername = "localhost"; // Имя сервера базы данных (обычно localhost)
        $username = "root"; // Имя пользователя базы данных
        $password = ""; // Пароль пользователя базы данных
        $database = "abityr"; // Имя базы данных

        // Создаем подключение к базе данных
        $conn = new mysqli($servername, $username, $password, $database);

        // Проверяем соединение
        if ($conn->connect_error) {
            die("Ошибка подключения: " . $conn->connect_error);
        }

        return $conn;
    }

    // Функция для добавления записи в базу данных
    function addRecordToDatabase($conn, $lastname, $name, $surname, $dateBirth, $speciality) {
        // SQL запрос на добавление записи
        $sql = "INSERT INTO abiturienti (Lastname, Name, Surname, DateBirth, Speciality) 
                VALUES ('$lastname', '$name', '$surname', '$dateBirth', '$speciality')";

        // Выполняем запрос
        if ($conn->query($sql) === TRUE) {
            echo "Новая запись успешно добавлена<br>";
        } else {
            echo "Ошибка при добавлении записи: " . $conn->error . "<br>";
        }
    }

    // Функция для отображения содержимого базы данных в виде таблицы
    function displayDatabaseContent($conn) {
        // SQL запрос на выбор всех записей
        $sql = "SELECT * FROM abiturienti";
        $result = $conn->query($sql);

        // Проверяем, есть ли записи
        if ($result->num_rows > 0) {
            // Выводим таблицу
            echo "<h2>Содержимое базы данных</h2>";
            echo "<table border='1'>";
            echo "<tr><th>ID</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Дата рождения</th><th>Специальность</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["ID"] . "</td>";
                echo "<td>" . $row["Lastname"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Surname"] . "</td>";
                echo "<td>" . $row["DateBirth"] . "</td>";
                echo "<td>" . $row["Speciality"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "В базе данных нет записей";
        }
    }

    // Проверяем, была ли отправлена форма
    if (isset($_POST['submit'])) {
        // Получаем данные из формы
        $lastname = $_POST['lastname'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $dateBirth = $_POST['dateBirth'];
        $speciality = $_POST['speciality'];

        // Подключаемся к базе данных
        $conn = connectToDatabase();

        // Добавляем запись в базу данных
        addRecordToDatabase($conn, $lastname, $name, $surname, $dateBirth, $speciality);

        // Отображаем содержимое базы данных
        displayDatabaseContent($conn);

        // Закрываем соединение с базой данных
        $conn->close();
    }
?>



