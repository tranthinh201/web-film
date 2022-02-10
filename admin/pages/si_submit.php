<?php
session_start();
if (isset($_SESSION['user'])) {
    // code...
    header('location: ../pages/dashboard');
}

if (isset($_POST['submit']) && $_POST['username'] != '' && $_POST['password'] != '') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    require_once '../../config/sql_cn.php';
    $sql = "select * from nguoi_dung where ten_tk='$username' and mat_khau='$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {

        $_SESSION['user'] = $username;
        header("location:  ../pages/dashboard");
    } else {
        $_SESSION['thongbao'] = "Sai tên tài khoản hoặc mật khẩu!";
        header("location: ../pages/sign-in.php");
    }
    $conn->close();
} else {
    $_SESSION['thongbao'] = "Vui lòng nhập đầy đủ thông tin!";
    header("location: ../pages/sign-in.php");
}
