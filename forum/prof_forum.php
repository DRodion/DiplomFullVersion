<div id="block-parameters">
    <p id="title-page" >Общение</p>
</div>
<div class="choice-dis">
    <?php
    $id = $_SESSION['auth_customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM discipline WHERE id_prof = '$id'");
    If (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_array($result);
        $id_dis = $rows['id_discipline'];
        $name = $rows['name_discipline'];
        $res = mysqli_query($conn, "SELECT * FROM dis_kurs WHERE id_dis = '$id_dis'");
        while($row_1 = mysqli_fetch_assoc($res)) {
            $data[] = $row_1;
        }

        for ($j = 0; $j < count($data); $j++){
            echo '<a style="display:block" href="../forum/view-forum.php?dis_id='.$id_dis.'+&group='.$data[$j]['group_kurs'].'">
                    <div class="dis-for"> 
                        <p class="diss">'.$name.'</p>
                        <p class="gr"> Группа: '.$data[$j]['group_kurs'].'</p>
                    </div>
                  </a>';
        }
    }
    ?>
</div>