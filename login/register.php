<?php
include 'db.php';

$name = $_POST["name"];
$email = $_POST["email"];
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];

//kiểm tra xem 2 mật khẩu có giống nhau hay không:
if($pass1 != $pass2){
    // header("location:index.php?page=register");
    echo 'Nhập lại mật khẩu không đúng';
    setcookie("error", "Đăng ký không thành công!", time()+1, "/","", 0);
}

else{
    $pass = md5($pass1);
    mysqli_query($connect, "INSERT INTO user (name, email, password) VALUES ('$name', '$email','$pass')");

    // header("location:index.php?page=register");
    echo 'Đăng ký thành công';
    setcookie("success", "Đăng ký thành công!", time()+1, "/","", 0);
}

?>