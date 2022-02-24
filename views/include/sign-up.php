<?php
session_start();

if (isset($_POST['submit']) && $_POST['fullname'] != '' && $_POST['username'] != '' && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['repassword']) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $fullname = $_POST['fullname'];
    $repassword = $_POST['repassword'];
    if ($password != $repassword) {
        $_SESSION['thongbaoo'] = "Mật khẩu không khớp!";
        header("location:./pages/sign-up.php");
        die();
    }

    require_once("../config/sql_cn.php");
    $sql = "select * from khach_hang where email='$username'";
    $old = mysqli_query($conn, $sql);
    if (mysqli_num_rows($old) > 0) {
        $_SESSION['thongbaoo'] = "Tài khoản đã tồn tại!";
        header("location:./pages/sign-up.php");
        die();
    }
    $query = "insert into khach_hang(ho_ten,ten_tk,email,mat_khau)
					values('" . $fullname . "','" . $username . "','" . $email . "','" . $password . "')";
    //mysqli_query($conn, $query);
    var_dump($query);
    die();
    $_SESSION['thongbaoo'] = "Đăng kí' thành công!";
    header('location:./pages/sign-in.php');
    echo ("da dang ky thanh cong!");

    $conn->close();
    header("location:./pages/sign-in.php");
} else {
    $_SESSION['thongbaoo'] = "Vui lòng nhập đầy đủ thông tin!";
    header("location:./pages/sign-up.php");
}
