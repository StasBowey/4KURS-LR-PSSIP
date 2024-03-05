<html>
<head>
<title>Файловая система</title>
</head>
<body>
<?php
// Найти и записать свойства
echo "<h1>file: lesson14.php</h1>";
echo "<p>В последний раз редактировался: " . date("r", filemtime(""));
echo "<p>В последний раз был открыт: " . date("r", fileatime(""));
echo "<p>Размер: " . filesize("") . " байт";
?>
</body>
</html>