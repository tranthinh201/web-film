<?php
require_once('../../../config/db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include('../../include/libraries.php'); 
  ?>
  <title>the loai phim</title>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <?php
    include('../../include/sidebar.php');
    ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" style="width: 200px;">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Thể loại phim</li>
                </ol>
            </nav>
            <?php
            include('../../include/header.php')
            ?>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="./them-the-loai.php">Thêm mới</a>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Thể loại phim</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0 table-hover table-bordered">
                                    <thead>

                                        <tr style="text-align: center">
                                            <th>stt</th>
                                            <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Tên thể loại phim</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql="SELECT * FROM loai_phim";
                                        $query=mysqli_query($connect,$sql);
                                        $no = 1;
                                        while ($row = mysqli_fetch_assoc($query)) {?>
                                            <tr>
                                                <td><?php echo $no++; ?></th>
                                                <td><?php echo $row['ten']; ?></td>
                                                <td>
                                                    <a class="btn btn-warning" style='margin-right: 40px;' href="cap-nhat.php?id=<?php echo $row['id']; ?>"> <i class="far fa-edit"></i> Sửa </a>

                                                    <a onclick="return Del('<?=$row['ten']?>')" class="btn btn-danger" href="xoa.php?id=<?php echo $row['id']; ?>"> <i class='fas fa-trash'></i> Xóa</a>
                                                </td>
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
        include('../../include/footer.php');

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

</html>

<script type="text/javascript">
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa: " + name + " ?");
    }
</script>