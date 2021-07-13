<?php

if ($_SESSION['auth'] != 'yes_auth' && $_COOKIE["remember"])
{
    require '../config.php';
    $str = $_COOKIE["remember"];

    // Вся длина строки
    $all_len = strlen($str);
    // Длина логина
    $login_len = strpos($str,'+');
    // Обрезаем строку до Плюса и получаем Логин
    $username = filter_var(trim(substr($str,0,$login_len)));

    // Получаем пароль
    $password = filter_var(trim(substr($str,$login_len+1,$all_len)));


    $result = mysqli_query($conn, "SELECT * FROM customers WHERE login = '$username' AND password = '$password'");
    If (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        session_start();
        $_SESSION['auth'] = 'yes_auth';
        $_SESSION['auth_customer_id'] = $row["customer_id"];
        $_SESSION['auth_login'] = $row["login"];
        $_SESSION['auth_pass'] = $row["password"];
        $_SESSION['auth_FIO'] = $row["FIO"];
        $_SESSION['auth_happyDate'] = $row["happyDate"];
        $_SESSION['auth_status'] = $row["status"];
    }

}