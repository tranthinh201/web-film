<?php
require_once('../../../config/sql_cn.php');
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
$trailer = "";
if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'SELECT * FROM phim WHERE id = "' . $id . '"';
    $query = mysqli_query($connect, $sql);
    $item  = mysqli_fetch_assoc($query);
    $select_theloai = "SELECT * FROM loai_phim";
    $query_theloai = mysqli_query($connect, $select_theloai);
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
    $trailer = $_POST['trailer'];
    $synopsis = str_replace('"', '\\"', $synopsis);
    if ($_FILES['image']['name'] == "") {
        $image = $item['hinh_anh'];
    } else {
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, '../../../image/phim/' . $image);
    }
    if ($name != '') {
        $sql = 'UPDATE phim SET ten = "' . $name . '", thoi_luong = ' . $time . ',  gioi_han_tuoi = ' . $age . ',
        ngay_cong_chieu = "' . $date . '", ngon_ngu = "' . $language . '", dien_vien = "' . $cast . '", quoc_gia = "' . $nation . '", nha_san_xuat =  "' . $producer . '", tom_tat =  "' . $synopsis . '", trang_thai =  "' . $status . '", hinh_anh = "' . $image . '", loai_phim_id = "' . $type . '", trailer = "'.$trailer.'"
        where id = "' . $id . '"';
        $result = mysqli_query($conn, $sql);
        if ($result == true) {
            echo "<script language='javascript'>alert('Cập nhật phim thành công!')</script>";
        } else {
            echo "<script language='javascript'>alert('Cập nhật phim thất bại!')</script>";
        }
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
    <div class="container-fluid " style="height:85vh">
        <form method="post" class="form-control w-95 d-flex flex-column justify-content-center m-auto" enctype="multipart/form-data">
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-25">
                    <label class="form-label">Tên phim</label>
                    <input type="text" class="form-control checked" name="name" value="<?= $item['ten'] ?>" disabled>
                </div>
                <div class="w-25">
                    <label class=" form-label">Thời lượng</label>
                    <input type="text" class="form-control checked" name="time" value="<?= $item['thoi_luong'] ?>" disabled>
                </div>
                <div class="w-25">
                    <label class="form-label">Giới hạn độ tuổi</label>
                    <input type="text" class="form-control checked" name="age" value="<?= $item['gioi_han_tuoi'] ?>" disabled>
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-25">
                    <label class="form-label">Ngày công chiếu</label>
                    <input type="date" class="form-control checked" name="date" value="<?= $item['ngay_cong_chieu'] ?>" disabled>
                </div>
                <div class="w-25">
                    <label class="form-label">Ngôn ngữ</label>
                    <input type="text" class="form-control checked" name="language" value="<?= $item['ngon_ngu'] ?>" disabled>
                </div>
                <div class="w-25">
                    <label class="form-label">Diễn viên</label>
                    <input type="text" class="form-control checked" name="cast" value="<?= $item['dien_vien'] ?>" disabled>
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-25">
                    <label class="form-label">Quốc gia</label>
                    <input type="text" class="form-control checked" name="nation" value="<?= $item['quoc_gia'] ?>" disabled>
                </div>
                <div class="w-25">
                    <label class="form-label">Nhà sản xuất</label>
                    <input type="text" class="form-control checked" name="producer" value="<?= $item['nha_san_xuat'] ?>" disabled>
                </div>
                <div class="w-25">
                    <label class="form-label">Trạng thái</label>
                    <input type="text" class="form-control checked" name="status" value="<?= $item['trang_thai'] ?>" disabled>
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-25">
                    <label class="form-label">Tóm tắt</label>
                    <textarea class="form-control checked" rows="8" name="synopsis" name="synopsis" disabled><?= $item['tom_tat'] ?></textarea>
                </div>
                <div class=" w-25">
                    <label class="form-label">Hình ảnh phim</label>
                    <input type="file" class="checked" name="image" accept="image/png, image/jpeg" value="<?= $item['hinh_anh']  ?>" disabled>
                    <img style="max-height:200px" src="../../../image/phim/<?= $item['hinh_anh'] ?>">
                </div>
                <div class=" w-25">
                    <label class="form-label">Thể loại</label>
                    <select class="form-select checked" aria-label="Default select example" name="type" disabled>
                        <?php
                        while ($row_theloai = mysqli_fetch_assoc($query_theloai)) { ?>
                            <option <?php if ($row_theloai['id'] == $item['loai_phim_id']) {
                                        echo "selected";
                                    }  ?> value="<?php echo $row_theloai['id']; ?>"><?php echo $row_theloai['ten_loai']; ?></option>
                        <?php } ?>

                    </select>
                    <div class="w-100">
                        <label class="form-label">Trailer</label>
                        <input type="text" name="trailer" value="<?= $item['trailer'] ?>" class="form-control checked" disabled>
                        <video src="<?= $item['trailer'] ?>" width="300px"></video>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <span onclick="removeDisabled()" class="btn btn-warning w-25">Chỉnh sửa</span>
                <button type="submit" class="btn btn-primary w-25 checked" disabled>Cập nhật</button>
            </div>
            <!-- <p onclick="removeDisabled()">hehe</p> -->
        </form>
    </div>
    <?php
    // include('../../include/footer.php');
    ?>
</body>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

</html>

<script>
    var checked = document.querySelectorAll('.checked');

    function removeDisabled() {
        for (let i = 0; i < checked.length; i++) {
            checked[i].disabled = false;
            console.log(checked[i]);
        }
    }
</script>