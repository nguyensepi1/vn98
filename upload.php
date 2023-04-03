<?php
session_start();
include 'login/db.php';
if($_SESSION['username'])
{
    setcookie("username", $_SESSION['username'], time() + 30*60*60*24, "/"); 
}

$auth = $_COOKIE['username'];
$id_truyen = $_POST['id'];
$sortname = $_POST['sortname'];
// Create folder uploads if not exist
if (!file_exists('uploads/'.$id_truyen)) {
    mkdir('uploads/'.$id_truyen, 0777, true);
}

/* Get the name of the uploaded file */
$filename = $_FILES['file']['name'];
$filename_sql = preg_replace('/[^0-9]/', '', $filename);
$time = date("d/m/Y");
/* Choose where to save the uploaded file */
// $location = 'uploads/'.$id_truyen.'/'.$filename;
$location = 'uploads/'.$id_truyen.'/Chương '.$filename_sql.'.docx';

// //Create an object from the ZipArchive class.
// $zipArchive = new ZipArchive();
// //The full path to where we want to save the zip file.
// $zipFilePath = 'uploads/Tong_chuong.zip';
// //Call the open function.
// $status = $zipArchive->open($zipFilePath,  ZipArchive::CREATE);

// Kiểm tra file trùng
if(file_exists($location)) {
    unlink($location);
    // $zipArchive->deleteName($location);
    mysqli_query($connect, "DELETE FROM chuong WHERE filename = '$filename_sql' AND id_truyen = '$id_truyen'");
    // Update thông báo
    $content = $auth.' vừa cập nhật Chương '.$filename_sql;
    $time = date("h:i - d/m/Y");
    mysqli_query($connect, "INSERT INTO thong_bao (auth, content, time) VALUES ('$sortname', '$content', '$time')");
}

mysqli_query($connect, "INSERT INTO chuong (filename, id_truyen, auth, time) VALUES ('$filename_sql', '$id_truyen', '$auth', '$time')");
// Update thông báo
$content = $auth.' vừa đăng Chương '.$filename_sql;
$time = date("h:i - d/m/Y");
mysqli_query($connect, "INSERT INTO thong_bao (auth, content, time) VALUES ('$sortname', '$content', '$time')");

/* Save the uploaded file to the local filesystem */
if ( move_uploaded_file($_FILES['file']['tmp_name'], $location )) { 
    echo 'Thành công';
    // header('location: /');
//   //Add the file in question using the addFile function.
//   $zipArchive->addFile($location);
}
else {
    echo 'Thất bại';
}

//Finally, close the active archive.
// $zipArchive->close();
?>