<?php
    session_start();
    include 'login/db.php';
    $name = $_SESSION['username'];
    $id_truyen = $_GET['id'];
    $so_chuong = $_GET['so_chuong'];
    $rows = mysqli_query($connect, "SELECT * FROM chuong WHERE id_truyen = '$id_truyen' ORDER BY filename DESC LIMIT $so_chuong");
    if ($_COOKIE['admin'] == 1) {
        while ($row = $rows->fetch_assoc()) {
            echo '<div class="chaps">
                    <a href="/uploads/'.$id_truyen.'/Chương '.$row['filename'].'.docx?v='.time().'">
                        <img width="20px" src="img/word.webp" loading="lazy">
                        Chương '.$row['filename'].'
                    </a>
                    <span style="float: right;font-size: 12px">
                        <img width="16px" src="img/time.webp" loading="lazy">'.$row['time'].' 
                        <a style="margin-left: 8px; cursor:pointer" onclick="openFile('.$row['filename'].')">
                            <img width="20px" src="img/edit.webp" loading="lazy">
                        </a> 
                        <a style="margin-left: 8px; cursor:pointer" onclick="deleteFile('.$row['filename'].')">
                            <img width="20px" src="img/delete.webp" loading="lazy">
                        </a>
                    </span>
                </div>';
        };
    } else {
        while ($row = $rows->fetch_assoc()) {
            echo '<div class="chaps"><img width="20px" src="img/word.webp" loading="lazy">Chương '.$row['filename'].'<span style="float: right;font-size: 12px"><img width="16px" src="img/time.webp" loading="lazy">'.$row['time'].'</span></div>';
        };
    }
    
?>