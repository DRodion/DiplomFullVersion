<?php
session_start();
require 'auth/auth.php';
require 'auth/auth_cookie.php';
require 'config.php';
require 'online.php';
$_SESSION['urlpage'] = "<a href='index_auth.php' >Главная</a>|<a href='index_auth.php' >Общение</a>";
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
    <meta name="keywords" content="shop, site, website, Univesity" />
    <meta name="description" content="Электронная информационная общественная среда" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/style-1.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="libs/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="libs/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="libs/jquery.form.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <title>Общение</title>
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
            require 'forum/admin_forum.php';
        if ($_SESSION['auth_status'] == 2)
            require 'forum/student_forum.php';
        if ($_SESSION['auth_status'] == 3)
            require 'forum/prof_forum.php';
        ?>
    </div>
</div>
</body>
</html>



