<?php

if ($_SESSION['auth_status'] == 1)
{
    echo '<div id="left-nav">
    <ul>
        <li><a href="../index_auth.php">Главная</a></li>
        <li><a href="../admin/registration.php">Регистрация новых пользователей</a></li>
        <li><a href="../admin/timetable_class.php">Внесение расписания занятий</a></li>
        <li><a href="../read_timetable_class.php">Расписания занятий</a></li>
        <li><a href="../send_message.php">Общение</a></li>
        <li><a href="../static_online.php">Статистика посещений</a></li>
        <li><a href="../admin/reports.php">Отчеты</a></li>
        <li><a href="../admin/dis_video.php">Видеозаписи</a></li>
    </ul>
</div>';
}
if ($_SESSION['auth_status'] == 2)
{
    echo '<div id="left-nav">
    <ul>
        <li><a href="../index_auth.php">Главная</a></li>
        <li><a href="../read_timetable_class.php">Расписания занятий</a></li>
        <li><a href="../send_message.php">Общение</a></li>
    </ul>
</div>';
}

if ($_SESSION['auth_status'] == 3)
{
    echo '<div id="left-nav">
    <ul>
        <li><a href="../index_auth.php">Главная</a></li>
        <li><a href="../read_timetable_class.php">Расписания занятий</a></li>
        <li><a href="../dictansion_class.php">Информация по дистанционным занятиям</a></li>
        <li><a href="../send_message.php">Общение</a></li>
    </ul>
</div>';
}
?>