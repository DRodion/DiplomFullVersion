<div id="block-parameters">
    <p id="title-page" >Личные данные</p>
</div>
<?php
$id = $_SESSION['auth_customer_id'];
$result = mysqli_query($conn, "SELECT * FROM customers WHERE customer_id = '$id'");
If (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    $foto = $row['img'];
}

if  ($foto != "" && file_exists("./img/".$foto)){
    $img_path = '../img/'.$foto;
    $width = 250;
    $height = 350;
}else{
    $img_path = "../img/profile.jpg";
    $width = 250;
    $height = 350;
}
$result_1 = mysqli_query($conn, "SELECT * FROM cus_professor WHERE id_professor = '$id'");
If (mysqli_num_rows($result_1) > 0){
    $row_1 = mysqli_fetch_array($result_1);
}
$id_faculty = $row_1['id_faculty'];
$facul_res = mysqli_query($conn, "SELECT * FROM faculty WHERE id_faculty = '$id_faculty'");
If (mysqli_num_rows($facul_res) > 0){
    $row_faculty = mysqli_fetch_array($facul_res);
}
$id_department = $row_1['id_department'];
$depart_res = mysqli_query($conn, "SELECT * FROM department WHERE  id_department = '$id_department'");
If (mysqli_num_rows($depart_res) > 0){
    $row_depar = mysqli_fetch_array($depart_res);
}
$id_pos = $row_1['id_position'];
$posits = mysqli_query($conn, "SELECT * FROM position WHERE id_position = '$id_pos'");
If (mysqli_num_rows($depart_res) > 0){
    $row_pos = mysqli_fetch_array($posits);
}
echo '<div id="foto"><img src="'.$img_path.'" width="'.$width.'" height="'.$height .'"></div>';
?>

<div id="cont">
    <div id="textiBD">
        <table>
            <tr><th>ID</th><th><?php echo $row['customer_id'];?></th></tr>
            <tr><th>ФИО</th><th><?php echo $row['FIO'];?></th></tr>
            <tr><th>Дата рождения</th><th><?php echo $row['happyDate'];?></th></tr>
            <tr><th>Факультет</th><th><?php echo $row_faculty['name_faculty'];?></th></tr>
            <tr><th>Кафедра</th><th><?php echo $row_depar['name_department'];?></th></tr>
            <tr><th>Должность</th><th><?php echo $row_pos['name_position'];?></th></tr>
        </table>
    </div>
