<?php
session_start();

include '../config.php';

$faculty = filter_var(trim($_POST['faculty']),FILTER_SANITIZE_STRING);
$direction = filter_var(trim($_POST['direction']),FILTER_SANITIZE_STRING);
$group_kours =  filter_var(trim($_POST['group-kours']),FILTER_SANITIZE_STRING);
$name_dis =  filter_var(trim($_POST['name_dis']),FILTER_SANITIZE_STRING);
$data_proved =  filter_var(trim($_POST['data_proved']),FILTER_SANITIZE_STRING);
$professor = filter_var(trim($_POST['professor']),FILTER_SANITIZE_STRING);
$office = filter_var(trim($_POST['office']),FILTER_SANITIZE_STRING);
$distanse = filter_var(trim($_POST['dis']),FILTER_SANITIZE_STRING);
$data_para = filter_var(trim($_POST['data_para']),FILTER_SANITIZE_STRING);
$education = filter_var(trim($_POST['education']),FILTER_SANITIZE_STRING);
$type_para = filter_var(trim($_POST['type-para']),FILTER_SANITIZE_STRING);
$semestr = filter_var(trim($_POST['semestr']),FILTER_SANITIZE_STRING);

$error = array();

$row = mysqli_query($conn, "SELECT * FROM faculty where name_faculty = '$faculty'");
If (mysqli_num_rows($row) > 0)
{
    $row_1 = mysqli_fetch_array($row);
    $faculty_1 = $row_1['id_faculty'];
}

$row_2 = mysqli_query($conn, "SELECT * FROM direction_faculty where name_direction = '$direction'");
If (mysqli_num_rows($row_2) > 0)
{
    $row_3 = mysqli_fetch_array($row_2);
    $direction_1 = $row_3['id_direction'];
}

$row_4 = mysqli_query($conn, "SELECT * FROM customers where FIO = '$professor'");
If (mysqli_num_rows($row_4) > 0)
{
    $row_5 = mysqli_fetch_array($row_4);
    $professor_1 = $row_5['customer_id'];
}

$row_6 = mysqli_query($conn, "SELECT * FROM timetable_call where number = '$data_para'");
If (mysqli_num_rows($row_6) > 0)
{
    $row_7 = mysqli_fetch_array($row_6);
    $data_para_1 = $row_7['id_call'];
}

$row_8 = mysqli_query($conn, "SELECT * FROM discipline where name_discipline = '$name_dis'");
If (mysqli_num_rows($row_8) > 0)
{
    $row_9 = mysqli_fetch_array($row_8);
    $name_dis_1 = $row_9['id_discipline'];
}

$weekday = mysqli_query($conn, "SELECT * FROM weekday where name_weekday = '$data_proved'");
If (mysqli_num_rows($weekday) > 0)
{
    $weekday_1 = mysqli_fetch_array($weekday);
    $data_proved_1 = $weekday_1['id_weekday'];
}
$sem = mysqli_query($conn, "SELECT * FROM semester where name_semester = '$semestr'");
If (mysqli_num_rows($sem) > 0)
{
    $sem_1 = mysqli_fetch_array($sem);
    $semestr_1 = $sem_1['id_semester'];
}

if(isset($_POST['dis'])){
    $diss = 1;
    $office1 = 0;
}else{
    $diss = 0;
    $office1 = $office;
}

if (count($error)){
    echo implode('<br />', $error);
}else {
    mysqli_query($conn, "INSERT INTO timetable_class values(NULL, '$faculty_1', '$direction_1','$semestr_1', '$group_kours','$name_dis_1','$data_proved_1','$data_para_1', '$professor_1', '$office1', '$diss', '$type_para')");
    echo '<script type="text/javascript">document.location.href="../index_auth.php"</script>';
}
