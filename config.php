<?php
$servername = "localhost";
$databasa_name = "root";
$databasa_password = "Fadseo43_!)";
$databasa = "univers_is";

$conn = mysqli_connect($servername, $databasa_name, $databasa_password, $databasa);
if (!$conn ){
    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
    exit();
}

