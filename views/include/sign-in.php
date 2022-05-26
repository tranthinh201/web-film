<?php
include('../../config/db.php');
session_start();
if (isset($_SESSION['user-client'])) {
    header('location: ../index.php');
}

if (isset($_POST['submit']) && $_POST['email'] != '' && $_POST['password'] != '') {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    require_once '../../config/sql_cn.php';
    $sql = "select * from khach_hang where email='$email' and mat_khau='$password'";
    


    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['user-client'] = $email;
        header("location:  ../index.php");
    } else {
        $_SESSION['thongbao'] = "Sai tên tài khoản hoặc mật khẩu!";
        header("location: ../login.php");
    }
    $conn->close();
} else {
    $_SESSION['thongbao'] = "Vui lòng nhập đầy đủ thông tin!";
    header("location: ./include/sign-in.php");
}

