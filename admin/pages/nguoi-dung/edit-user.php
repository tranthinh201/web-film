<?php
session_start();
require_once('../../../config/db.php');
    $id=$_GET['id'];

    $sql_au="SELECT * FROM vai_tro";
   
    $query_au =mysqli_query($connect,$sql_au);

    $sql_up='SELECT * FROM nguoi_dung WHERE id ="'.$id.'"';

    $query_up=mysqli_query($connect,$sql_up);
    $row_up=mysqli_fetch_array($query_up);

	if(isset($_POST['submit']))
	{
		$fullname=$_POST['fullname'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
        $date=$_POST['date'];
		$role=$_POST['role'];

		$sql= 'update nguoi_dung set ho_ten="'.$fullname.'",ten_tk="'.$username.'",email="'.$email.'",mat_khau="'.$password.'",ngay_vao_lam="'.$date.'",vai_tro_id="'.$role.'" where id = "' . $id . '"';


		$query=mysqli_query($connect,$sql);
		// var_dump($query);
  //       die();
		// echo "<script language='javascript'>alert('Thêm mới phim thành công!')</script>";
		header('location:index.php');
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
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5 d-flex" >
                <li class=" breadcrumb-item text-sm"><a class="opacity-5 text-dark text-decoration-none color-background"></a>Pages</li>
                <li class="breadcrumb-item text-sm text-dark" aria-current="page">Danh sách người dùng</li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Thêm người dùng</li>
            </ol>
        </nav>
        <nav class="navbar navbar-light bg-light">
            <a class="btn btn-outline-success me-2" href="../nguoi-dung/">Trở về</a>
        </nav>
    </nav>
    <div class="container-fluid py-4" style="height:85vh">
        <form method="post" class="form-control w-50 d-flex flex-column justify-content-center m-auto" enctype="multipart/form-data">
            <div class="d-flex w-100 mb-4 justify-content-around">

                <div class="w-50">
                    <label class="form-label">Họ và tên:</label>
                    <input type="text" class="form-control" name="fullname" value="<?= $row_up['ho_ten'];?>" disable>
                </div>
                <div class="w-50">
                    <label class="form-label">Tên tài khoản:</label>
                    <input type="text" class="form-control" name="username" value="<?= $row_up['ten_tk'];?>">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-50">
                    <label class="form-label">Mật khẩu:</label>
                    <input type="text" class="form-control" name="password" value="<?= $row_up['mat_khau'];?>">
                </div>
                <div class="w-50">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" value="<?= $row_up['email'];?>">
                </div>
            </div>
            <div class="d-flex w-100 mb-4 justify-content-around">
                <div class="w-50">
                    <label class="form-label">Ngay vao lam:</label>
                    <input type="date" class="form-control" name="date" value="<?= $row_up['ngay_vao_lam'];?>">
                </div>
                <div class="w-50">
                    <label for="">Vai tro:</label>
                    <select class="form-select" aria-label="Default select example" name="role" >
                        <?php
                            while ($row_au = mysqli_fetch_assoc($query_au)) {?>
                                <option <?php if($row_au['id'] == $row_up['vai_tro_id']){ echo "selected"; }  ?> value="<?php echo $row_au['id']; ?>"><?php echo $row_au['ten']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <?php 
                if ($row_up['vai_tro_id'] == 'QL') {
                    // code...
                    echo ' <button type="submit" class="btn btn-primary" name="submit">Chỉnh sửa</button>';
                }
                else
                {
                    echo "bạn không đc phép truy cập";
                }
            ?>

           
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