<?php
    session_start();
    include('../../config/db.php');
    include('../../config/sql_cn.php');
    $id = $_GET['id'];
    $sql = 'UPDATE ve_ban SET da_huy = 1 WHERE ve_ban.id = "'.$id.'"';
   
    $query = mysqli_query($connect, $sql);

    header('location: ../my-account.php');
            if (!isset($_SESSION['user-client'])) {
        // code...
        header('location:../login.php');
    }

?>