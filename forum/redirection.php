<?php
include '../config.php';
session_start();

$id_cus = $_POST['id'];
$link = $_POST['link'];
$id_dis = $_POST['id_dis'];
$para = $_POST['para'];
$datetime = date("Y-m-d H:i:s");
$date_format_date = date("N");
$date_format_time = strtotime(date("H:i:s"));
$_SESSION['datetimeStart'] = $datetime;
$gr = $_POST['gr'];

$res = mysqli_query($conn, "SELECT * FROM timetable_class WHERE id_professor = '$id_cus' AND name_discipline= '$id_dis'");
If (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_array($res);
    $group = $row['group_kurs'];
    $week = $row['weekday'];
}

$timeC = mysqli_query($conn, "SELECT * FROM timetable_call WHERE number = '$para' ");
If (mysqli_num_rows($timeC) > 0) {
   $timee = mysqli_fetch_array($timeC);
   $time_start = $timee['time_start'];
   $time_start_1 = strtotime($time_start);
}

$between_time = abs($date_format_time - $time_start_1);
$between_time_1 = date("H:i:s", mktime(0, 0, $between_time));

if (($date_format_date == $week) && ($between_time <= 600)){
   mysqli_query($conn, "INSERT INTO redirection values(NULL, '$id_cus', '$datetime', '$datetime', '$id_dis','$gr','$para', '$between_time_1', '0')");
}
echo 'ohhh';
//header('Location: '.$link);

