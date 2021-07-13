<?php
session_start();
require 'auth/auth.php';
require 'auth/auth_cookie.php';
require 'config.php';
require 'online.php';
$_SESSION['urlpage'] = "<a href='index_auth.php' >Главная</a>";
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
    <?php
    if ($_SESSION['auth_status'] == 1)
        echo '<title>Администратор</title>';
    if ($_SESSION['auth_status'] == 2)
        echo '<title>Студент</title>';
    if ($_SESSION['auth_status'] == 3)
        echo '<title>Преподаватель</title>';
    ?>
</head>
<body>
<?php
require 'include/block-header.php';
?>
<div id="block-body_1">
    <?php
    require 'include/block-menu.php';
    ?>
    <div id="block-content">
        <?php
        if ($_SESSION['auth_status'] == 1)
            require 'include/admin_page.php';
        if ($_SESSION['auth_status'] == 2)
            require 'include/student_page.php';
        if ($_SESSION['auth_status'] == 3)
            require 'include/professor_page.php';
        ?>
    </div>
</div>
</body>
</html>


