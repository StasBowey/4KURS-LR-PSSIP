<?php
// Начинаем сессию
session_start();

// Проверяем, была ли отправлена форма входа
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, были ли введены логин и пароль
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Проверяем, совпадают ли введенные логин и пароль с заранее заданными
        $admin_username = 'admin';
        $admin_password = 'password123';

        if ($_POST['username'] == $admin_username && $_POST['password'] == $admin_password) {
            // Авторизация успешна, сохраняем информацию о входе в сессии
            $_SESSION['logged_in'] = true;
            header("Location: admin_panel.php"); // Перенаправляем пользователя на страницу администратора
            exit();
        } else {
            $error_message = "Неверные логин или пароль";
        }
    } else {
        $error_message = "Пожалуйста, введите логин и пароль";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход в админ-панель</title>
</head>
<body>
    <h2>Вход в админ-панель</h2>
    <?php
    // Выводим сообщение об ошибке, если есть
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Логин:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Пароль:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Войти">
    </form>
</body>
</html>
