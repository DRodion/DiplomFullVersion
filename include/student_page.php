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
$result_1 = mysqli_query($conn, "SELECT * FROM cus_student WHERE id_student = '$id'");
If (mysqli_num_rows($result_1) > 0){
    $row_1 = mysqli_fetch_array($result_1);
}
$id_faculty = $row_1['id_faculty'];
$facul_res = mysqli_query($conn, "SELECT * FROM faculty WHERE id_faculty = '$id_faculty'");
If (mysqli_num_rows($facul_res) > 0){
    $row_faculty = mysqli_fetch_array($facul_res);
}
$id_direction = $row_1['id_direction'];
$direc_res = mysqli_query($conn, "SELECT * FROM direction_faculty WHERE  id_direction = '$id_direction'");
If (mysqli_num_rows($direc_res) > 0){
    $row_direc = mysqli_fetch_array($direc_res);
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
        <tr><th>Направление подготовки</th><th><?php echo $row_direc['name_direction'];?></th></tr>
        <tr><th>Группа</th><th><?php echo $row_1['kurs'];?></th></tr>
    </table>
</div>