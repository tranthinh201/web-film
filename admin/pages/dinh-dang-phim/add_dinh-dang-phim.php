<?php
session_start();
include('../../include/check-log.php');
require_once('../../../config/db.php');

if (isset($_POST['submit'])) {
    $name = $_POST['tendd'];
    $fee = $_POST['fee'];
    $iddd=$_POST['iddd'];


    $sql = "INSERT into dinh_dang_phim(id,ten,phu_thu ) values('$iddd','$name', $fee)";


    $query = mysqli_query($connect, $sql);

    echo "<script language='javascript'>alert('Thêm mới phim thành công!')</script>";
    // header('location:index.php');
}
// else
// {
// 	echo "<script language='javascript'>alert('moi nhap day du')</script>";
// 	header("location:add-user.php");
// }

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

</head>

<body>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl d-flex justify-content-between" id="navbarBlur" navbar-scroll="true">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 d-flex">
                <li class=" breadcrumb-item text-sm"><a class="opacity-5 text-dark text-decoration-none color-background"></a>Pages</li>
                <li class="breadcrumb-item text-sm text-dark" aria-current="page">Danh sách dinh dang phim</li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Thêm dinh dang phim</li>
            </ol>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="../dinh-dang-phim/">Trở về</a>
        </nav>
    </nav>
    <div class="container-fluid py-4" style="height:85vh">
        <form method="post" class="form-control w-50 d-flex flex-column justify-content-center m-auto" enctype="multipart/form-data">
            <div class="d-flex w-100 mb-4 justify-content-around">

                <div class="w-50">
                    <label class="form-label">Mã định dạng :</label>
                    <input type="text" class="form-control" name="iddd">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">

                <div class="w-50">
                    <label class="form-label">Tên định dạng :</label>
                    <input type="text" class="form-control" name="tendd">
                </div>
                <div class="w-50">
                    <label class="form-label">Phụ thu:</label>
                    <input type="number" class="form-control" name="fee">
                </div>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
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