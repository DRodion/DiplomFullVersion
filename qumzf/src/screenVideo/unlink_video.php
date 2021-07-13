<?php
session_start();
require '../../../config.php';
$base_dir = realpath($_SERVER["DOCUMENT_ROOT"]);
$name_video = $_GET['nam_vid'];
$file_delete = "B:\OSPanel\OpenServer\domains\localhost\qumzf\src\screenVideo\\$name_video";
$id = $_SESSION['id_dl_video'];
if (is_file($file_delete)) {

    chmod($file_delete, 0777);
    if (unlink($file_delete)) {
        mysqli_query($conn, "UPDATE screenvideo SET status=0 WHERE name_video = '$name_video'");
        header('Location: http://localhost/admin/view_video.php?id='.$id.'');
        //echo '<script type="text/javascript">document.location.href="../../../admin/dis_video.php"</script>';
    }
}
