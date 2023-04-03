<?php
    session_start();
    include 'login/db.php';
    // header("Cache-Control: no-cache, must-revalidate");
    // header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    // header("Content-Type: application/xml; charset=utf-8");
    if(empty($_COOKIE['username']))
    {
        header('location: /login');
    }
    $username = $_COOKIE['username'];
    $admins = mysqli_query($connect, "SELECT * FROM user WHERE name = '$username'");
    $admin = $admins->fetch_assoc();
    if ($admin['admin'] == 1) {
        setcookie("admin", 1, time() + 30*60*60*24, "/");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="TEAM VN98, Nhóm Dịch VN98, Dịch truyện Hệ Thống">
  <meta name="description" content="TEAM VN98 chuyên dịch thể loại truyện Hệ Thống, Tu Chân, Xuyên Không, Dị Năng, Đô Thị. Các truyện của team: Khi Bác Sĩ Mở Hack (Dịch), Ta Xây Gia Viên Trên Lưng Huyền Vũ (Dịch, Lãnh Chúa Toàn Dân: Binh Chủng Của Ta Biến Dị (Dịch), Lãnh Chúa Toàn Dân: Bắt Đầu Xây Dựng Tiên Vực Bất Hủ (Dịch), Cẩu Đạo: Lập Gia Tộc Ở Yêu Ma Giới (Dịch)">
  <meta name="author" content="VN98">
  <link rel="shortcut icon" href="./img/icon.ico">
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/docxtemplater/3.26.2/docxtemplater.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="./themify-icons/themify-icons.css">
  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
  <title>TEAM VN98</title>
</head>
<body>
  <marquee style="color:red">Chào mừng bạn đến với TEAM VN98! Chúc bạn một ngày mới vui vẻ!</marquee>
  <canvas id="canvas"></canvas>
  <div id="vn98"></div>
  <div id="toast"></div>
  <script src="script.js?v=<?php echo time(); ?>"></script>
 </div>
<script>

</script>
<!-- <script src="js/phaohoa.js"></script> -->
</body>

</html>