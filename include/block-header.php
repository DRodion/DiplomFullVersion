<?php

if ($_SESSION['auth_status'] == 1)
{
    $id = $_SESSION['auth_customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM online WHERE id_customer = '$id'");
    If (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        if ($row["online_users"] == 1)
        {
            $status_online = 'Онлайн';
        }
        if ($row["online_users"] == 0)
        {
            $status_online = 'Офлайн';
        }
    }
    echo '<div id="block-body">

    <div id="block-header">

        <div id="block-header1" >
            <h3>ЭИОС. Панель администрирования</h3>
            <div id="online_but">';
    $ddate = date("Y-m-d, H:i:s");
    echo $status_online.', сейчас: '.$ddate;
            echo '</div>
        </div>

        <div id="block-header2" >
            <p class="right"><a href="profile.php" >';
                    if ($_SESSION['auth'] == 'yes_auth'){
                        echo $_SESSION['auth_FIO'];
                    }
                    echo '</a> | <a id="logout" >Выход</a></p>

        </div>
        <div id="block-header3" >
            <p class="right" id="link-nav" >';
             echo $_SESSION['urlpage'];
             echo '</p>
        </div>

    </div>
</div>

<div id="pusto"></div>
';
}

if ($_SESSION['auth_status'] == 2)
{
    $id = $_SESSION['auth_customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM online WHERE id_customer = '$id'");
    If (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        if ($row["online_users"] == 1)
        {
            $status_online = 'Онлайн';
        }
        if ($row["online_users"] == 0)
        {
            $status_online = 'Офлайн';
        }
    }
    echo '<div id="block-body">

    <div id="block-header">

        <div id="block-header1" >
            <h3>ЭИОС. Студент</h3>
            <div id="online_but">';
    $ddate = date("Y-m-d, H:i:s");
    echo $status_online.', сейчас: '.$ddate;
    echo '</div>
        </div>

        <div id="block-header2" >
            <p class="right"><a href="profile.php" >';
    if ($_SESSION['auth'] == 'yes_auth'){
        echo $_SESSION['auth_FIO'];
    }
    echo '</a> | <a id="logout">Выход</a></p>

        </div>
        <div id="block-header3" >
            <p class="right" id="link-nav" >';
    echo $_SESSION['urlpage_1'];
    echo '</p>
        </div>

    </div>
</div>

<div id="pusto"></div>
';
}

if ($_SESSION['auth_status'] == 3)
{
    $id = $_SESSION['auth_customer_id'];
    $result = mysqli_query($conn, "SELECT * FROM online WHERE id_customer = '$id'");
    If (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        if ($row["online_users"] == 1)
        {
            $status_online = 'Онлайн';
        }
        if ($row["online_users"] == 0)
        {
            $status_online = 'Офлайн';
        }
    }
    echo '<div id="block-body">

    <div id="block-header">

        <div id="block-header1" >
            <h3>ЭИОС. Преподаватель</h3>
            <div id="online_but">';
    $ddate = date("Y-m-d, H:i:s");
    echo $status_online.', сейчас: '.$ddate;

    echo '</div>
        </div>

        <div id="block-header2" >
            <p class="right"><a href="profile.php" >';
    if ($_SESSION['auth'] == 'yes_auth'){
        echo $_SESSION['auth_FIO'];
    }
    echo '</a> | <a id="logout">Выход</a></p>

        </div>
        <div id="block-header3" >
            <p class="right" id="link-nav" >';
    echo $_SESSION['urlpage_2'];
    echo '</p>
        </div>

    </div>
</div>

<div id="pusto"></div>
';
}
?>
