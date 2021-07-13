<?php
include 'config.php';
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_SESSION['auth_customer_id'];
    $result_1 = mysqli_query($conn, "SELECT * FROM online WHERE id_customer = '$id'");
    If (mysqli_num_rows($result_1) > 0)
    {
        mysqli_query($conn, "UPDATE online SET online_users = 0 where id_customer = '$id'");
    }
    unset($_SESSION['auth']);
    setcookie('remember','',0,'/');
    echo 'logout';
}
