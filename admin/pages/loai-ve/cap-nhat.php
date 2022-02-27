<?php
require_once('../../../config/db.php');
session_start();
include('../../include/check-log.php');
$name = "";
$id = "";
if ($_GET['id']) {
    $id       = $_GET['id'];
    $sql = 'SELECT * FROM gia_ve WHERE id ="' . $id . '"';
    $query_up = mysqli_query($connect, $sql);
    $item = mysqli_fetch_assoc($query_up);
}
if (!empty($_POST)) {
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }

    if ($name != '' && $price != '') {
        $sql = 'UPDATE gia_ve SET ten = "' . $name . '", don_gia = ' . $price . ' where id = ' . $id;
        execute($sql);
        echo "<script language='javascript'>alert('Cập nhật thành công!')</script>";
        header('Location: ./index.php');
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

    <title>Cập nhật giá vé</title>
</head>

<body>
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl d-flex justify-content-between" id="navbarBlur" navbar-scroll="true">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 d-flex" ">
                <li class=" breadcrumb-item text-sm"><a class="opacity-5 text-dark text-decoration-none color-background"></a>Pages</li>
                <li class="breadcrumb-item text-sm text-dark" aria-current="page">Loại vé</li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Cập nhật giá vé</li>
            </ol>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="../loai-ve/">Trở về</a>
        </nav>
    </nav>
    <div class="container-fluid py-4" style="height:80vh">
        <form method="post" class="form-control w-25 d-flex flex-column justify-content-center m-auto">
            <div class="mb-3">
                <label class="form-label">Tên đối tượng</label>
                <input type="text" class="form-control" name="name" value="<?= $item['ten'] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Giá vé</label>
                <input type="text" class="form-control" name="price" value="<?= $item['don_gia'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
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