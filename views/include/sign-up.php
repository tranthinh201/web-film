<?php
session_start();

if (isset($_POST['submit']) && $_POST['fullname'] != ''  && $_POST['email'] != '' && $_POST['password'] != '' && $_POST['repassword']) {
    $date = $_POST['date'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $fullname = $_POST['fullname'];
    $repassword = md5($_POST['repassword']);
    $so_cmnd = $_POST['socmnd'];
    $address = $_POST['address'];
    $day_register = date('Y-m-d');
    $sex = $_POST['sex'];
    if ($password != $repassword) {
        $_SESSION['thongbaoo'] = "Mật khẩu không khớp!";
        header("location:../register.php");
        die();
    }

    require_once("../../config/sql_cn.php");
    $sql = "select * from khach_hang where email='$email' AND so_dien_thoai = '$phonenumber' AND so_cmnd = '$so_cmnd' ";
    $old = mysqli_query($conn, $sql);
    if (mysqli_num_rows($old) > 0) {
        $_SESSION['thongbaoo'] = "Tài khoản đã tồn tại!";
        header("location:../register.php");
        die();
    }
    $query = "insert into khach_hang(ho_ten,so_dien_thoai, so_cmnd, ngay_sinh, gioi_tinh,email,mat_khau, ngay_dang_ky)
					values('" . $fullname . "','" . $phonenumber . "', '" . $so_cmnd . "','" . $date . "', " . $sex . ",'" . $email . "','" . $password . "','" . $day_register . "')";

    $results = mysqli_query($conn, $query);

    if ($results == true) {
        $_SESSION['thongbaoo'] = "Đăng kí thành công!";

        header('location:../register.php');
    } else {
        $_SESSION['thongbaoo'] = "Đăng kí thất bại!";
        header("location:../register.php");
    }

    $conn->close();
} else {
    $_SESSION['thongbaoo'] = "Vui lòng nhập đầy đủ thông tin!";
    header("location:../register.php");
}
