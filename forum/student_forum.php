<div id="block-parameters">
    <p id="title-page" >Общение</p>
</div>
<div class="choice-dis">
    <?php
    $id = $_SESSION['auth_customer_id'];

    $gr = mysqli_query($conn, "SELECT * FROM cus_student WHERE id_student = '$id'");
    If (mysqli_num_rows($gr) > 0){
        $row = mysqli_fetch_array($gr);
        $group_k = $row['kurs'];
    }

    $result = mysqli_query($conn, "SELECT * FROM dis_kurs WHERE group_kurs = '$group_k'");
    If (mysqli_num_rows($result) > 0) {
        while($row_1 = mysqli_fetch_assoc($result)) {
            $data[] = $row_1;
        }
        for ($j = 0; $j < count($data); $j++){
            $id_dis = $data[$j]['id_dis'];

            $dis = mysqli_query($conn, "SELECT * FROM discipline WHERE id_discipline = '$id_dis'");
            $rows = mysqli_fetch_array($dis);
            $name_dis = $rows['name_discipline'];

            echo '<a style="display:block" href="../forum/view-forum.php?dis_id='.$id_dis.'+&group='.$group_k.'">
                    <div class="dis-for"> 
                        <p class="diss">'.$name_dis.'</p>
                    </div>
                  </a>';
        }
    }
    ?>
</div>