<?php
    session_start();
    require_once('../../../config/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../../include/libraries.php');
    ?>
    <title>Người dùng</title>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <?php
    include('../../include/sidebar.php');
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" style="width: 200px;">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Danh sách người dùng</li>
                    </ol>
                </nav>
                <?php
                include('../../include/header.php');
                ?>
            </div>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="add-user.php">Thêm mới</a>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Danh sách người dùng</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 table-hover table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Họ tên</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên tài khoản</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày vào làm</th>

                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vai trò</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * from nguoi_dung";
                                        $result = mysqli_query($connect,$sql);
                                        while ($row=mysqli_fetch_array($result)) 
                                            { ?>
        
                                            <tr style="text-align: center">
                                            <th>
                                                <p class="text-xs text-secondary mb-0" ><?= $row['ho_ten'] ?></p>
                                            </th>
                                            <th>
                                                <p class="text-xs text-secondary mb-0" "><?= $row['ten_tk'] ?></p>
                                            </th>
                                            <th>
                                                <p class="text-xs text-secondary mb-0" ><?= $row['email'] ?></p>
                                            </th>
                                            <th>
                                                <p class="text-xs text-secondary mb-0" ><?= $row['ngay_vao_lam'] ?></p>
                                            </th>

                                            <th>
                                                <p class="text-xs text-secondary mb-0" ><?= $row['vai_tro_id'] ?></p>
                                            </th>
                                            
                                            
                                            <th class="align-middle">
                                                <a href="./edit-user.php?id=<?= $row['id'] ?>" style="margin-right: 40px;" class=" font-weight-bold text-xs btn btn-warning" data-toggle="tooltip" data-original-title="Edit user">
                                                    <i class="far fa-edit"></i> Sửa
                                                </a>
                                                <a onclick="return Del('<?=$row['ten_tk']?>')" class="btn btn-danger" href="del-user.php?id=<?php echo $row['id']; ?>"> <i class='fas fa-trash'></i> Xóa</a>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        include('../../include/footer.php')
        ?>
    </main>
   
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
<script>
        function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa: " + name + " ?");
    }
</script>

</html>