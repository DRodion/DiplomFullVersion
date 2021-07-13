<?php
session_start();
include '../auth/auth.php';

$_SESSION['urlpage'] = "<a href='../index_auth.php' >Главная</a>\ <a href='registration.php' >Регистрация</a>";

include '../config.php';
require '../online.php';
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
    <title>Регистрация</title>
</head>

<body>
<?php
include '../include/block-header.php';
?>
<div id="block-body_1">
    <?php
    include '../include/block-menu.php';
    ?>
    <div id="block-content">
        <div id="block-parameters">
            <p id="title-page" >Регистрация новых пользователей</p>
        </div>
        <form method="post" id="form_reg" action="new_user.php">
            <div id="block-form-registration">
                <p id="status">1 Шаг. Выберете статус нового пользователя</p>
                <ul class="input-data">
                    <li>
                        <label for="statusUser">Статус</label>
                        <span class="star">*</span>
                        <select name="statusUser" id="statusUser" onchange="findmyvalue()">
                            <option>Не выбрано</option>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM status");
                            If (mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_array($result);
                                do {
                                    echo '<option>'.$row['name'].'</option>';
                                }
                                while ($row = mysqli_fetch_array($result));
                            }
                            ?>
                        </select>
                    </li>
                        <script type="text/javascript">
                            function findmyvalue() {
                                var myval = document.getElementById("statusUser").value;
                                if (myval === 'Не выбрано'){
                                    $("#status_admin").slideUp(200);
                                    $("#status_student").slideUp(200);
                                    $("#status_professor").slideUp(200);
                                }
                                if (myval === 'Администратор'){
                                    $("#status_admin").slideDown(200);
                                    $("#status_student").slideUp(200);
                                    $("#status_professor").slideUp(200);
                                }
                                if (myval === 'Студент'){
                                    $("#status_admin").slideUp(200);
                                    $("#status_student").slideDown(200);
                                    $("#status_professor").slideUp(200);
                                }
                                if (myval === 'Преподаватель'){
                                    $("#status_admin").slideUp(200);
                                    $("#status_student").slideUp(200);
                                    $("#status_professor").slideDown(200);
                                }
                            }
                        </script>
                </ul>
                <div id="status_admin">
                    <p id="status">2 Шаг. Заполните все поля</p>
                    <ul class="input-data">
                        <li>
                            <label for="username">Логин</label>
                            <span class="star">*</span>
                            <input type="text" name="username" id="username"/>
                        </li>
                        <li>
                            <label for="password">Пароль</label>
                            <span class="star">*</span>
                            <input type="password" name="password" id="password"/>
                        </li>
                        <li>
                            <label for="FIO">ФИО</label>
                            <span class="star">*</span>
                            <input type="text" name="FIO" id="FIO"/>
                        </li>
                        <li>
                            <label for="age">Дата рождения</label>
                            <span class="star">*</span>
                            <input type="date" name="age" id="age"/>
                        </li>
                    </ul>
                </div>

                <div id="status_student">
                    <p id="status">2 Шаг. Заполните все поля</p>
                    <ul class="input-data">
                        <li>
                            <label for="username2">Логин</label>
                            <span class="star">*</span>
                            <input type="text" name="username2" id="username2"/>
                        </li>
                        <li>
                            <label for="password2">Пароль</label>
                            <span class="star">*</span>
                            <input type="password" name="password2" id="password2"/>
                        </li>
                        <li>
                            <label for="FIO2">ФИО</label>
                            <span class="star">*</span>
                            <input type="text" name="FIO2" id="FIO2"/>
                        </li>
                        <li>
                            <label for="age2">Дата рождения</label>
                            <span class="star">*</span>
                            <input type="date" name="age2" id="age2"/>
                        </li>
                        <li>
                            <label for="forma-education">Форма обучения</label>
                            <span class="star">*</span>
                            <input type="text" name="forma-education" id="forma-education"/>
                        </li>
                        <li>
                            <label for="profile">Профиль</label>
                            <span class="star">*</span>
                            <input type="text" name="profile" id="profile"/>
                        </li>
                        <li>
                            <label for="faculty2">Факультет</label>
                            <span class="star">*</span>
                            <select name="faculty2" id="faculty2" >
                                <option>Не выбрано</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM faculty");
                                If (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    do {
                                        echo '<option>'.$row['name_faculty'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="direction2">Направление деятельности</label>
                            <span class="star">*</span>
                            <select name="direction2" id="direction2">
                                <option>Не выбрано</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM direction_faculty");
                                If (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    do {
                                        echo '<option>'.$row['name_direction'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="kurs2">Группа</label>
                            <span class="star">*</span>
                            <input type="number" name="kurs2" id="kurs2"/>
                        </li>
                    </ul>
                </div>

                <div id="status_professor">
                    <p id="status">2 Шаг. Заполните все поля</p>
                    <ul class="input-data">
                        <li>
                            <label for="username3">Логин</label>
                            <span class="star">*</span>
                            <input type="text" name="username3" id="username3"/>
                        </li>
                        <li>
                            <label for="password3">Пароль</label>
                            <span class="star">*</span>
                            <input type="password" name="password3" id="password3"/>
                        </li>
                        <li>
                            <label for="FIO3">ФИО</label>
                            <span class="star">*</span>
                            <input type="text" name="FIO3" id="FIO3"/>
                        </li>
                        <li>
                            <label for="age3">Дата рождения</label>
                            <span class="star">*</span>
                            <input type="date" name="age3" id="age3"/>
                        </li>
                        <li>
                            <label for="faculty3">Факультет</label>
                            <span class="star">*</span>
                            <select name="faculty3" id="faculty3">
                                <option>Не выбрано</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM faculty");
                                If (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    do {
                                        echo '<option>'.$row['name_faculty'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="department3">Кафедра</label>
                            <span class="star">*</span>
                            <select name="department3" id="department3">
                                <option>Не выбрано</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM department");
                                If (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    do {
                                        echo '<option>'.$row['name_department'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="professay">Должность</label>
                            <span class="star">*</span>
                            <select name="professay" id="professay">
                                <option>Не выбрано</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM position");
                                If (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    do {
                                        echo '<option>'.$row['name_position'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                }
                                ?>
                            </select>
                        </li>
                    </ul>
                </div>
                <input type="submit" class="right" id="button-reg" value="Зарегистрировать" />
            </div>
        </form>
    </div>
</div>
</body>
</html>


