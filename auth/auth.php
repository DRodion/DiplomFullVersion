<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include ("$_SERVER[DOCUMENT_ROOT]/config.php");
    $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $customers_id = filter_var(trim($_POST['customer_id']), FILTER_SANITIZE_STRING);

    if ($_POST["remember"] == "yes") {
        setcookie('remember',$username.'+'.$password.'+'.$customers_id,time()+3600*24*31, "/");
    }

    $result = mysqli_query($conn, "SELECT * FROM customers WHERE login = '$username' AND password = '$password'");
    If (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id = $row["customer_id"];
        $result_1 = mysqli_query($conn, "SELECT * FROM online WHERE id_customer = '$id'");
        If (mysqli_num_rows($result_1) > 0)
        {
            mysqli_query($conn, "UPDATE online SET online_users = 1 where id_customer = '$id'");
        }
            session_start();
            $_SESSION['auth'] = 'yes_auth';
            $_SESSION['auth_customer_id'] = $row["customer_id"];
            $_SESSION['auth_login'] = $row["login"];
            $_SESSION['auth_pass'] = $row["password"];
            $_SESSION['auth_FIO'] = $row["FIO"];
            $_SESSION['auth_happyDate'] = $row["happyDate"];
            $_SESSION['auth_status'] = $row["status"];
            echo 'yes_auth';
        }
}
?>