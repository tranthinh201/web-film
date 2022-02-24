<?php
require_once('../../../config/db.php');
session_start();
// $sql      = 'SELECT * FROM phim';
// $query = mysqli_query($connect, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../../include/libraries.php');
  ?>
  <title>Danh sách phim</title>
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
          <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Danh sách phim</li>
        </ol>
      </nav>
      <?php
      include('../../include/header.php')
      ?>
    </nav>
    <nav class="navbar navbar-light bg-light">
      <a class="btn btn-outline-success me-2" href="./them-phim.php">Thêm mới</a>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Danh sách phim</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0  table-hover table-bordered">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên phim</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Hình ảnh</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Độ tuổi</th> -->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày chiếu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngôn ngữ</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Diễn viên</th> -->
                      <!--  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quốc gia</th> -->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NSX</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hình ảnh</th> -->
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Loại phim</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">loai phim id</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $item_per_page=!empty($_GET['per_page'])?$_GET['per_page']:5;
                      $current_page=!empty($_GET['page'])?$_GET['page']:1;
                      $offset=($current_page-1)*$item_per_page;
                    
                      $totalRecords=mysqli_query($connect,"select * from phim");
                      $totalRecords=$totalRecords->num_rows;
                      $totalPages=ceil($totalRecords / $item_per_page);
                      $film=mysqli_query($connect,"select * from phim order by id DESC limit ".$item_per_page." offset  ".$offset."");
                      $no=1;
                      while ($row=mysqli_fetch_array($film)){
                    ?>

                      <tr style='text-align: center'>
                        <td>
                          <p class='text-xs text-secondary mb-0' style='white-space: normal;font-weight:bold;font-size:120px ;'><?= ++$offset; ?></p>
                        </td>
                        <td>
                          <p class='text-xs text-secondary mb-0' style='white-space: normal;font-weight:bold;font-size:120px ;'><?= $row['ten'] ?></p>
                        </td>
                        <td>
                          <img style="max-height:130px" src="../../../image/phim/<?= $row['hinh_anh'] ?>">
                        </td>

                        <td>
                          <p class='text-xs text-secondary mb-0' style='width:100px;
                        white-space: normal;'><?= $row['ngay_cong_chieu'] ?></p>
                        </td>
                        <td>
                          <p class='text-xs text-secondary mb-0' style='width:100px;
                        white-space: normal;'><?= $row['ngon_ngu'] ?></p>
                        </td>

                        <td>
                          <p class='text-xs text-secondary mb-0' style='width:100px;
                        white-space: normal;'><?= $row['nha_san_xuat'] ?></p>
                        </td>

                        <td>
                          <p class='text-xs text-secondary mb-0' style='width:100px;
                        white-space: normal;'><?= $row['trang_thai'] ?></p>
                        </td>

                        <td>
                          <p class='text-xs text-secondary mb-0' style='width:100px;
                        white-space: normal;'><?= $row['loai_phim_id'] ?></p>
                        </td>
                        <td>
                          <a href='./cap-nhat.php?id=<?= $row['id'] ?>' style='margin-right: 40px;' class=' font-weight-bold text-xs btn btn-warning' data-toggle='tooltip' data-original-title='Edit user'>
                            Xem chi tiết
                          </a>
                          <button onclick='deleteId("<?= $row['id'] ?>")' class=' font-weight-bold text-xs btn btn-danger' data-toggle='tooltip'>
                            <i class='fas fa-trash'></i> delete
                          </button>

                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end" style="margin:20px 0">      
                <?php
                  include '../../../config/pagination.php'; 
                ?>
                </ul> 
            </nav>
          </div>
        </div>
      </div>
    </div>
    <?php
    include('../../include/footer.php')
    ?>

  </main>

  <!--   Core JS Files   -->

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
  function deleteId(id) {
    var option = confirm('Bạn có chắc chắn muốn xoá phim này không?')
    if (!option) {
      return;
    }
    $.post('./xoa.php', {
      'id': id,
      'action': 'delete'
    }, function(data) {
      location.reload()
    })
  }
</script>