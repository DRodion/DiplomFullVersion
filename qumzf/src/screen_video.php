<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../../config.php';
    session_start();

    $id = filter_var(trim($_POST['id']),FILTER_SANITIZE_STRING);
    $id_dis = filter_var(trim($_POST['id_dis']),FILTER_SANITIZE_STRING);
    $filename = filter_var(trim($_POST['filename']),FILTER_SANITIZE_STRING);
    $datetime_now = date("Y-m-d H:i:s");
    $datetime_start = $_SESSION['datetimeStart'];

    mysqli_query($conn, "INSERT INTO screenvideo values(NULL, '$id','$id_dis', '$filename', '$datetime_start', 1)");

    $datetime_start_1 = strtotime($datetime_start);
    $datetime_now_1 = strtotime($datetime_now);

    $between_time = $datetime_now_1 - $datetime_start_1;
    $between_time_1 = date("H:i:s", mktime(0, 0, $between_time));

    if ($between_time >= 4500){
        mysqli_query($conn, "UPDATE redirection SET datetime_stop='$datetime_now', cross_over = '1', time_para ='$between_time_1' WHERE datetime_start = '$datetime_start' AND id_cus = '$id' ");
    }elseif ($between_time < 4500){
        mysqli_query($conn, "UPDATE redirection SET datetime_stop='$datetime_now', cross_over = '0', time_para ='$between_time_1' WHERE datetime_start = '$datetime_start' AND id_cus = '$id' ");
    }
echo 'yeees';
}

