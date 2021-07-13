<?php
session_start();
require '../auth/auth.php';
require '../auth/auth_cookie.php';
require '../config.php';
require '../online.php';
$_SESSION['urlpage'] = "<a href='../index_auth.php' >Главная</a> | <a href='reports.php' >Отчеты</a>| <a href='distance_repost.php' >Дистанционные занятия</a>";
$dates = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset=UTF-8 />
    <meta name="keywords" content="shop, site, website, Univesity" />
    <meta name="description" content="Электронная информационная общественная среда" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            <p id="title-page" >Дистанционные занятия</p>
        </div>
        <form method="post" action="dis_class_between_time.php">
            <div id="choice-date">
                <p id="ch">Выберете период: </p><br>
                <p class="oice">С <input type="date" name="date-cho" id="date-cho"/> По <input type="date" name="date-cho1" id="date-cho1"/>  <input type="submit" id="choose-date" value="Выбрать"/></p>
            </div>
        </form>
        <?php
        $days = array( 1 => 'Понедельник' , 'Вторник' , 'Среда' , 'Четверг' , 'Пятница' , 'Суббота' , 'Воскресенье' );
        $d = date( $days[date('N')]);
        ?>
        <table id="repos_dis">
            <tr class="ff"><th colspan="8" id="out"><?php echo date( $days[date( 'N' )] . ' d.m.Y' ); ?></th></tr>
            <tr class="ff"><th>ФИО</th><th>Дисциплина</th><th>Группа</th><th>Пара</th><th>Ссылка</th><th>Статус ссылки</th><th>Дата проведения</th></tr>
            <?php
            $name_week = mysqli_query($conn, "SELECT * FROM weekday WHERE name_weekday = '$d'");
            If (mysqli_num_rows( $name_week ) > 0){
                $row_3 = mysqli_fetch_array( $name_week );
            }
            $id_week = $row_3['id_weekday'];
            $name_dis = mysqli_query($conn, "SELECT * FROM timetable_class WHERE distance = 1 AND weekday = '$id_week'");
            If (mysqli_num_rows($name_dis) > 0) {
                $row_1 = mysqli_fetch_array($name_dis);
                do{
                    $id_proff = $row_1['id_professor'];
                    $name_prof = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$id_proff'");
                    If (mysqli_num_rows($name_prof) > 0){
                        $row_2 = mysqli_fetch_array($name_prof);
                    }
                    $id_dis = $row_1['name_discipline'];
                    $result = mysqli_query($conn, "SELECT * FROM discipline WHERE id_discipline = '$id_dis'");
                    If (mysqli_num_rows($result) > 0){
                        $prr = mysqli_fetch_array($result);
                        $disss = $prr['name_discipline'];
                    }
                    $para = $row_1['number_para'];

                    $lin = mysqli_query($conn, "SELECT * FROM link_dis WHERE id_dis = '$id_dis' AND id_professor = '$id_proff' AND number_para = '$para' AND date_para = '$dates' order by date_para");
                    If (mysqli_num_rows($lin) > 0){
                        $link = mysqli_fetch_array($lin);
                        $link_disc = $link['link'];
                        $data_pa = $link['date_para'];
                        $number_para = $link['number_para'];
                        $stat = $link['status'];
                    }
                    if (($data_pa == $dates) && ($number_para == $para)){
                        if ($stat == 1){
                            echo '<tr><td>'.$row_2['FIO'].'</td><td>'.$disss. '<br><a href="../forum/view-forum.php?dis_id='.$id_dis.'">Общение</a></td><td>'.$row_1['group_kurs'].'</td><td>'.$row_1['number_para'].'</td><td><a href="'.$link_disc.'">'.$link_disc.'</a></td><td><img class="imgg" src="../img/check.png"></td><td>'.$data_pa.'</td></tr>';
                        }elseif ($stat == 0){
                            echo '<tr><td>'.$row_2['FIO'].'</td><td>'.$disss. '<br><a href="../forum/view-forum.php?dis_id='.$id_dis.'">Общение</a></td><td>'.$row_1['group_kurs'].'</td><td>'.$row_1['number_para'].'</td><td><a href="'.$link_disc.'">'.$link_disc.'</a></td><td><img class="imgg" src="../img/cross.png"></td><td>'.$data_pa.'</td></tr>';
                        }
                    }else{
                        echo '<tr><td>'.$row_2['FIO'].'</td><td>'.$disss. '<br><a href="../forum/view-forum.php?dis_id='.$id_dis.'+&group='.$row_1['group_kurs'].'">Общение</a></td><td>'.$row_1['group_kurs'].'</td><td>'.$row_1['number_para'].'</td><td>Нет ссылки</td><td>Неизвестен</td><td>'.$dates.'</td></tr>';
                    }
                } while($row_1 = mysqli_fetch_array($name_dis));
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>