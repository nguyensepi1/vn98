<?php
include 'login/db.php';

$username = $_GET['username'];

mysqli_query($connect, "DELETE FROM user WHERE name = '$username'");

?>