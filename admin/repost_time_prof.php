<?php
session_start();
require '../auth/auth.php';
require '../auth/auth_cookie.php';
require '../config.php';
require '../online.php';
$_SESSION['urlpage'] = "<a href='../index_auth.php' >Главная</a>| <a href='reports.php' >Отчеты";

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
            <p id="title-page" >Отчеты о рабочем времени преподавателей</p>
        </div>
        <?php
        $facu = mysqli_query($conn, "SELECT * FROM faculty");
        If (mysqli_num_rows($facu) > 0) {
            //$row = mysqli_fetch_array($facu);

            while ($row = mysqli_fetch_assoc($facu)) {
                $data[] = $row;
            }

            for ($j = 0; $j <= count($data); $j++) {
                $id_facul = $data[$j]['id_faculty'];
                $name_faculty = $data[$j]['name_faculty'];
                echo '<h3 class="facul-name">' . $name_faculty . '</h3>';

                $cus = mysqli_query($conn, "SELECT * FROM cus_professor WHERE id_faculty = '$id_facul'");
                if (mysqli_num_rows($cus) > 0) {
                    //$cuss = mysqli_fetch_array($cus);
                    while ($cuss = mysqli_fetch_assoc($cus)) {
                        $namepr[] = $cuss;
                    }

                    for ($i = 0; $i <= count($namepr); $i++){
                        $id_cus = $namepr[$i]['id_professor'];
                        $res = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$id_cus' ");
                        if (mysqli_num_rows($res) > 0) {
                            $rows = mysqli_fetch_array($res);
                            echo '<p class="title-repos"><a href="view_repost.php?id=' . $id_cus. '">' . $rows['FIO'] . '</a></p>';
                        }
                    }unset($namepr);
                }
            }
        }
?>
    </div>
</div>
</body>
</html>
