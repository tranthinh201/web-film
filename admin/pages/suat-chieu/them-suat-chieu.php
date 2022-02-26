<?php
require_once('../../../config/db.php');
require_once('../../../config/sql_cn.php');
if ($_GET['id']) {
    $id       = $_GET['id'];
    $sql = 'SELECT * FROM phim WHERE id ="PH0001"';
    $query_up = mysqli_query($connect, $sql);
    $row_up = mysqli_fetch_assoc($query_up);
}
$gio_bat_dau = "";
$gio_ket_thuc = "";
$ngay_chieu = "";
$phong_chieu = "";
$dinh_dang_phim = "";
if (!empty($_POST)) {
    $gio_bat_dau = $_POST['gio-bat-dau'];
    $gio_ket_thuc = $_POST['gio-ket-thuc'];
    $ngay_chieu = $_POST['ngay-chieu'];
    $phong_chieu = $_POST['phong-chieu'];
    $dinh_dang_phim = $_POST['dinh-dang-phim'];

    if ($ngay_chieu != '') {
        $sql = 'INSERT INTO suat_chieu(gio_bat_dau, gio_ket_thuc, ngay_chieu, phong_chieu_id, dinh_dang_phim_id, phim_id) 
        values ("' . $gio_bat_dau . '", "' . $gio_ket_thuc . '", "' . $ngay_chieu . '", "' . $phong_chieu . '", "' . $dinh_dang_phim . '", "' . $id . '")';
        // var_dump($sql);
        // die();
        execute($sql);
        echo "<script language='javascript'>alert('Thêm mới phim thành công!')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Thêm suất chiếu phim </title>
</head>

<body>

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl d-flex justify-content-between" id="navbarBlur" navbar-scroll="true">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 d-flex" ">
                <li class=" breadcrumb-item text-sm"><a class="opacity-5 text-dark text-decoration-none color-background"></a>Pages</li>
                <li class="breadcrumb-item text-sm text-dark" aria-current="page">Danh sách phim</li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Thêm phim mới</li>
            </ol>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="../suat-chieu/danh-sach.php">Trở về</a>
        </nav>
    </nav>
    <div class="container-fluid py-4" style="height:85vh">
        <form method="post" class="form-control w-50 d-flex flex-column justify-content-center m-auto" enctype="multipart/form-data">
            <div class="d-flex w-100 mb-4 justify-content-around">

                <div class="w-50">
                    <label class="form-label">Giờ bắt đầu</label>
                    <input type="datetime-local" class="form-control" name="gio-bat-dau">
                </div>
                <div class="w-50">
                    <label class="form-label">Giờ kết thúc</label>
                    <input type="datetime-local" class="form-control" name="gio-ket-thuc">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-50">
                    <label class="form-label">Ngày chiếu</label>
                    <input type="date" class="form-control" name="ngay-chieu">
                </div>
                <div class="w-50">
                    <label class="form-label">Phòng chiếu</label>
                    <select class="form-select" aria-label="Default select example" name="phong-chieu">
                        <?php
                        $sql = "SELECT * FROM phong_chieu";
                        $result = executeResult($sql);
                        foreach ($result as $rows) {
                            echo '
                                <option value="' . $rows['id'] . '">' . $rows['id'] . '</option>
                            ';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-100">
                    <select class="form-select" aria-label="Default select example" name="dinh-dang-phim">
                        <?php
                        $sql = "SELECT * FROM dinh_dang_phim";
                        $result = executeResult($sql);
                        foreach ($result as $rows) {
                            echo '
                                <option value="' . $rows['id'] . '">' . $rows['ten'] . '</option>
                            ';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Thêm mới</button>
        </form>
    </div>
    <?php
    include('../../include/footer.php');
    ?>
</body>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

</html>