<?php
session_start();
require 'auth/auth.php';
require 'auth/auth_cookie.php';
$_SESSION['urlpage'] = "<a href='index_auth.php' >Главная</a>\ <a href='static_online.php' >Статистика посещений</a>";
require 'config.php';
require 'online.php';
?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <meta http-equiv="Content-Type" content="text/html;" charset="UTF-8" />
        <meta name="keywords" content="shop, site, website, Univesity" />
        <meta name="description" content="Электронная информационная общественная среда" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />

        <script type="text/javascript" src="libs/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="libs/jquery.cookie.min.js"></script>
        <script type="text/javascript" src="libs/jquery.form.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <title>Статистика посещений</title>
    </head>
    <body>
    <?php
    require 'include/block-header.php';
    ?>
    <div id="block-body_1">
        <?php
        require 'include/block-menu.php';
        ?>
        <div id="block-content">
            <div id="block-parameters">
                <p id="title-page" >Статистика посещений</p>
            </div>
            <table>
                <tr><th>ФИО</th><th>Последнее посещение</th><th>Статус</th></tr>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM online");
                If (mysqli_num_rows($result) > 0) {
                    //$row = mysqli_fetch_array($result);

                    while($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    }

                    for ($j = 0; $j < count($data); $j++){
                        $id_pol = $data[$j]["id_customer"];
                        $result_1 = mysqli_query($conn, "SELECT * FROM customers where customer_id = '$id_pol'");
                        If (mysqli_num_rows($result_1) > 0){
                            $row_1 = mysqli_fetch_array($result_1);
                        }
                        $time = date('Y-m-d H:i:s', $data[$j]["lastvisit"]);
                        $time_now_5 = (time() - (300));
                        $time_now_1hour = (time() - (3600));
                        $time_now_1day = (time() - (3600 * 24));
                        if (($data[$j]["lastvisit"] > $time_now_5) || $data[$j]["online_users"] == 1){
                            if ($data[$j]["online_users"] == 1){
                                $stat = "Онлайн";
                            }
                        }
                        elseif ($data[$j]["lastvisit"] < $time_now_5){
                            if ($data[$j]["online_users"] == 0){
                                $time_ne_sort = time() - $data[$j]["lastvisit"];
                                $time_sort = date('i', $time_ne_sort);
                                $stat = "Не в сети ";
                            }
                        }
                        echo '<tr><td>'.$row_1["FIO"].'</td><td>'.$time.'</td><td>'.$stat.'</td></tr>';
                    }
                }

                ?>
            </table>
        </div>
    </div>
    </body>
    </html>