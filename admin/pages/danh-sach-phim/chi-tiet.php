<?php
require_once('../../../config/db.php');
session_start();
include('../../include/check-log.php');

$name = "";
$type = "";
$time = "";
$age = "";
$status = "";
$date = "";
$language = "";
$cast = "";
$nation = "";
$producer = "";
$synopsis = "";

if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'SELECT * FROM phim WHERE id = "' . $id . '"';
    $query = mysqli_query($connect, $sql);
    $item  = mysqli_fetch_assoc($query);
}
if (!empty($_POST)) {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $time = $_POST['time'];
    $age = $_POST['age'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    $language = $_POST['language'];
    $cast = $_POST['cast'];
    $nation = $_POST['nation'];
    $producer = $_POST['producer'];
    $synopsis = $_POST['synopsis'];
    if ($_FILES['image']['name'] == "") {
        $image = $item['hinh_anh'];
    } else {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, '../../../image/phim/' . $image);
    }
    if ($name != '') {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];

        $sql = 'UPDATE phim SET ten = "' . $name . '", thoi_luong = ' . $time . ',  gioi_han_tuoi = ' . $age . ',
        ngay_cong_chieu = "' . $date . '", ngon_ngu = "' . $language . '", dien_vien = "' . $cast . '", quoc_gia = "' . $nation . '", nha_san_xuat =  "' . $producer . '", tom_tat =  "' . $synopsis . '", trang_thai =  "' . $status . '", hinh_anh = "' . $image . '", loai_phim_id = "' . $type . '"
        where id = "' . $id . '"';

        execute($sql);
        echo "<script language='javascript'>alert('Cập nhật phim thành công!')</script>";
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

    <title>Cập nhật phim</title>
</head>

<body>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl d-flex justify-content-between" id="navbarBlur" navbar-scroll="true">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 d-flex" ">
                <li class=" breadcrumb-item text-sm"><a class="opacity-5 text-dark text-decoration-none color-background"></a>Pages</li>
                <li class="breadcrumb-item text-sm text-dark" aria-current="page">Danh sách phim</li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Cập nhật phim</li>
            </ol>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="../danh-sach-phim/">Trở về</a>
        </nav>
    </nav>
    <div class="container-fluid py-3" style="height:85vh">
        <form method="post" class="form-control w-50 d-flex flex-column justify-content-center m-auto" enctype="multipart/form-data">
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-50">
                    <label class="form-label">Tên phim</label>
                    <input type="text" class="form-control" name="name" value="<?= $item['ten'] ?>">
                </div>
                <div class="w-50">
                    <label class=" form-label">Thời lượng</label>
                    <input type="text" class="form-control" name="time" value="<?= $item['thoi_luong'] ?>">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-between">
                <div class="w-50">
                    <label class="form-label">Giới hạn độ tuổi</label>
                    <input type="text" class="form-control" name="age" value="<?= $item['gioi_han_tuoi'] ?>">
                </div>
                <div class="w-50">
                    <label class="form-label">Ngày công chiếu</label>
                    <input type="date" class="form-control" name="date" value="<?= $item['ngay_cong_chieu'] ?>">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-between">
                <div class="w-50">
                    <label class="form-label">Ngôn ngữ</label>
                    <input type="text" class="form-control" name="language" value="<?= $item['ngon_ngu'] ?>">
                </div>
                <div class="w-50">
                    <label class="form-label">Diễn viên</label>
                    <input type="text" class="form-control" name="cast" value="<?= $item['dien_vien'] ?>">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-between">
                <div class="w-50">
                    <label class="form-label">Quốc gia</label>
                    <input type="text" class="form-control" name="nation" value="<?= $item['quoc_gia'] ?>">
                </div>
                <div class="w-50">
                    <label class="form-label">Nhà sản xuất</label>
                    <input type="text" class="form-control" name="producer" value="<?= $item['nha_san_xuat'] ?>">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-between">
                <div class="w-50">
                    <label class="form-label">Tóm tắt</label>
                    <input type="text" class="form-control" name="synopsis" value="<?= $item['tom_tat'] ?>">
                </div>
                <div class="w-50">
                    <label class="form-label">Trạng thái</label>
                    <input type="text" class="form-control" name="status" value="<?= $item['trang_thai'] ?>">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-between">
                <div class="w-50">
                    <label class="form-label">Hình ảnh phim</label>
                    <input type="file" name="image" accept="image/png, image/jpeg" value="<?= $item['hinh_anh']  ?>">
                    <img style="max-height:200px" src="../../../image/phim/<?= $item['hinh_anh'] ?>">
                </div>
                <div class=" w-50">
                    <select class="form-select" aria-label="Default select example" name="type">
                        <?php
                        $sql = "SELECT * FROM loai_phim";
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
            <button type=" submit" class="btn btn-primary">Cập nhật</button>
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