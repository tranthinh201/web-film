<?php
session_start();
include('../../include/check-log.php');
require_once('../../../config/db.php');

$sql_up="SELECT * FROM loai_do_an";
$query_up=mysqli_query($connect,$sql_up);

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $sale=$_POST['sale'];
    $foods=$_POST['foods'];


    $sql = "INSERT into do_an(ten,dang_ban,loai_do_an_id) values('$name',$sale, '$foods')";


    $query = mysqli_query($connect, $sql);
    if ($query==true) {
        echo "<script language='javascript'>alert('Thêm mới phim thành công!')</script>";
    }
    else
      echo "<script language='javascript'>alert('thaast bat!')</script>";
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
                <li class="breadcrumb-item text-sm text-dark" aria-current="page">Danh sách đồ ăn</li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Thêm đồ ăn</li>
            </ol>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="../do-an/">Trở về</a>
        </nav>
    </nav>
    <div class="container-fluid py-4" style="height:85vh">
        <form method="post" class="form-control w-50 d-flex flex-column justify-content-center m-auto" enctype="multipart/form-data">
            <div class="d-flex w-100 mb-4 justify-content-around">

                <div class="w-50">
                    <label class="form-label">Tên đồ ăn :</label>
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">

                <div class="w-50">
                    <label class="form-label">Đang bán :</label>
                    <input type="text" class="form-control" name="sale">
                </div>
                <div class="w-50">
                    <label class="form-label">Loại đồ ăn:</label>
                    <select class="form-select" aria-label="Default select example" name="foods">
                        <?php
                        $sql_up="SELECT * FROM loai_do_an";
                        $query_up=mysqli_query($connect,$sql_up);
                        while ($row=mysqli_fetch_array($query_up)) {
                            echo '
                                <option value="' . $row['id'] . '">' . $row['ten_loai_do_an'] . '</option>
                            ';
                        }
                        ?>
                    </select>
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