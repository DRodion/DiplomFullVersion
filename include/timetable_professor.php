<table id="timetable_class">
    <?php
    $day = $_GET["dday"];
    $month = $_GET["mmonth"];
    $year = 2021;
    $str = "$year-$month-$day";
    $d1 = strtotime($str);
    $date2 = date("Y-m-d", $d1);

    if ($date2 == '1970-01-01'){
        $date_ras = date("Y-m-d");
    }else{
        $date_ras = $date2;
    }

    $date=explode("-", $date_ras);
    $d2 = date("w", mktime(0, 0, 0, $date[1], $date[2], $date[0]));

    $days = array( 0 => 'Воскресенье', 'Понедельник' , 'Вторник' , 'Среда' , 'Четверг' , 'Пятница' , 'Суббота');
    $d = date($days[$d2]);

    $id = $_SESSION['auth_customer_id'];
    $week = mysqli_query($conn, "SELECT * FROM weekday WHERE name_weekday = '$d'");
    If (mysqli_num_rows($week) > 0)
    {
        $weekday = mysqli_fetch_array($week);
        $we = $weekday['id_weekday'];
    }

    $name_dis = mysqli_query($conn, "SELECT * FROM timetable_class WHERE id_professor = '$id' AND weekday = '$we'");
    If (mysqli_num_rows($name_dis) > 0) {
        //$row_1 = mysqli_fetch_array($name_dis);

        while($row_1 = mysqli_fetch_assoc($name_dis)) {
            $data[] = $row_1;
        }
    }
    ?>

    <tr><th colspan="3"><?php echo $d, ', ', $date_ras; ?></th></tr>
    <?php
    $arr = array(1, 2, 3, 4, 5, 6, 7);
    for ($i = 0; $i < count($arr); $i++){
        if (!empty($data)) {
            echo '<tr><td>' . $arr[$i] . '</td><td>';
            for ($j = 0; $j < count($data); $j++) {
                if ($arr[$i] == $data[$j]["number_para"]) {
                    if ($data[$j]['distance'] == 1) {
                        $off = "[Дист]";
                    }

                    if ($data[$j]['distance'] == 0) {
                        $off = "[кб." . $data[$j]['office']. "]";
                    }
                    $id = $data[$j]['id_professor'];
                    $name_prof = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$id'");
                    if (mysqli_num_rows($name_prof) > 0) {
                        $prof = mysqli_fetch_array($name_prof);
                    }

                    $id_dis = $data[$j]['name_discipline'];
                    $name_dis = mysqli_query($conn, "SELECT * FROM discipline WHERE id_discipline = '$id_dis'");
                    if (mysqli_num_rows($name_dis) > 0) {
                        $diss = mysqli_fetch_array($name_dis);
                    }
                    if ($off == "[Дист]") {
                        echo $data[$j]['type_para'].'</td><td>'.$diss['name_discipline'] . '<br>' . $off . '<br> (' . $data[$j]['group_kurs'] . ') <br> <a class="link-para" href="../dictansion_class.php?dis_id='.$id_dis.'+&para='.$data[$j]["number_para"].'+&date='.$date_ras.'+&id='.$id.'+&group='.$data[$j]['group_kurs'].'">Введите ссылку</a><br>';
                    } else {
                        echo $data[$j]['type_para'].'</td><td>'.$diss['name_discipline'] . '<br>' . $off . '<br> (' . $data[$j]['group_kurs'] . ') <br>';
                    }
                }
                $num_pa = $data[$j]["number_para"];
            }
            for ($k = $num_pa; $k < 7; $k++){
                if ($arr[$i] == $arr[$k]){
                    echo '       </td><td>      ';
                }
            }
            echo '</td></tr>';
        }
        if (empty($data)){
            echo '<tr><td>' . $arr[$i] . '</td><td>     </td><td>          </td></tr>';
        }
    }
    ?>
</table>
