<?php
session_start();
include 'db.php';

$tk = $_POST["email_dn"];
$mk = md5($_POST["password_dn"]);
$rows = mysqli_query($connect, "SELECT * FROM user WHERE email = '$tk' AND password = '$mk'");
$count = mysqli_num_rows($rows);

// Storing google recaptcha response
// in $recaptcha variable
$recaptcha = $_POST['g-recaptcha-response'];

// Put secret key here, which we get
// from google console
$secret_key = '6Lf03gUjAAAAAFDHSsFrALltCyEa-hxkYPZOVE5n';

// Hitting request to the URL, Google will
// respond with success or error scenario
$url = 'https://www.google.com/recaptcha/api/siteverify?secret='
        . $secret_key . '&response=' . $recaptcha;

// Making request to verify captcha
$response = file_get_contents($url);

// Response return by google is in
// JSON format, so we have to parse
// that json
$response = json_decode($response);

// Checking, if response is true or not
if ($response->success == true) {
    if($count==1){
        $row = $rows->fetch_assoc();
        if ($row['cho_duyet'] == 1) {
            $_SESSION["username"] = $row['name'];
            setcookie("username", $row['name'], time() + 30*60*60*24, "/");
            header('location: /');
        } else {
            $_SESSION["cho_duyet"] = 'Tài khoản này chưa được duyệt, vui lòng liên hệ ADMIN nhé!';
            header('location: /login');
        }
    }
    else{
        header('location: /login');
    }
} else {
    header('location: /login');
    
}




?>

