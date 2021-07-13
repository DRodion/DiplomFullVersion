<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include ("$_SERVER[DOCUMENT_ROOT]/config.php");

    $link = filter_var(trim($_POST['link']),FILTER_SANITIZE_STRING);
    $education = filter_var(trim($_POST['education']),FILTER_SANITIZE_STRING);
    $group_kurs = filter_var(trim($_POST['group_kurs']),FILTER_SANITIZE_STRING);
    $number_para = filter_var(trim($_POST['number_para']),FILTER_SANITIZE_STRING);
    $date_para = filter_var(trim($_POST['date_para']),FILTER_SANITIZE_STRING);
    $id = filter_var(trim($_POST['id']),FILTER_SANITIZE_STRING);
    $datetime_now = date("Y-m-d H:i:s");

    $result = mysqli_query($conn, "SELECT * FROM discipline where name_discipline = '$education'");
    If (mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_array($result);
        $id_dis = $row['id_discipline'];
    }

    if(preg_match('/[^0-9a-z-_A-Z:\/\.]/is', $link) != 0){
        require '../libs/idna_convert.class.php';
        $IDN = new idna_convert(array('idn_version' => '2008'));
        $link = $IDN -> encode($link);
    }

    $status = get_headers($link);

    if(in_array("HTTP/1.1 200 OK", $status) or in_array("HTTP/1.0 200 OK", $status)){
        if ('join.skype.com' === parse_url($link, PHP_URL_HOST) || 'us04web.zoom.us' === parse_url($link, PHP_URL_HOST)) {
          $past = mysqli_query($conn, "SELECT * FROM  link_dis where date_para = '$date_para' AND id_professor = '$id' AND number_para = '$number_para'");
           If (mysqli_num_rows($past) > 0){
                 $row_1 = mysqli_fetch_array($past);
                 $id_link = $row_1['id_link'];
                 mysqli_query($conn, "UPDATE  link_dis SET link='$link', status = '1', datetime_para = '$datetime_now'  WHERE id_link='$id_link' ");
                echo 'yes_link';
           }else{
             mysqli_query($conn, "INSERT INTO link_dis values(NULL, '$id_dis', '$id', '$group_kurs', '$number_para', '$link','$date_para','$datetime_now', '1')");
            echo 'yes_link';
           }
        }
    }else{
      $past = mysqli_query($conn, "SELECT * FROM  link_dis where date_para = '$date_para' AND id_professor = '$id' AND number_para = '$number_para'");
           If (mysqli_num_rows($past) > 0){
                 $row_1 = mysqli_fetch_array($past);
                 $id_link = $row_1['id_link'];
                 mysqli_query($conn, "UPDATE  link_dis SET link='$link', status = '0', datetime_para = '$datetime_now' WHERE id_link='$id_link' ");
                echo 'yes_link';
           }else{
             mysqli_query($conn, "INSERT INTO link_dis values(NULL, '$id_dis', '$id', '$group_kurs', '$number_para', '$link','$date_para','$datetime_now', '0')");
             echo 'no_link';
           }
    }
}