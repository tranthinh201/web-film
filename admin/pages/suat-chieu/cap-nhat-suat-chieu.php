<?php
require_once('../../../config/db.php');
require_once('../../../config/sql_cn.php');
session_start();
include('../../include/check-log.php');
if ($_GET['id']) {
    $id       = $_GET['id'];
    $sql = 'SELECT * FROM suat_chieu WHERE id ="' . $id . '"';
    $query_up = mysqli_query($connect, $sql);
    $item = mysqli_fetch_assoc($query_up);
}
// $gio_bat_dau = "";
// $gio_ket_thuc = "";
// $ngay_chieu = "";
// $phong_chieu = "";
// $dinh_dang_phim = "";
if (isset($_POST['submit'])) {

    $gio_bat_dau = $_POST['gio-bat-dau'];
    $gio_ket_thuc = $_POST['gio-ket-thuc'];
    $ngay_chieu = $_POST['ngay-chieu'];
    $phong_chieu = $_POST['phong-chieu'];
    $dinh_dang_phim = $_POST['dinh-dang-phim'];

    if ($_POST['gio-bat-dau']&&$_POST['gio-ket-thuc'] == "") 
    {
        $gio_bat_dau=$item['gio_bat_dau'];
        $gio_ket_thuc=$item['gio_ket_thuc'];
    }

    else
    {
        $gio_bat_dau = $_POST['gio-bat-dau'];
        $gio_ket_thuc = $_POST['gio-ket-thuc'];

;
    }
        $sql = 'UPDATE suat_chieu SET gio_bat_dau = "' . $gio_bat_dau . '", gio_ket_thuc = "' . $gio_ket_thuc . '",  ngay_chieu = "' . $ngay_chieu . '",
        phong_chieu_id = "' . $phong_chieu . '", dinh_dang_phim_id = "' . $dinh_dang_phim . '"
        where id = "' . $id . '"';
        // var_dump($sql);
        // die();

        $query=mysqli_query($connect,$sql);
        echo "<script language='javascript'>alert('Cập nhật thành công!')</script>";
        header('Location: ./danh-sach.php?id=' . $item['phim_id'] . '');
    
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
    <title>Cập nhật suất chiếu phim </title>
</head>

<body>

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl d-flex justify-content-between" id="navbarBlur" navbar-scroll="true">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 d-flex" ">
                <li class=" breadcrumb-item text-sm"><a class="opacity-5 text-dark text-decoration-none color-background"></a>Pages</li>
                <li class="breadcrumb-item text-sm text-dark" aria-current="page">Danh sách phim</li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Sửa suất chiếu</li>
            </ol>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="../suat-chieu/danh-sach.php?id=<?= $id ?>">Trở về</a>
        </nav>
    </nav>
    <div class="container-fluid py-4" style="height:85vh">
        <form method="POST" class="form-control w-50 d-flex flex-column justify-content-center m-auto" enctype="multipart/form-data">
            <div class="d-flex w-100 mb-4 justify-content-around">

                <div class="w-50">
                    <label class="form-label">Giờ bắt đầu</label>
                    <input type="datetime-local" class="form-control" name="gio-bat-dau" value="<?= date('Y-m-d\TH:i', strtotime($item['gio_bat_dau']));  ?>">
                </div>
                <div class="w-50">
                    <label class="form-label">Giờ kết thúc</label>
                    <input type="datetime-local" class="form-control" name="gio-ket-thuc" value="<?= date('Y-m-d\TH:i', strtotime($item['gio_ket_thuc'])); ?>">
                </div>
            </div>
            <div class=" d-flex w-100 mb-4 justify-content-around">
                <div class="w-50">
                    <label class="form-label">Ngày chiếu</label>
                    <input type="date" class="form-control" name="ngay-chieu" value="<?= $item['ngay_chieu'] ?>">
                </div>
                <div class=" w-50">
                    <label class="form-label">Phòng chiếu</label>
                    <select class="form-select" aria-label="Default select example" name="phong-chieu">
                        <?php
                        $select_phongchieu = "SELECT * FROM phong_chieu";
                        $query_phongchieu = mysqli_query($connect, $select_phongchieu);
                        while ($phongchieu = mysqli_fetch_assoc($query_phongchieu)) { ?>
                            <option <?php if ($phongchieu['id'] == $item['phong_chieu_id']) {
                                        echo "selected";
                                    }  ?> value="<?php echo $phongchieu['id']; ?>"><?php echo $phongchieu['id']; ?></option>
                        <?php } ?>
                        ?>
                    </select>
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-100">
                    <select class="form-select" aria-label="Default select example" name="dinh-dang-phim">
<!--                         <?php
                        $sql = "SELECT * FROM dinh_dang_phim";
                        $result = executeResult($sql);
                        foreach ($result as $rows) {
                            echo '
                                <option value="' . $rows['id'] . '">' . $rows['id'] . '</option>
                            ';
                        }
                        ?> -->

                        <?php
                        $select_dinhdang = "SELECT * FROM dinh_dang_phim";
                        $query_dinhdang = mysqli_query($connect, $select_dinhdang);
                        while ($dinhdang = mysqli_fetch_assoc($query_dinhdang)) { ?>
                            <option <?php if ($dinhdang['id'] == $item['dinh_dang_phim_id']) {
                                        echo "selected";
                                    }  ?> value="<?php echo $dinhdang['id']; ?>"><?php echo $dinhdang['id']; ?></option>
                        <?php } ?>
                        ?>

                    </select>
                </div>
            </div>
            <button name="submit" class="btn btn-primary">Cập nhật</button>
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