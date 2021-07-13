<?php
session_start();
require '../auth/auth.php';
require '../auth/auth_cookie.php';
require '../config.php';
require '../online.php';
$_SESSION['urlpage'] = "<a href='../index_auth.php' >Главная</a>| <a href='reports.php' >Отчеты";

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset=UTF-8 />
    <meta name="keywords" content="shop, site, website, Univesity" />
    <meta name="description" content="Электронная информационная общественная среда" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="../libs/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="../libs/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="../libs/jquery.form.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <title>Отчеты</title>

</head>

<body>
<?php
require '../include/block-header.php';
?>
<div id="block-body_1">
    <?php
    require '../include/block-menu.php';
    ?>

    <div id="block-content">
        <div id="block-parameters">
            <p id="title-page" >Отчеты</p>
        </div>

        <p class="title-repos"><a href="distance_repost.php">Дистанционные занятия</a></p>
        <p class="title-repos"><a href="repost_time_prof.php">Отчеты о рабочем времени преподавателей</a></p>
        <p class="title-repos"><a href="tabel.php">Табель</a></p>
    </div>

</div>
</body>
</html>



