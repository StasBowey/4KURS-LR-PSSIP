<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-gmail-username@gmail.com'; // Замените на ваш адрес Gmail
        $mail->Password = 'your-gmail-password'; // Замените на пароль от вашего Gmail аккаунта
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('stasopop18@gmail.com'); // Замените на адрес, на который хотите отправить письмо

        $mail->isHTML(false);
        $mail->Subject = "Обратная связь от $name";
        $mail->Body = $message;

        $mail->send();
        echo "Спасибо за ваше сообщение!";
    } catch (Exception $e) {
        echo "Ошибка при отправке письма: {$mail->ErrorInfo}";
    }
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="name">Имя:</label><br>
    <input type="text" id="name" name="name" required><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="message">Сообщение:</label><br>
    <textarea id="message" name="message" rows="4" required></textarea><br><br>
    <input type="submit" value="Отправить">
</form>
