<?php
    session_start();
    include 'login/db.php';
    $username = $_COOKIE['username'];

    $rows = mysqli_query($connect, "SELECT * FROM thong_bao ORDER BY id DESC LIMIT 10");
    $so_thong_bao = mysqli_num_rows($rows);
    if ($so_thong_bao > 0) {
        echo '<img src="img/bell.webp" style="width: 24px"><span id="thong_bao_moi">'.$so_thong_bao.'</span>';
    }
?>