<?php
session_start();

include '../config.php';
require '../auth/auth.php';
require '../auth/auth_cookie.php';
require '../online.php';

$dd_ss = filter_var(trim($_POST['date-cho']),FILTER_SANITIZE_STRING);
$dd_ee = filter_var(trim($_POST['date-cho1']),FILTER_SANITIZE_STRING);

$date_start = strtotime(filter_var(trim($_POST['date-cho']),FILTER_SANITIZE_STRING));
$date_end = strtotime(filter_var(trim($_POST['date-cho1']),FILTER_SANITIZE_STRING));
$datesss = date('Y-m-d H:i:s');

$_SESSION['urlpage'] = "<a href='../index_auth.php' >Главная</a> | <a href='reports.php' >Отчеты</a>| <a href='distance_repost.php' >Дистанционные занятия</a>";
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
                <p class="oice">С <input type="date" name="date-cho" id="date-cho" value="<?php echo $dd_ss; ?>"/> По <input type="date" name="date-cho1" id="date-cho1" value="<?php echo $dd_ee; ?>"/>  <input type="submit" id="choose-date" value="Выбрать"/></p>
            </div>
        </form>
        <table id="repos_dis">
            <tr class="ff"><th>ФИО</th><th>Дисциплина</th><th>Группа</th><th>Пара</th><th>Ссылка</th><th>Статус ссылки</th><th>Дата проведения</th></tr>
            <?php
            $k =  date("w",$date_start);
            for ($i = $date_start; $i < $date_end; $i += 86400){
                $name_dis = mysqli_query($conn, "SELECT * FROM timetable_class WHERE distance = 1 AND weekday = '$k'");
                If (mysqli_num_rows($name_dis) > 0) {
                    $row_1 = mysqli_fetch_array($name_dis);

                    $ka =  date("w",$i);
                    if ($ka = $row_1['weekday']){
                        $s = date('Y-m-d', $i);
                    }
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

                        $lin = mysqli_query($conn, "SELECT * FROM link_dis WHERE id_dis = '$id_dis' AND id_professor = '$id_proff' AND number_para = '$para' AND date_para BETWEEN '$dd_ss' AND '$dd_ee' AND date_para = '$s' ORDER BY date_para");

                        If (mysqli_num_rows($lin) > 0){
                            $link = mysqli_fetch_array($lin);
                            $dateee = $link['date_para'];
                            $link_disc = $link['link'];
                            $stat = $link['status'];
                            $number_para = $link['number_para'];
                            $id_link = $link['id_link'];
                        }

                        if (($dateee == $s) && ($number_para == $row_1['number_para'])){
                            if ($stat == 1){
                                echo '<tr><td>'.$row_2['FIO'].'</td><td>'.$disss. '<br><a href="../forum/view-forum.php?dis_id='.$id_dis.'+&group='.$row_1['group_kurs'].'">Общение</a></td><td>'.$row_1['group_kurs'].'</td><td>'.$row_1['number_para'].'</td><td><a href="'.$link_disc.'">'.$link_disc.'</a></td><td><img class="imgg" src="../img/check.png"></td><td>'.$s.'</td></tr>';
                            }elseif ($stat == 0){
                                echo '<tr><td>'.$row_2['FIO'].'</td><td>'.$disss. '<br><a href="../forum/view-forum.php?dis_id='.$id_dis.'+&group='.$row_1['group_kurs'].'">Общение</a></td><td>'.$row_1['group_kurs'].'</td><td>'.$row_1['number_para'].'</td><td><a href="'.$link_disc.'">'.$link_disc.'</a></td><td><img class="imgg" src="../img/cross.png"></td><td>'.$s.'</td></tr>';
                            }
                        }else{
                            echo '<tr><td>'.$row_2['FIO'].'</td><td>'.$disss. '<br><a href="../forum/view-forum.php?dis_id='.$id_dis.'+&group='.$row_1['group_kurs'].'">Общение</a></td><td>'.$row_1['group_kurs'].'</td><td>'.$row_1['number_para'].'</td><td>Нет ссылки</td><td>Неизвестен</td><td>'.$s.'</td></tr>';
                        }
                    } while($row_1 = mysqli_fetch_array($name_dis));

                }

                $k++;
                if ($k > 6){
                    $k = 1;
                    $i += 86400;
                }
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>