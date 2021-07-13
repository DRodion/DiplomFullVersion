<?php
session_start();
require '../auth/auth.php';
require '../auth/auth_cookie.php';
require '../config.php';
require '../online.php';
$id_dis = $_GET['dis'];
$date_para = $_GET['datee'];
$group = $_GET['gr'];
$para = $_GET['para'];

$result = mysqli_query($conn, "SELECT * FROM discipline WHERE id_discipline = '$id_dis'");
If (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $name = $row['name_discipline'];
}

$id_cus = $_SESSION['auth_customer_id'];
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
    <title>Запись экрана</title>
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
            <p id="title-page" >Дистанционная пара</p>
        </div>
        <div class="screen">
            <h3>Параметры записи:</h3>
            <input type="checkbox" id="audioToggle" checked disabled/>
            <label for="audioToggle">Запись аудио</label>
            <input type="checkbox" id="micAudioToggle" checked disabled/>
            <label for="micAudioToggle">Запись микрофона</label>
        </div>
        <div class="screen">
            <h3>Шаг 1. Нажмите, чтобы выбрать область записи экрана:</h3>
            <p id="warning"></p>
            <button id="startBtn" >Начать запись</button>
        </div>
        <?php
        $send = mysqli_query($conn, "SELECT * FROM link_dis WHERE id_dis = '$id_dis' AND id_professor='$id_cus' AND date_para = '$date_para' AND number_para = '$para' ");
        if (mysqli_num_rows($send) != 0) {
            $mess = mysqli_fetch_array($send);
            $gr = $mess['group_kurs'];
            $link = $mess['link'];
            $idd = $mess['id_professor'];
            $para = $mess['number_para'];
        }
        ?>
        <div class="screen">
            <h3>Шаг 2. Нажмите, чтобы остановить запись экрана</h3>
            <button id="stopBtn" disabled>Остановить запись</button>
        </div>
      <div class="none">
          <input id="iddd" name="iddd" value="<?php echo $idd?>" />
          <input id="id_dis" name="id_dis" value="<?php echo $id_dis?>" />
          <input id="name_link" name="name_link" value="<?php echo $link?>" />
          <input id="gr" name="gr" value="<?php echo $gr?>" />
          <input id="para" name="para" value="<?php echo $para?>" />
       </div>
    <script src="src/index.js"></script>
    </div>
</div>
</body>
</html>