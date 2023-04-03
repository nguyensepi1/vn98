<?php
    session_start();
    include 'login/db.php';
    $username = $_COOKIE['username'];
    $so_thong_bao = $_GET['so_thong_bao'];
    $rows = mysqli_query($connect, "SELECT * FROM thong_bao ORDER BY id DESC LIMIT $so_thong_bao");
    $so_thong_bao = mysqli_num_rows($rows);
    $admins = mysqli_query($connect, "SELECT * FROM user WHERE name = '$username'");
    $admin = $admins->fetch_assoc();

    while ($row = $rows->fetch_assoc()) {
        echo '<div class="chaps" style="font-size: 14px"><font style="font-weight: 600">'.$row['auth'].':</font> '.$row['content'].' <br/><i>Vào lúc '.$row['time'].'</i></div>';
    };
    echo '<div class="chaps" onclick="thong_bao('.($so_thong_bao + 10).')" style="font-size: 14px"><font style="font-weight: 600">Xem thêm...</div>';
?>