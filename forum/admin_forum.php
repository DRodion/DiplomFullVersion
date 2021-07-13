<div id="block-parameters">
    <p id="title-page" >Общение</p>
</div>
<div class="choice-dis">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM dis_kurs order by group_kurs");

    If (mysqli_num_rows($result) > 0) {
        while($row_1 = mysqli_fetch_assoc($result)) {
            $data[] = $row_1;
        }
        for ($j = 0; $j < count($data); $j++){
            $id_dis = $data[$j]['id_dis'];
            $gr = $data[$j]['group_kurs'];

            $dis = mysqli_query($conn, "SELECT * FROM discipline WHERE id_discipline = '$id_dis'");
            $rows = mysqli_fetch_array($dis);
            $name_dis = $rows['name_discipline'];

            $id_prof = $rows['id_prof'];
            $prof = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$id_prof'");
            If (mysqli_num_rows($prof) > 0){
                $row = mysqli_fetch_array($prof);
                echo '<a style="display:block" href="../forum/view-forum.php?dis_id='.$id_dis.'+&group='.$gr.'">
                    <div class="dis-for"> 
                        <p class="diss">'.$name_dis.'</p>
                        <p class="gr"> Группа: '.$gr.'</p>
                        <p class="pr"> Преподаватель: '.$row['FIO'].'</p>
                    </div>
                  </a>';
            }
        }
    } ?>
</div>
