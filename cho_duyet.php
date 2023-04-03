<?php
    session_start();
    include 'login/db.php';
    $name = $_COOKIE['username'];
    $id_truyen = $_GET['id'];
    $rows = mysqli_query($connect, "SELECT * FROM user WHERE cho_duyet = 0 ORDER BY id DESC LIMIT 10");
    $admins = mysqli_query($connect, "SELECT * FROM user WHERE name = '$name'");
    $admin = $admins->fetch_assoc();

    if ($admin['admin'] == 1) {
        while ($row = $rows->fetch_assoc()) {
            echo '<div class="chaps">
                    <span>'.$row['name'].'</span>
                    <span style="float: right;font-size: 12px">
                        <a style="margin-left: 8px; cursor:pointer" onclick="chap_nhan(this.parentElement.parentElement.children[0].innerText)">
                            <img width="20px" src="img/check.webp" loading="lazy">
                        </a> 
                        <a style="margin-left: 8px; cursor:pointer" onclick="tu_choi(this.parentElement.parentElement.children[0].innerText)">
                            <img width="20px" src="img/delete.webp" loading="lazy">
                        </a>
                    </span>
                </div>';
        };
    } 
    
?>


<script>


</script>