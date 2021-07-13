<?php
session_start();
require '../auth/auth.php';
require '../auth/auth_cookie.php';
$_SESSION['urlpage'] = "<a href='../index_auth.php' >Главная</a>\ <a href='timetable_class.php' >Расписание занятий</a>";
require '../config.php';
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
        <title>Расписание занятий</title>
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
                <p id="title-page" >Расписание занятий</p>
            </div>
            <form method="post" id="form_time_call" action="new_timetable.php">
                <div id="block-form-time_call">
                    <ul class="input-data">
                        <li>
                            <label for="faculty">Факультет</label>
                            <span class="star">*</span>
                            <select name="faculty" id="faculty" >
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
                            <label for="direction">Направление деятельности</label>
                            <span class="star">*</span>
                            <select name="direction" id="direction">
                                <option>Не выбрано</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM direction_faculty");
                                If (mysqli_num_rows($result) > 0)
                                {
                                    $row = mysqli_fetch_array($result);
                                    do
                                    {
                                        echo '<option>'.$row['name_direction'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="group-kours">Группа</label>
                            <span class="star">*</span>
                            <input type="text" name="group-kours" id="group-kours"/>
                        </li>
                        <li>
                            <label for="semestr">Семестр</label>
                            <span class="star">*</span>
                            <select name="semestr" id="semestr">
                                <option>Не выбрано</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM semester");
                                If (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    do {
                                        echo '<option>'.$row['name_semester'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                }

                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="name_dis">Наименование дисциплины</label>
                            <span class="star">*</span>
                            <select name="name_dis" id="name_dis">
                                <option>Не выбрано</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM discipline");
                                If (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    do {
                                        echo '<option>'.$row['name_discipline'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="data_proved">День недели</label>
                            <span class="star">*</span>
                            <select name="data_proved" id="data_proved">
                                <option>Не выбрано</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM weekday");
                                If (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    do {
                                        echo '<option>'.$row['name_weekday'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                } ?>
                            </select>
                        </li>
                        <li>
                            <label for="data_para">Пара</label>
                            <span class="star">*</span>
                            <input type="text" name="data_para" id="data_para"/>
                        </li>
                        <li>
                            <label for="professor">Профессор</label>
                            <span class="star">*</span>
                            <select name="professor" id="professor">
                                <option>Не выбрано</option>
                                <?php

                                $result = mysqli_query($conn, "SELECT * FROM customers WHERE status = 3");
                                If (mysqli_num_rows($result) > 0) {
                                    $row = mysqli_fetch_array($result);
                                    do {
                                        echo '<option>'.$row['FIO'].'</option>';
                                    }
                                    while ($row = mysqli_fetch_array($result));
                                }
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="education">Неделя</label>
                            <span class="star">*</span>
                            <select name="education" id="education">
                                <option>Каждая неделя</option>
                                <option>1 неделя</option>
                                <option>2 неделя</option>
                            </select>
                        </li>
                        <li>
                            <label for="type-para">Тип занятий</label>
                            <span class="star">*</span>
                            <select name="type-para" id="type-para">
                                <option>Практика</option>
                                <option>Лекция</option>
                            </select>
                        </li>
                        <li>
                            <label for="dis">Дистанционно</label>
                            <span class="star">*</span>
                            <input type="checkbox" name="dis" id="dis" checked/>
                        </li>
                        <script>
                            $(document).ready(function() {
                                $('#dis').change(function() {
                                    if(this.checked !== true) {
                                        $("#office1").slideDown(200);
                                    }
                                    else {
                                        $("#office1").slideUp(200);
                                    }
                                });
                            });
                        </script>
                        <div id="office1">
                            <li>
                                <label for="office">Кабинет</label>
                                <span class="star">*</span>
                                <input type="text" name="office" id="office"/>
                            </li>
                        </div>
                    </ul>
                    <input type="submit" class="right" id="button-write" value="Записать" />
                </div>
            </form>

        </div>
    </div>
    </body>
    </html>
