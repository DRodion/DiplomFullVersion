<?php
session_start();
require '../auth/auth.php';
require '../auth/auth_cookie.php';
require '../config.php';
require '../online.php';

$_SESSION['url_forum'] = $_SERVER['REQUEST_URI'];
$id_dis = $_GET["dis_id"];
$group = $_GET['group'];
$ddaes = date('Y-m-d');
$result = mysqli_query($conn, "SELECT * FROM discipline WHERE id_discipline = '$id_dis'");
If (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $name = $row['name_discipline'];
    $id_fac = $row['id_faculty'];
    $id_dir = $row['id_direction'];
    if ($row['distance'] == 1){
        $dist = 'Дистанционно';
    }else{
        $dist = 'Очно';
    }
}
$_SESSION['urlpage'] = "<a href='../index_auth.php'>Главная</a> | <a href='../send_message.php'>Общение</a> | <a>$name</a>";
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
    <?php
        echo '<title>Общение - '.$name.'</title>';
    ?>
</head>
<body>
<?php
require '../include/block-header.php';
?>
<div id="block-body_1">
    <?php
    require '../include/block-menu.php';
    ?>
    <div id="block-content-forum">
        <div id="block-parameters">
            <?php echo '<p id="title-page" >'.$name.'</p>'; ?>
        </div>
        <?php
        $pr = mysqli_query($conn, "SELECT * FROM faculty WHERE id_faculty = '$id_fac'");
        If (mysqli_num_rows($pr) > 0){
            $prr = mysqli_fetch_array($pr);
            $name_fac = $prr['name_faculty'];
        }
        $dir = mysqli_query($conn, "SELECT * FROM direction_faculty WHERE id_direction = '$id_dir'");
        If (mysqli_num_rows($dir) > 0){
            $dirr = mysqli_fetch_array($dir);
            $name_dir = $dirr['name_direction'];
        }
        ?>
        <div id="block-info">
            <table>
                <tr><th>Факультет:</th><td><?php echo $name_fac; ?></td></tr>
                <tr><th>Направление подготовки:</th><td><?php echo $name_dir; ?></td></tr>
                <tr><th>Форма обучения:</th><td><?php echo $dist; ?></td></tr>
                <tr><th>Группа:</th><td><?php echo $group; ?></td></tr>
            </table>
        </div>
        <form method="post">
            <div id="block-forum">
                <div id="panel-forum">
                    <h2>Форум по дисциплине</h2>
                </div>
                <div>
                    <?php
                        $sendd = mysqli_query($conn, "SELECT * FROM link_dis WHERE id_dis = '$id_dis' AND group_kurs = '$group' AND status = 1 AND date_para <= '$ddaes' ORDER BY date_para");
                        if (mysqli_num_rows($sendd) > 0) {

                            while($ex = mysqli_fetch_assoc($sendd)) {
                                $send[] = $ex;
                            }
                            for ($j = 0; $j < count($send); $j++){
                                $idd = $send[$j]['id_professor'];
                                $link = $send[$j]['link'];
                                $time = $send[$j]['datetime_para'];

                                $cus = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$idd'");
                                if (mysqli_num_rows($cus) != 0){
                                    $cust = mysqli_fetch_array($cus);
                                    $fio = $cust['FIO'];
                                }
                                if ($_SESSION['auth_status'] == 3){
                                    echo '<div class="message">
                                    <div id="name_cus">
                                        <h3>'.$fio.'</h3>
                                    </div>
                                    <p class="mess-for">Доброго времени суток. Наше занятие будет проходить дистанционно. Ссылка приложена ниже:</p>
                                    <p class="mess-for">Дата проведения: '.$send[$j]['date_para'].', '.$send[$j]['number_para'].' пара</p>
                                    <a id="name_name" href="../qumzf/index.php?id='.$idd.'&dis='.$id_dis.'&datee='.$send[$j]['date_para'].'&gr='.$group.'&para='.$send[$j]['number_para'].'">Перейти к ссылке</a> 
                                    <div id="name_dat">
                                        <h4>'.$time.'</h4>
                                    </div>
                                    </div>';
                                }elseif ($_SESSION['auth_status'] == 2 || $_SESSION['auth_status'] == 1){
                                        echo '<div class="message">
                                        <div id="name_cus">
                                            <h3>'.$fio.'</h3>
                                        </div>
                                        <p class="mess-for">Доброго времени суток. Наше занятие будет проходить дистанционно. Ссылка приложена ниже:</p>
                                         <p class="mess-for">Дата проведения: '.$send[$j]['date_para'].', '.$send[$j]['number_para'].' пара</p>
                                        <a target="_blank" id="name_name" href="'.$link.'">'.$link.'</a>
                                        <div id="name_dat">
                                            <h4>'.$time.'</h4>
                                        </div>
                                    </div>';
                                }
                            }
                        }
                        ?>
                </div>
                <div id="panel-forum-text">
                    <p>Напишите свое сообщение здесь</p>
                    <div id="text-forum">
                        <textarea name = "text" id = "text" ></textarea >
                    </div>
                    <div id="button-forum">
                        <input type="submit" class="right" id="button-message" value="Отправить" />
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
