<?php
include 'config.php';
session_start();
include 'auth/auth.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
    <meta name="keywords" content="shop, site, website, Univesity" />
    <meta name="description" content="Электронная информационная общественная среда" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="libs/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="libs/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="libs/jquery.form.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <title>ЭИОС-Вход</title>
</head>

<body>

<div id="block-top-auth">
    <form method="post">
        <ul id="input-email-pass">
            <h3>Вход в систему</h3>
            <p id="message-auth">Неверный логин и(или) пароль</p>
            <li><input type="text" id="auth_login" placeholder="Логин или E-mail" /></li>
            <li><input type="password" id="auth_pass" placeholder="Пароль" /><span id="button-pass-show-hide" class="pass-show"></span></li>

            <ul id="list-auth">
                <li><input type="checkbox" name="remember" id="remember" /><label for="remember">Запомнить меня</label></li>
            </ul>
            <p class="right" id="button-auth"><a>Вход</a></p>
        </ul>
    </form>
</div>

</body>
</html>

