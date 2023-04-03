<?php
session_start();
include 'login/db.php';

if($_SESSION['username'])
{
    echo '<script>  
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }</script>';
    echo '<script>setCookie("username", "'.$_SESSION['username'].'", 30); </script>';
}

$id_truyen = $_POST['id'];

/* Get the name of the uploaded file */
$filename_sql = $_POST['filename'];
$filename = 'Chương '.$filename_sql.'.docx';
$time = date("d/m/Y");
$sortname = $_POST['sortname'];
/* Choose where to save the uploaded file */
$location = 'uploads/'.$id_truyen.'/'.$filename;
echo $location;

// //Create an object from the ZipArchive class.
// $zipArchive = new ZipArchive();
// //The full path to where we want to save the zip file.
// $zipFilePath = 'uploads/Tong_chuong.zip';
// //Call the open function.
// $status = $zipArchive->open($zipFilePath,  ZipArchive::CREATE);

// Xóa file
if($_POST['action'] = 'delete') {
    unlink($location);
    // $zipArchive->deleteName($location);
    mysqli_query($connect, "DELETE FROM chuong WHERE filename = '$filename_sql' AND id_truyen = '$id_truyen'");
    // Update thông báo
    $content = $_COOKIE['username'].' vừa xóa Chương '.$filename_sql;
    $time = date("h:i - d/m/Y");
    mysqli_query($connect, "INSERT INTO thong_bao (auth, content, time) VALUES ('$sortname', '$content', '$time')");
}

//Finally, close the active archive.
// $zipArchive->close();

?>