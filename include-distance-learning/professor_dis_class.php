<div id="block-parameters">
    <p id="title-page" >Дистанционные занятия</p>
</div>
<?php
If ($_SERVER['HTTP_REFERER'] == $_SESSION['url']){
    $id = $_GET['id'];
    echo '
<form method="post">
    <div id="content">
        <p id="distance">Введите данные для проведения дистанционного занятия</p>
        <div id="message-link">
            <p>Ссылка недействительна ИЛИ указана платформа не Zoom или Skype</p>
        </div>
        <ul class="input-dis">
            <li>
                <label for="sessionID">ID-пользователя</label>
                <span class="star">*</span>
                <input type="text" name="sessionID" id="sessionID" value="'.$id.'"/>
            </li>
            <li>
                <label for="education">Наименование дисциплины</label>
                <span class="star">*</span>';
                    $id_dis = $_GET['dis_id'];
                    $para = $_GET['para'];
                    $date = $_GET['date'];
                    $numPar = $_GET['group'];
                    $result = mysqli_query($conn, "SELECT * FROM discipline WHERE id_prof = '$id' and distance = 1 AND id_discipline = '$id_dis'");
                    If (mysqli_num_rows($result) > 0)
                    {
                        while($row_1 = mysqli_fetch_assoc($result)) {
                            $data[] = $row_1;
                        }

                        for ($j = 0; $j < count($data); $j++){
                            //$gr = $data[$j]['group_kurs'];
                            echo '<input type="text" name="education" id="education" value="'.$data[$j]['name_discipline'].'"/>';
                        }
                    }
                    echo '
            </li>
            <li>
                <label for="group-kurs">Группа</label>
                <span class="star">*</span>
                <input type="text" name="group-kurs" id="group-kurs" value="'.$numPar.'"/>
            </li>
            <li>
                <label for="number-para">Номер пары</label>
                <span class="star">*</span>
                <input type="text" name="number-para" id="number-para" value="'.$para.'"/>
            </li>
            <li>
                <label for="link">Ссылка</label>
                <span class="star">*</span>
                <input type="text" name="link" id="link"/>
            </li>
            <li>
                <label for="date-para">Дата проведения</label>
                <span class="star">*</span>
                <input type="text" name="date-para" id="date-para" value="'.$date.'"/>
            </li>
            <div class="right" id="button-check">
                <a>Записать</a>
                <p class="sessionID">'.$id.'</p>
            </div>

        </ul>
    </div>
</form>';
}elseif ($_SERVER['HTTP_REFERER'] == 'http://localhost/index_auth.php' or $_SERVER['HTTP_REFERER'] == 'http://localhost/send_message.php' or $_SERVER['HTTP_REFERER'] == 'http://localhost/dictansion_class.php' ){
    echo '
<form method="post">
    <div id="content">
        <p id="distance">Введите данные для проведения дистанционного занятия</p>
        <div id="message-link">
            <p>Ссылка недействительна ИЛИ указана платформа не Zoom или Skype</p>
        </div>
        <ul class="input-dis">
            <li>
                <label for="education">Наименование дисциплины</label>
                <span class="star">*</span>
                <select name="education" id="education">
                    <option>Не выбрано</option>';
                        $id = $_SESSION['auth_customer_id'];
                        $result = mysqli_query($conn, "SELECT DISTINCT name_discipline FROM discipline WHERE id_prof = '$id' and distance = 1");
                        If (mysqli_num_rows($result) > 0)
                        {
                            while($row_1 = mysqli_fetch_assoc($result)) {
                                $data[] = $row_1;
                            }
                            for ($j = 0; $j < count($data); $j++){
                                echo '<option>'.$data[$j]['name_discipline'].'</option>';
                            }
                        }
                        echo '
                </select>
            </li>
            <li>
                <label for="group-kurs">Группа</label>
                <span class="star">*</span>
                <input type="text" name="group-kurs" id="group-kurs"/>
            </li>
            <li>
                <label for="number-para">Номер пары</label>
                <span class="star">*</span>
                <input type="text" name="number-para" id="number-para"/>
            </li>
            <li>
                <label for="link">Ссылка</label>
                <span class="star">*</span>
                <input type="text" name="link" id="link"/>
            </li>
            <li>
                <label for="date-para">Дата проведения</label>
                <span class="star">*</span>
                <input type="date" name="date-para" id="date-para"/>
            </li>
            <div class="right" id="button-check">
                <a>Записать</a>
                <p class="sessionID">'.$id.'</p>
            </div>
        </ul>
    </div>
</form>';
}
?>

