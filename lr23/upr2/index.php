<html>
<head>
<title>FileSystemObject</title>
</head>
<body>
<?php
// Открыть папку
$folder = opendir("C:\xampp\htdocs\lr22\index.php");
// Цикл по всем файлам папки
while (($entry = readdir($folder)) != "") {
echo $entry . "<br />";
}
// Закрыть папку
$folder = closedir($folder); 
?>
</body>
</html>