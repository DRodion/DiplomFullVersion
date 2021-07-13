<?php
session_start();
require 'auth/auth.php';
require 'auth/auth_cookie.php';
require 'config.php';
require 'online.php';
$_SESSION['urlpage'] = "<a href='index_auth.php' >Главная</a>|<a href='read_timetable_class.php' >Расписание</a>";

$_SESSION['url'] = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
    <meta name="keywords" content="shop, site, website, Univesity" />
    <meta name="description" content="Электронная информационная общественная среда" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="libs/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="libs/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="libs/jquery.form.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <title>Расписания занятий</title>
</head>
<body>
<?php
require 'include/block-header.php';
?>
<div id="block-body_1">
    <?php
    require 'include/block-menu.php';
    ?>
    <div id="block-content_3">
        <div id="block-parameters">
            <p id="title-page" >Расписания занятий</p>
            <span id="top-call" class="right"><a class="title-call" title="Расписание">Расписание звонков</a></span>
        </div>
        <div id="block-top-call">
            <form method="post">
                <table id="call">
                    <tr id="ii"><th colspan="3">Для программ высшего образования с 9:00</th></tr>
                    <tr><th>Пара</th><th>Время занятий</th><th>Перемена</th></tr>
                    <?php
                    $result = mysqli_query($conn, "SELECT * FROM timetable_call");
                    If (mysqli_num_rows($result) > 0)
                    {
                        $row = mysqli_fetch_array($result);
                        do
                        {
                            if ($row['number'] == 3){
                                echo '<tr id="iii"><th colspan="3">Технологический перерыв</th></tr>';}

                            echo '<tr><td>'.$row["number"].'</td><td>'.$row["time"].'</td><td>'.$row["turn"].'</td></tr>';
                        }
                        while ($row = mysqli_fetch_array($result));
                    }

                    ?>
                </table>
            </form>
        </div>
        <?php
            echo '<span id="top-calendar" class="right"><a class="title-calendar" title="Календарь">Календарь</a></span>';
        ?>
        <div id="calendar">
            <div class="block-calendar">
                <div class="calendar_div">
                    <div class="block-mounth">
                        <i class="fas fa-angle-left prev"></i>
                        <div class="block-date">
                            <h1 id="mm"></h1>
                            <p id="dd"></p>
                        </div>
                        <i class="fas fa-angle-right next"></i>
                    </div>
                    <div class="block-weekdays">
                        <div>Пн</div>
                        <div>Вт</div>
                        <div>Ср</div>
                        <div>Чт</div>
                        <div>Пт</div>
                        <div>Сб</div>
                        <div>Вс</div>
                    </div>
                    <div class="block-days">
                    </div>
                </div>
            </div>
            <input type="button" value="Выбрать" id="select_days" >
            <script src="js/calendar.js"></script>
            <script>
                document.querySelector('.block-days').addEventListener('click', e => {
                    // e.target - целевой элемент
                    let content = e.target.innerHTML;
                    let k = date.getMonth() + 1;
                    $("#select_days").click(function() {
                        location.href = "read_timetable_class.php?dday=" + content +"&mmonth="+k;
                    });
                });
            </script>
        </div>
        <div id="timetable_read_1">
            <?php
            if ($_SESSION['auth_status'] == 1)
                    require 'include/timetable_admin.php';
                if ($_SESSION['auth_status'] == 2)
                    require 'include/timetable_student.php';
                if ($_SESSION['auth_status'] == 3)
                    require 'include/timetable_professor.php';
            ?>
        </div>
    </div>
</div>
</body>
</html>



