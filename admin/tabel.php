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
    <link href="../css/style-1.css" rel="stylesheet" type="text/css" />

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
        <form method="post" action="tabel-table.php">
            <ul class="input-data">
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
                    <label for="year">Год</label>
                    <span class="star">*</span>
                    <input type="text" name="year" id="year"/>
                </li>
                <li>
                    <label for="period">Период</label>
                    <span class="star">*</span>
                    <select name="period" id="period">
                        <option>Не выбрано</option>
                        <option>Январь</option>
                        <option>Февраль</option>
                        <option>Март</option>
                        <option>Апрель</option>
                        <option>Май</option>
                        <option>Июнь</option>
                        <option>Июль</option>
                        <option>Август</option>
                        <option>Сентярь</option>
                        <option>Октябрь</option>
                        <option>Ноябрь</option>
                        <option>Декабрь</option>
                    </select>
                </li>
            </ul>
            <input type="submit" class="right" id="button-tab" value="Сгенерировать" />
        </form>
    </div>

</div>

</body>
</html>




