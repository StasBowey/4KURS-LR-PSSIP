<?php
// Начинаем сессию
session_start();

// Устанавливаем значение переменной сессии
$_SESSION['username'] = 'StasUse';

// Выводим сообщение об успешном установлении значения сессии
echo "Значение 'username' установлено в сессии. <br>";

// Проверяем, установлена ли переменная сессии 'username' и выводим ее значение
if(isset($_SESSION['username'])) {
    echo "Текущее значение 'username': " . $_SESSION['username'] . "<br>";
} else {
    echo "Переменная 'username' не установлена в сессии.";
}

// Закрываем сессию
session_destroy();

// Устанавливаем куки
setcookie("username", "StasUse", time() + 3600, "/");  // Куки с именем "username" и значением "user123", срок действия 1 час

// Выводим сообщение об успешном установлении куки
echo "Куки 'username' установлено.";

// Проверяем, установлено ли куки 'username' и выводим его значение
if(isset($_COOKIE['username'])) {
    echo "Текущее значение 'username': " . $_COOKIE['username'];
} else {
    echo "Куки 'username' не установлено.";
}
?>
