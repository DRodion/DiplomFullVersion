<?php
session_start();

include '../config.php';
$status = filter_var(trim($_POST['statusUser']),FILTER_SANITIZE_STRING);

//для администратора
$username = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$fio =  filter_var(trim($_POST['FIO']),FILTER_SANITIZE_STRING);
$age = filter_var(trim($_POST['age']),FILTER_SANITIZE_STRING);

//для студента
$username2 = filter_var(trim($_POST['username2']),FILTER_SANITIZE_STRING);
$password2 = filter_var(trim($_POST['password2']),FILTER_SANITIZE_STRING);
$fio2 =  filter_var(trim($_POST['FIO2']),FILTER_SANITIZE_STRING);
$age2 = filter_var(trim($_POST['age2']),FILTER_SANITIZE_STRING);
$faculty2 = filter_var(trim($_POST['faculty2']),FILTER_SANITIZE_STRING);
$direction2 = filter_var(trim($_POST['direction2']),FILTER_SANITIZE_STRING);
$kurs2 = filter_var(trim($_POST['kurs2']),FILTER_SANITIZE_STRING);
$forma_education = filter_var(trim($_POST['forma-education']),FILTER_SANITIZE_STRING);
$profile = filter_var(trim($_POST['profile']),FILTER_SANITIZE_STRING);

//для преподавателя
$username3 = filter_var(trim($_POST['username3']),FILTER_SANITIZE_STRING);
$password3 = filter_var(trim($_POST['password3']),FILTER_SANITIZE_STRING);
$fio3 =  filter_var(trim($_POST['FIO3']),FILTER_SANITIZE_STRING);
$age3 = filter_var(trim($_POST['age3']),FILTER_SANITIZE_STRING);
$faculty3 = filter_var(trim($_POST['faculty3']),FILTER_SANITIZE_STRING);
$department3 = filter_var(trim($_POST['department3']),FILTER_SANITIZE_STRING);
$position = filter_var(trim($_POST['professay']),FILTER_SANITIZE_STRING);

$result_1 = mysqli_query($conn, "SELECT * FROM status where name = '$status'");
If (mysqli_num_rows($result_1) > 0){
    $row = mysqli_fetch_array($result_1);
    $status_1 = $row['id_status'];
}
//статус Администратор
if($status_1 == 1)
{
    $username_version = $username;
    $password_version = $password;
    $fio_version = $fio;
    $age_version = $age;
    mysqli_query($conn, "INSERT INTO customers values(NULL, '$username_version', '$password_version','$status_1', '$fio_version','$age_version')");
    echo '<script type="text/javascript">document.location.href="../index_auth.php"</script>';
}
//Статус Студент
if($status_1 == 2)
{
    $username_version = $username2;
    $password_version = $password2;
    $fio_version = $fio2;
    $age_version = $age2;
    $kurs = $kurs2;
    //id факультета
    $result_2 = mysqli_query($conn, "SELECT * FROM faculty where name_faculty = '$faculty2'");
    If (mysqli_num_rows($result_2) > 0)
    {
        $row_1 = mysqli_fetch_array($result_2);
        $faculty_version = $row_1['id_faculty'];
    }
    //id направления
    $result_3 = mysqli_query($conn, "SELECT * FROM direction_faculty where name_direction = '$direction2'");
    If (mysqli_num_rows($result_3) > 0)
    {
        $row_2 = mysqli_fetch_array($result_3);
        $direction_version = $row_2['id_direction'];
    }

    mysqli_query($conn, "INSERT INTO customers values(NULL, '$username_version', '$password_version','$status_1', '$fio_version','$age_version')");
    $stu = mysqli_query($conn, "SELECT * FROM customers WHERE login = '$username_version'");
    If (mysqli_num_rows($stu) > 0)
    {
        $stud = mysqli_fetch_array($stu);
        $id_student = $stud['customer_id'];
    }
    mysqli_query($conn, "INSERT INTO cus_student values('$id_student','$faculty_version', '$direction_version','$kurs', '$forma_education', '$profile')");
    echo '<script type="text/javascript">document.location.href="../index_auth.php"</script>';
}
//Статус Преподаватель
if($status_1 == 3)
{
    $username_version = $username3;
    $password_version = $password3;
    $fio_version = $fio3;
    $age_version = $age3;
    //id факультета
    $result_5 = mysqli_query($conn, "SELECT * FROM faculty where name_faculty = '$faculty3'");
    If (mysqli_num_rows($result_5) > 0)
    {
        $row_4 = mysqli_fetch_array($result_5);
        $faculty_version = $row_4['id_faculty'];
    }
    //id кафедры
    $result_4 = mysqli_query($conn, "SELECT * FROM department where name_department = '$department3'");
    If (mysqli_num_rows($result_4) > 0)
    {
        $row_3 = mysqli_fetch_array($result_4);
        $department_version = $row_3['id_department'];
    }
    mysqli_query($conn, "INSERT INTO customers values(NULL, '$username_version', '$password_version','$status_1', '$fio_version','$age_version')");
    $prof = mysqli_query($conn, "SELECT * FROM customers WHERE login = '$username_version'");
    If (mysqli_num_rows($prof) > 0)
    {
        $profes = mysqli_fetch_array($prof);
        $id_professor = $profes['customer_id'];
    }
    $pos = mysqli_query($conn, "SELECT * FROM position WHERE name_position = '$position'");
    If (mysqli_num_rows($pos) > 0)
    {
        $posit = mysqli_fetch_array($pos);
        $id_position = $posit['id_position'];
    }
    mysqli_query($conn, "INSERT INTO cus_professor values('$id_professor','$faculty_version', '$department_version','$id_position')");
    echo '<script type="text/javascript">document.location.href="../index_auth.php"</script>';
}
    //mysqli_query($conn, "INSERT INTO customers values(NULL, '$username_version', '$password_version','$status_1', '$fio_version','$age_version', '$faculty_version', '$department_version', '$direction_version','$kurs')");
    //echo '<script type="text/javascript">document.location.href="../index_auth.php"</script>';