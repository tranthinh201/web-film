<?php
require_once('../../../config/db.php');
session_start();

if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'SELECT suat_chieu.id, ten, ngay_chieu, phong_chieu_id, TIME(gio_bat_dau), TIME(gio_ket_thuc), dinh_dang_phim_id, phim_id FROM phim, suat_chieu WHERE suat_chieu.phim_id = phim.id AND  phim_id = "' . $id . '"';
    $query = mysqli_query($connect, $sql);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../../include/libraries.php');
    ?>

    <title>Danh sách suất chiếu phim</title>
</head>

<body>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl d-flex justify-content-between" id="navbarBlur" navbar-scroll="true">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 d-flex" ">
                <li class=" breadcrumb-item text-sm"><a class="opacity-5 text-dark text-decoration-none color-background"></a>Pages</li>
                <li class="breadcrumb-item text-sm text-dark" aria-current="page">Suất chiếu</li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Danh sách suất chiếu phim</li>
            </ol>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="../suat-chieu/">Trở về</a>
        </nav>
    </nav>
    <nav class="navbar navbar-light bg-light">
        <a class="btn btn-outline-success me-2" href="./them-suat-chieu.php?id=<?= $id ?>">Thêm mới</a>
    </nav>
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
                                <thead style="text-align: center;">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-xl-center">Tên phim</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-xl-center">Giờ bắt đầu</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-xl-center">Giờ kết thúc</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-xl-center">Ngày chiếu</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-xl-center">Phòng chiếu</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7  text-xl-center">Định dạng phim</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = mysqli_fetch_array($query)) {
                                    ?>

                                        <tr style='text-align: center'>
                                            <td>
                                                <p class='text-xs text-secondary mb-0' style='white-space: normal;font-weight:bold;font-size:120px ;'><?= $row['ten'] ?></p>
                                            </td>


                                            <td>
                                                <p class='text-xs text-secondary mb-0'><?= $row['TIME(gio_bat_dau)'] ?></p>
                                            </td>
                                            <td>
                                                <p class='text-xs text-secondary mb-0'><?= $row['TIME(gio_ket_thuc)'] ?></p>
                                            </td>

                                            <td>
                                                <p class='text-xs text-secondary mb-0'><?= $row['ngay_chieu'] ?></p>
                                            </td>

                                            <td>
                                                <p class='text-xs text-secondary mb-0'><?= $row['phong_chieu_id'] ?></p>
                                            </td>

                                            <td>
                                                <p class='text-xs text-secondary mb-0'><?= $row['dinh_dang_phim_id'] ?></p>
                                            </td>
                                            <td>
                                                <a href="Javascript:void(0)" onclick="deleteId('<?= $row['id'] ?>')" style="margin-right: 40px;" class=" font-weight-bold text-xs btn btn-warning" data-toggle='tooltip' data-original-title='Edit user'>
                                                    Xoá xuất chiếu
                                                </a>
                                                <a href='./cap-nhat-suat-chieu.php?id=<?= $row['id'] ?>' style='margin-right: 40px;' class=' font-weight-bold text-xs btn btn-warning' data-toggle='tooltip' data-original-title='Edit user'>
                                                    Cập nhật xuất chiếu
                                                </a>
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
</body>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

</html>

<script type="text/javascript">
    function deleteId(id) {
        var option = confirm('Bạn có chắc chắn muốn xoá suất chiếu này không?')
        if (!option) {
            return;
        }
        $.post('./xoa-suat-chieu.php', {
            'id': id,
            'action': 'delete'
        })

    }
</script>