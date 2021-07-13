<?php
session_start();
require '../auth/auth.php';
require '../auth/auth_cookie.php';
require '../config.php';
require '../online.php';

$_SESSION['urlpage'] = "<a href='../index_auth.php' >Главная</a>| <a href='repost_time_prof.php' >Рабочее время</a> ";
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
    <title>Рабочее время</title>
</head>
<body>
<?php
require '../include/block-header.php';
?>
<div id="block-body_1">
    <?php
    require '../include/block-menu.php';
    $id = $_GET['id'];
    $res = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$id' ");
    If (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        $name = $row['FIO'];
    }
    $result = mysqli_query($conn, "SELECT * FROM cus_professor WHERE id_professor = '$id' ");
    If (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $id_fuc = $row['id_faculty'];
        $id_dep = $row['id_department'];
    }
    $faculty = mysqli_query($conn, "SELECT * FROM faculty WHERE id_faculty = '$id_fuc' ");
    If (mysqli_num_rows($faculty) > 0){
        $row = mysqli_fetch_array($faculty);
        $name_fuc = $row['name_faculty'];
    }
    $departmet = mysqli_query($conn, "SELECT * FROM department WHERE id_department = '$id_dep' ");
    If (mysqli_num_rows($departmet) > 0){
        $row = mysqli_fetch_array($departmet);
        $name_dep = $row['name_department'];
    }
    ?>

    <div id="block-content-4">
        <div id="block-parameters">
            <p id="title-page" >Учет рабочего времени сотрудника при дистанционном режиме работы</p>
        </div>
        <div id="block-table-report">
            <?php
            echo '<div id="href-doc">
                    <a href="repos_about_prof.php?id='.$id.'" id="pdf-doc-view">Сгенерировать Exсel-файл</a><br>
                  </div>';
            ?>
            <table id="rep">
                <tr><th colspan="8" id="text"><?php echo $name?></th></tr>
                <tr><th colspan="8"><?php echo $name_fuc?></th></tr>
                <tr><th colspan="8"><?php echo $name_dep?></th></tr>
                <tr>
                    <th>Наименование дисциплины</th>
                    <th>Группа</th>
                    <th>Дата проведения пары</th>
                    <th>Время начала</th>
                    <th>Время окончания</th>
                    <th>Статус ссылки</th>
                    <th>Длительность пары</th>
                    <th>Статус проведения пары</th>
                </tr>
                <?php
                $date_e = date("Y-m-d");
                $sem = mysqli_query($conn, "SELECT * FROM semester WHERE id_semester = 1 ");
                $semes = mysqli_fetch_array($sem);
                $date_sta = $semes['date_start'];

                $date_start = strtotime($date_sta) ;
                $date_end = strtotime($date_e);
                $k =  date("w",$date_start);
                $countPar = 0;
                $prov = 0;
                $timeProv = 0;

                for ($i = $date_start; $i <= $date_end; $i += 86400){
                    $name_dis = mysqli_query($conn, "SELECT * FROM timetable_class WHERE distance = 1 AND weekday = '$k' and id_professor = '$id'");
                    If (mysqli_num_rows($name_dis) > 0) {
                        $row_1 = mysqli_fetch_array($name_dis);
                        $ka =  date("w",$i);
                        if ($ka = $row_1['weekday']){
                            $s = date('Y-m-d', $i);
                        }
                        do{
                            $id_dis = $row_1['name_discipline'];
                            $result = mysqli_query($conn, "SELECT * FROM discipline WHERE id_discipline = '$id_dis'");
                            If (mysqli_num_rows($result) > 0){
                                $prr = mysqli_fetch_array($result);
                                $disss = $prr['name_discipline'];
                            }
                            $para = $row_1['number_para'];

                            $lin = mysqli_query($conn, "SELECT * FROM link_dis WHERE id_dis = '$id_dis' AND number_para = '$para' AND date_para = '$s'AND date_para BETWEEN '$date_sta' AND '$date_e' ORDER BY date_para");
                            If (mysqli_num_rows($lin) > 0){
                                $link = mysqli_fetch_array($lin);
                                $dateee = $link['date_para'];
                                $link_disc = $link['link'];
                                $stat = $link['status'];
                                $number_para = $link['number_para'];
                            }

                            $par = mysqli_query($conn, "SELECT * FROM timetable_call WHERE id_call = '$para'");
                            If (mysqli_num_rows($par) > 0){
                                $numPara = mysqli_fetch_array($par);
                                $start = $numPara['time_start'];
                                $stop = $numPara['time_stop'];
                            }
                            $redir = mysqli_query($conn, "SELECT * FROM redirection WHERE id_cus = '$id' and id_dis = '$id_dis' AND DATE_FORMAT(datetime_start,'%Y-%m-%d') = '$dateee' AND para = '$para' order by datetime_start");
                            If (mysqli_num_rows($redir) > 0){
                                $row = mysqli_fetch_array($redir);
                                $datetime_start = $row['datetime_start'];
                                $start_date = date("Y-m-d",strtotime($datetime_start));
                                $datetime_stop = $row['datetime_stop'];
                                $gr = $row['number_group'];
                                $time_para = $row['time_para'];
                                $cross_over = $row['cross_over'];
                                $para_red = $row['para'];
                            }
                            $ttime_para = strtotime("01:20:00");
                            if ($dateee == $s){
                                if ($stat == 1){
                                    If (mysqli_num_rows($redir) > 0){
                                        if ($datetime_start == $datetime_stop){
                                            echo '<tr>
                                    <td>'.$disss.'</td>
                                    <td>'.$row_1['group_kurs'].'</td>
                                    <td>'.$s.'<br>('.$para.')</td>
                                    <td>'.date('H:i:s', strtotime($datetime_start)).'</td>
                                    <td> ----- </td>
                                    <td><img class="imgg" src="../img/check.png" /></td>
                                    <td> ----- </td>
                                    <td>Проводится</td>
                                    </tr>';
                                        }elseif ($ttime_para > strtotime($time_para)){
                                            echo '<tr>
                                <td>'.$disss.'</td>
                                <td>'.$row_1['group_kurs'].'</td>
                                <td>'.$s.'<br>('.$para.')</td>
                                <td>'.date('H:i:s', strtotime($datetime_start)).'</td>
                                <td>'.date('H:i:s', strtotime($datetime_stop)).'</td>
                                <td><img class="imgg" src="../img/check.png" /></td>
                                <td>'.$time_para.'</td>
                                <td>Не засчитывается</td>
                                </tr>';
                                        }else{
                                            echo '<tr>
                                    <td>'.$disss.'</td>
                                    <td>'.$row_1['group_kurs'].'</td>
                                    <td>'.$s.'<br>('.$para.')</td>
                                    <td>'.date('H:i:s', strtotime($datetime_start)).'</td>
                                    <td>'.date('H:i:s', strtotime($datetime_stop)).'</td>
                                     <td><img class="imgg" src="../img/check.png" /></td>
                                     <td>'.$time_para.'</td>
                                    <td>Проведено</td>
                                    </tr>';
                                            $prov += 1;
                                            $part = explode(':', $time_para);
                                            $a = $part[0]*3600 + $part[1]*60 + $part[2];
                                            $timeProv = $timeProv + $a;
                                        }
                                    }
                                    If (mysqli_num_rows($redir) == 0){
                                        echo '<tr>
                                    <td>'.$disss.'</td>
                                    <td>'.$row_1['group_kurs'].'</td>
                                    <td>'.$s.'<br>('.$para.')</td>
                                    <td>'.$start.'</td>
                                    <td>'.$stop.'</td>
                                    <td><img class="imgg" src="../img/check.png" /></td>
                                    <td>00:00:00</td>
                                    <td>Не проведено</td>
                                    </tr>';
                                    }
                                }else{
                                    echo '<tr>
                                    <td>'.$disss.'</td>
                                    <td>'.$row_1['group_kurs'].'</td>
                                    <td>'.$s.'<br>('.$para.')</td>
                                    <td> ----- </td>
                                    <td> ----- </td>
                                    <td> <img class="imgg" src="../img/cross.png" /> </td>
                                    <td> ----- </td>
                                    <td> ----- </td>
                                    </tr>';
                                }
                            }else{
                                echo '<tr>
                                <td>'.$disss.'</td>
                                <td>'.$row_1['group_kurs'].'</td>
                                <td>'.$s.'<br>('.$para.')</td>
                                <td>'.$start.'</td>
                                <td>'.$stop.'</td>
                                <td>Нет ссылки</td>
                                <td>00:00:00</td>
                                <td>Отсутстует</td>
                                </tr>';
                            }
                            $countPar += 1;
                        } while($row_1 = mysqli_fetch_array($name_dis));
                    }
                    $k = $k + 1;
                    if ($k > 6 ){
                        $i += 86400;
                        $k = 1;
                    }
                }
                ?>
                <tr>
                    <td colspan="6" class="itog">Итого:</td>
                    <?php
                    function secondsToTime($time) {
                        $sec = $time % 60;
                        $time = floor($time / 60);
                        $min = $time % 60;
                        $time = floor($time / 60);
                        return $time . ":" . $min . ":" . $sec;

                    }
                    function secondsToTimee($seconds) {
                        $dtF = new \DateTime('@0');
                        $dtT = new \DateTime("@$seconds");
                        return $dtF->diff($dtT)->format('%H:%I:%S');
                    }

                    $time_itog = '01:30:00';
                    $part = explode(':', $time_itog);
                    $a = $part[0]*3600 + $part[1]*60 + $part[2];
                    $iit = $a * $countPar;
                    $timeProv1 = secondsToTime($timeProv);
                    $ttime = secondsToTime($iit);
                    ?>
                    <td class="info-itog"><?php echo $timeProv1; ?> / <br><?php echo $ttime; ?></td>
                    <td class="info-itog"><?php echo $prov; ?> /<?php echo $countPar;?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>