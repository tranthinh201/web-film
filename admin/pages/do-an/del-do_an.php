<?php
    session_start();
    require_once '../../../config/db.php';
    require_once('../../../config/sql_cn.php');
    $id = $_GET['id'];
    $sql = 'DELETE FROM do_an WHERE id ="' . $id . '"';
    $query = mysqli_query($connect, $sql);

    header('location:index.php');
            if (!isset($_SESSION['user'])) {
        // code...
        header('location:../login.php');
    }

?>