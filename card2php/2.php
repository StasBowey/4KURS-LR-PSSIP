<!-- 2.php -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем значения из формы
    $firstName = $_POST['first-Name'];
    $lastName = $_POST['last-Name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Формируем строку для записи в файл
    $data = "First Name: $firstName\nLast Name: $lastName\nEmail: $email\nPhone: $phone\n\n";
    
    // Открываем файл для записи (если файл не существует, он будет создан)
    $file = fopen("fio.txt", "a");
    
    // Записываем данные в файл
    fwrite($file, $data);
    
    // Закрываем файл
    fclose($file);
    
    echo "Данные были успешно записаны в файл fio.txt.";
}

var_dump($data);


session_start();

// Проверяем, существуют ли данные в скрытых полях
if(isset($_POST['session_id']) && isset($_POST['email_hidden']) && isset($_POST['phone_hidden'])) {
    // Получаем значения из скрытых полей
    $session_id = $_POST['session_id'];
    $email = $_POST['email_hidden'];
    $phone = $_POST['phone_hidden'];

    // Выводим полученные данные
    echo "Session ID: $session_id<br>";
    echo "Email: $email<br>";
    echo "Phone: $phone<br>";
} else {
    // Если данные отсутствуют, выводим сообщение об ошибке
    echo "Данные не найдены";
}


?>
