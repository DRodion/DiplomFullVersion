<?php
require 'config.php';
$cookie_key = 'online_cache';
$id = $_SESSION['auth_customer_id'];
$online = mysqli_query($conn, "SELECT * FROM online where id_customer = '$id'");
$dd = time();


If (mysqli_num_rows($online) > 0)
{
    //update
    if (isset($_COOKIE['online_users_id']) == true AND isset($_COOKIE['online_users_time']) == true){
        if ($_COOKIE['online_users_time'] < (time() - 300)){
            $time = time();
            $online_users = 1;
            $onlineUS = mysqli_query($conn, "UPDATE online SET lastvisit = '$time', online_users = '$online_users' WHERE id_customer = '$id'");
            setcookie("online_users_id",$id, time() + (3600 * 24));
            setcookie("online_users_time",$time, time() + (3600 * 24));
        }
    }elseif (isset($_COOKIE['online_users_id']) == false AND isset($_COOKIE['online_users_time']) == false){
        $time = time();
        $online_users = 1;
        $onlineUS = mysqli_query($conn, "UPDATE online SET lastvisit = '$time', online_users = '$online_users' WHERE id_customer = '$id'");
        setcookie("online_users_id",$id, time() + (3600 * 24));
        setcookie("online_users_time",$time, time() + (3600 * 24));
    }
} else{
    //create
    $time = time();
    $online_users = 1;
    $onlineU = mysqli_query($conn, "INSERT INTO online values(NULL, '$id', '$time','$online_users')");
    setcookie("online_users_id",$id, time() + (3600 * 24));
    setcookie("online_users_time",$time, time() + (3600 * 24));
}
$time_now = (time() - (300));
$row = mysqli_query($conn, "SELECT count(id) FROM online WHERE lastvisit > '$time_now' or online_users = '1'");
$online_count = mysqli_fetch_array($row);
