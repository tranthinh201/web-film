<?php
session_start();

?>
<!--  //FORM NÀY ĐỂ DÀNH CHO CLIENT -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Đăng ký tài khoản
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../admin/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../admin/assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <!-- <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid ps-2 pe-0">
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navigation">
                            <ul class="navbar-nav mx-auto">

                                <li class="nav-item">
                                    <a class="nav-link me-2" href="./register.php">
                                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                        Đăng ký
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link me-2" href="./login.php">
                                        <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                        Đăng nhập
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav> -->
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-100">
                <div class="container">
                    <div class="row">
                        <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
                            <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../admin/assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
                            <div class="card card-plain">
                                <div class="card-header">
                                    <h4 class="font-weight-bolder">Đăng ký</h4>
                                    <p class="mb-0">Vui lòng nhập email và mật khẩu để đăng ký</p>
                                    <p style="color:red">
                                        <?php
                                        if (isset($_SESSION["thongbaoo"])) {
                                            echo $_SESSION["thongbaoo"];
                                            session_unset();
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="card-body">
                                    <form role="form" action="./include/sign-up.php" method="POST">
                                        <div class="input-group input-group-outline mb-3">

                                            <input type="text" name="fullname" placeholder="Họ và tên" class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="text" name="phonenumber" placeholder="Số điện thoại" class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="text" name="socmnd" placeholder="Số chứng minh" class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <textarea type="text" name="address" placeholder="Địa chỉ" class="form-control"></textarea>
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="date" name="date" class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sex" id="exampleRadios1" value="1">
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Nam
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="sex" id="exampleRadios2" value="0">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    Nữ
                                                </label>
                                            </div>
                                        </div>


                                        <div class="input-group input-group-outline mb-3">
                                            <input type="email" placeholder="Email" class="form-control" name="email">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">

                                            <input type="password" placeholder="Mật khâu" name="password" class="form-control">
                                        </div>
                                        <div class="input-group input-group-outline mb-3">
                                            <input type="password" placeholder="Nhập lại mật khẩu" name="repassword" class="form-control">
                                        </div>
                                        <div class="form-check form-check-info text-start ps-0">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Tôi đồng ý với <a href="javascript:;" class="text-dark font-weight-bolder">Các điều khoản và điều kiện</a>
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Đăng Ký</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-2 text-sm mx-auto">
                                        Bạn đã còn tài khoản?
                                        <a href="./login.php" class="text-primary text-gradient font-weight-bold">Đăng nhập</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!--   Core JS Files   -->
    <script src="../admin/assets/js/core/popper.min.js"></script>
    <script src="../admin/assets/js/core/bootstrap.min.js"></script>
    <script src="../admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>