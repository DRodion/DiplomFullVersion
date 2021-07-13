<?php
session_start();
require '../auth/auth.php';
require '../auth/auth_cookie.php';
require '../config.php';
require '../online.php';
$_SESSION['urlpage'] = "<a href='../index_auth.php' >Главная</a>";
$_SESSION['id_dl_video'] = $_GET['id'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
    <meta name="keywords" content="shop, site, website, Univesity" />
    <meta name="description" content="Электронная информационная общественная среда" />
    <link href="../css/style.css" rel="stylesheet" type="text/css" />
    <link href="../css/style-1.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="../libs/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="../libs/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="../libs/jquery.form.js"></script>
    <script type="text/javascript" src="../js/main.js"></script>
    <title>Записи дистанционных пар</title>
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
            <?php
            $id = $_SESSION['id_dl_video'];
            $res = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$id' ");
            If (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_array($res);
                $FIO = $row['FIO'];
            }
            ?>
            <p id="title-page">Записи дистанционных пар - <?php  echo $FIO;?></p>
        </div>
            <div class="view-video">
                <ul id="block-view-video" >
                    <?php
                    $vid = mysqli_query($conn, "SELECT * FROM screenvideo WHERE id_cus = '$id' AND status = 1 ORDER BY datetimevideo");
                    if (mysqli_num_rows($vid) > 0) {
                        //$video = mysqli_fetch_array($vid);

                        while($video = mysqli_fetch_assoc($vid)) {
                            $vvideo[] = $video;
                        }

                        for($i = 0; $i < count($vvideo); $i++){
                            $id_dis = $vvideo[$i]['id_dis'];
                            $nname = $vvideo[$i]['name_video'];
                            $dis = mysqli_query($conn, "SELECT * FROM discipline WHERE id_discipline = '$id_dis'");
                            if (mysqli_num_rows($dis) > 0){
                                $discipline = mysqli_fetch_array($dis);
                            }
                            $video_path = '../qumzf/src/screenVideo/'.$nname;
                            do {
                                echo '
                    <li>
                       <div class="block-video" >
                            <video width="460" controls><source src='.$video_path.'></video>
                       </div>  
                      <div class="none">
                           
                       </div>
                        <input id="nam_vid" name="nam_vid" value="'.$nname.'" />                             
                       <p class="info-video" >Дата: '.$vvideo[$i]['datetimevideo'].'</p>
                       <p class="info-video" >Дисциплина: '.$discipline['name_discipline'].'</p>
                    </li>
                    <a href="../qumzf/src/screenVideo/unlink_video.php?nam_vid='.$nname.'"><input type="submit" class="right" id="button-reg" value="Удалить" /></a>
                    ';
                        } while ($video = mysqli_fetch_array($vid));
                    }
                }else {
                        echo '<h3 id="title-page">Видеозаписей дистанционных занятий нет!</h3>';
                    }
                    echo '</ul>';
                    ?>
            </div>
    </div>
</div>
</body>
</html>

