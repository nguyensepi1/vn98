<?php
include 'login/db.php';

$username = $_GET['username'];

mysqli_query($connect, "UPDATE user SET cho_duyet = 1 WHERE name = '$username'");
// Update thông báo
$content = 'Chào mừng '.$username.' đến với TEAM VN98';
$time = date("h:i - d/m/Y");
mysqli_query($connect, "INSERT INTO thong_bao (auth, content, time) VALUES ('Hệ Thống', '$content', '$time')");


?>