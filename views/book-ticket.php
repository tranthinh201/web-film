<?php include('../config/db.php');
session_start();

if (!isset($_SESSION['user-client'])) {
    echo '<script>confirm("Xin mời bạn đăng nhập")</script>';
    header("Location: ./login.php");
}

if (isset($_GET['suat_chieu'])) {
    $id       = $_GET['suat_chieu'];
    $nsql      = 'SELECT suat_chieu.phong_chieu_id, suat_chieu.ngay_chieu, 
                        suat_chieu.dinh_dang_phim_id, phim.ngon_ngu, phim.ten, phim.thoi_luong, 
                        phim.gioi_han_tuoi, phim.hinh_anh, loai_phim.ten_loai, TIME(gio_ket_thuc), TIME(gio_bat_dau)
                    FROM loai_phim, suat_chieu, phim 
                    WHERE phim.loai_phim_id = loai_phim.id AND suat_chieu.phim_id = phim.id and suat_chieu.id = "' . $id . '"';
   

    $query = mysqli_query($connect, $nsql);
    $item  = mysqli_fetch_assoc($query);
   

    $data = "SELECT ghe_ngoi.id, ve_ban.suat_chieu_id, ghe_ngoi.vi_tri_day, ghe_ngoi.vi_tri_cot, loai_ghe.phu_thu
                FROM ghe_ngoi
                LEFT JOIN ve_ban
                ON ghe_ngoi.id = ve_ban.ghe_id AND  ve_ban.suat_chieu_id = '$id'
                LEFT JOIN suat_chieu
                ON suat_chieu.id = ve_ban.suat_chieu_id 
                LEFT JOIN phong_chieu
                ON phong_chieu.id = ghe_ngoi.phong_chieu_id
                LEFT JOIN loai_ghe 
                ON loai_ghe.id = ghe_ngoi.loai_ghe_id
                WHERE phong_chieu.id = ".$item['phong_chieu_id']."
                ORDER BY ghe_ngoi.id ASC";

    $rowData = "SELECT DISTINCT ghe_ngoi.vi_tri_day
                  FROM ghe_ngoi
                  WHERE ghe_ngoi.phong_chieu_id = ".$item['phong_chieu_id']."";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<<<<<<< HEAD
    <title>chọn chỗ ngồi</title>
=======
>>>>>>> 796e2e3064d635e6be8bf45471668e9b8e21ac9b
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="../animate.css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome iconic font -->
    <link href="../fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link href="../magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slick carousel -->
    <link href="../css/slick/slick.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Theme styles -->
    <link href="../css/dot-icons.css" rel="stylesheet" type="text/css">
    <link href="../css/theme.css" rel="stylesheet" type="text/css">
    <link href="../css/booking.css" rel='stylesheet' type='text/css'>
    <title>Đặt vé phim <?= $item['ten'] ?></title>
</head>

<body>
    <?php include('./include/header.php'); ?>
    <section class="after-head d-flex section-text-white position-relative">
        <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
        <div class="d-background bg-black-80"></div>
        <div class="top-block top-inner container">
            <div class="top-block-content">
                <h1 class="section-title">Đặt vé</h1>
                <div class="page-breadcrumbs">
                    <a class="content-link" href="./index.php">Trang chủ</a>
                    <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                    <a class="content-link" href="./dat-ve.php?id=<?= $id; ?>"><?= $item['ten'] ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="after-head d-flex section-text-white position-relative" style="background-color: #f9f6ec;">
        <div class="container">
            <div class="header-book-seat">
                <h2>Chọn ghế</h2>
                <ul class="book-seat-right">
                    <li>
                      <a href="javascript:void(0)">
                      <i class="fas fa-dollar-sign"></i>
                        Chọn loại vé
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0)">
                        <i class="fas fa-redo"></i>
                        Đặt lại
                      </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="screen">
            <img src="../image/banner/bg_screen.gif" class="img-banner-screen" alt="banner">
            <strong class="text-screen">
                Screen
            </strong>
        </div>
<!-- ------------------------LIST SEAT------------------------------ -->
        <div class="input-box-wrapper">
          <div class="list-row-seat">
            <?php
              $resultDataRow = executeResult($rowData);
              foreach($resultDataRow as $row) {
                echo '
                <div class="box">
                  <label class="name-row">
                      '.$row['vi_tri_day'].'
                  </label>
                </div>
                ';
              }
            ?>
          </div>
          <div class="list-seat-choose">
            <div class="<?= $item['phong_chieu_id'] == 1 ? "box room-one" : "box room-tw" ?>">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'A') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" price = "'.$value['phu_thu'].'" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'B') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'C') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'D') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'E') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'F') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'G') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'H') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'I') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'J') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'K') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
            <div class="box">
                <?php
                $resultdata = executeResult($data);
                foreach ($resultdata as $value) {
                    if ($value['vi_tri_day'] == 'L') {
                      if($value['suat_chieu_id'] == NULL) {
                                echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                            <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';  
                        }
                        else {
                          echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                          <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '</label>';
                          
                        }
                      }
                }
                ?>
            </div>
          </div>   
      </div> 
    </div>
<!-- ------------------------LIST SEAT-------------------------- -->


<!-- ------------------------SEAT INFOR ----------------------- -->
<div class="container">
    <div class="note-seat">
        <ul class="seat-infor">
            <li>
                <i class="fas fa-square" style="color:red"></i>
                <span>Ghế đã có chủ</span>
            </li>
            <li>
                <i class="fas fa-square" style="color:848484"></i>
                <span>Ghế đã chưa đặt</span>
            </li>
            <li>
                <i class="fas fa-square" style="color:black"></i>
                <span>Ghế đang chọn</span>
            </li>
            <li>
                <i class="fas fa-square" style="color:green"></i>
                <span>Ghế không thể chon</span>
            </li>
        </ul>
    </div>
</div>
<div style="border-bottom: 1px solid gray;"></div>   
<!-- ------------------------SEAT INFOR ----------------------- -->


<!-- -----------------------PRODUCT------------------------=--- -->
<div class="product-show">
    <div class="container">
        <div class="product">
            <h2 class="content-product">
                Đặt hàng sản phẩm
            </h2>
            <div class="list-product">
                <div class="item-product">
                    <div class="image-product">
                        <img src="https://media.lottecinemavn.com/Media/WebAdmin/ddbf689b2c5046f8845b64b1ed3c51ca.jpg" alt="">
                    </div>
                    <div class="name-product">
                        <a href="javascript:void(0)">HARMONY COMBO</a>
                    </div>
                    <div class="price-product">
                        <span class="dash-price">
                            Giá bán online
                        </span>
                        <span class="price">
                            110.000Đ
                        </span>
                    </div>
                </div>
                <div class="item-product">
                    <div class="image-product">
                        <img src="https://media.lottecinemavn.com/Media/WebAdmin/ddbf689b2c5046f8845b64b1ed3c51ca.jpg" alt="">
                    </div>
                    <div class="name-product">
                        <a href="javascript:void(0)">HARMONY COMBO</a>
                    </div>
                    <div class="price-product">
                        <span class="dash-price">
                            Giá bán online
                        </span>
                        <span class="price">
                            110.000Đ
                        </span>
                    </div>
                </div>
                <div class="item-product">
                    <div class="image-product">
                        <img src="https://media.lottecinemavn.com/Media/WebAdmin/4a1e32e319b34e8fa657bd7f025115e0.png" alt="">
                    </div>
                    <div class="name-product">
                        <a href="javascript:void(0)">Jurassic Solo Combo</a>
                    </div>
                    <div class="price-product">
                        <span class="dash-price">
                            Giá bán online
                        </span>
                        <span class="price">
                            110.000Đ
                        </span>
                    </div>
                </div>
                <div class="item-product">
                    <div class="image-product">
                        <img src="https://media.lottecinemavn.com/Media/WebAdmin/b877b2c0595c449b9bd319bb8b64e20b.png" alt="">
                    </div>
                    <div class="name-product">
                        <a href="javascript:void(0)">OTTO COMBO</a>
                    </div>
                    <div class="price-product">
                        <span class="dash-price">
                            Giá bán online
                        </span>
                        <span class="price">
                            110.000Đ
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- -----------------------PRODUCT---------------------------- -->

<!-- ----------------------BTN-NEXT --------------------------- -->
<div class="btn-next">
    <div class="container">
        <a href="javascript:void(0)" class="btn-container">
            <i class="fas fa-long-arrow-alt-left"></i>
            Trở lại
        </a>
        <form action="./checkout.php?id=<?=$id?>" method="post" enctype='multipart/form-data'>
            <div id="list-seat">

            </div>
            <button class="btn-container">
                Bước tiếp theo
                <i class="fas fa-long-arrow-alt-right"></i>
            </button>
        </form>
    </div>
</div>
<!-- ----------------------BTN-NEXT --------------------------- -->

<!-- ----------------------TOTAL-MOVIE------------------------- -->
<div class="total-movie">
    <div class="container">
        <div class="item-movie">
            <p class="title-item-movie">Phim chiếu rạp</p>
            <div class="box-item-movie">
                <div class="image-box-item-movie">
                    <img src="../image/phim/<?= $item['hinh_anh'] ?>" alt="<?= $item['ten'] ?>">
                </div>
                <div class="infor-movie">
                    <div class="name-mocie">
                        <p><?= $item['ten'] ?></p>
                    </div>
                    <div class="type-movie">
                        <p><?= $item['dinh_dang_phim_id'] ?></p>
                    </div>
                    <div class="age-watch-movie">
                        <p><?= $item['gioi_han_tuoi'] ?> tuổi trở lên</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-movie">
            <p class="title-item-movie">Thông tin vé đặt</p>
            <div class="infor-ticket">
                <div class="detail-ticket">
                    <ul>
                        <li>
                            Ngày chiếu
                        </li>
                        <li>
                            Giờ chiếu
                        </li>
                        <li>
                            Rạp chiếu
                        </li>
                        <li>
                            Ghế ngồi
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <?= $item['ngay_chieu'] ?>
                        </li>
                        <li>
                            <?= $item['TIME(gio_bat_dau)'] ?> ~ <?= $item['TIME(gio_ket_thuc)'] ?>
                        </li>
                        <li>
                            Vincom Nguyễn Chí Thanh
                        </li>
                        <li id="value-list">
                            
                        </li>
                    </ul>
                </div>
                <div class="total-price-tiket">
                    
                </div>
            </div>
        </div>
        <div class="item-movie">
            <p class="title-item-movie">Thông tin sản phẩm</p>
        </div>
        <div class="item-movie">
            <p class="title-item-movie">Tổng tiền đơn hàng</p>
            <div class="detail-ticket">
                    <ul>
                        <li>
                            Đặt trước phim
                        </li>
                        <li style="margin-top: 0;">
                            Đồ uống
                        </li>
                    </ul>
                    <ul>
                        <li id="price-ticket">
                            0
                        </li>
                        <li style="margin-top: 0;">
                            120.000Đ
                        </li>
                    </ul>
            </div>
            <div class="total-price-tiket" style="margin-top: 60px;">
                <span>320.000Đ</span>
            </div>
        </div>
    </div>
</div>
<!-- ----------------------TOTAL-MOVIE------------------------- -->

<?php
    include('./include/footer.php')
?>

</body>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../js/swiper-bundle.min.js"></script>

</html>

<script type="text/javascript">

  
    var list = document.getElementById('value-list');
    var isSeat = document.getElementById('list-seat'); 
    var valueListSeat = document.getElementById('value-list-seat')
    var text = '<span>Ghế bạn vừa chọn là: </span> ';
    var confirm='<a href="checkout.php?id=<?= $id;?>" title="" style="margin-left:20px;">Tiếp tục thanh toán</a>';
    var listArray = [];
    var listIdSeat = [];
    var checkboxs = document.querySelectorAll('.checkbox');
    var text2 = document.querySelectorAll('.list-seat-choose>.box>label');
    var hehe = document.querySelectorAll('#value-list>p');
    var box = document.getElementsByClassName('box');
    var listPrice = [];
    var price = document.getElementById('price-ticket');
    for (var check of checkboxs) {
        check.addEventListener('click', function() {
            const toNumbers = arr => arr.map(Number)
            console.log(toNumbers(listPrice).reduce((previousValue, currentValue) => previousValue + currentValue, 0))
            if (this.checked == true) {
                if(listArray.length > 5) {
                    alert('Bạn chỉ có thể đặt tối đa 6 ghế')
                }
                else {
                    listArray.push(`${this.id}`);
                    listIdSeat.push(`<input type="text" name="is-seat[]" value=${this.value}>`);
                    listPrice.push(`${this.getAttribute("price")}`);
                    isSeat.innerHTML = listIdSeat;
                    list.innerHTML = listArray.join(' , ');
                    price.innerHTML =  listPrice.reduce((previousValue, currentValue) => previousValue + currentValue, 0);
                    for (var test of text2) {
                        if (test.htmlFor == this.id) {
                            test.style.backgroundColor = 'black';
                        }
                    }
                }
            } else {
                listArray = listArray.filter(e => e !== `${this.id}`);
                listIdSeat = listIdSeat.filter(e => e !== `<input type="text" name="is-seat[]" value=${this.value}>`);
                listPrice = listPrice.filter(e => e !== `${this.getAttribute("price")}`);
                list.innerHTML = listArray.join(' , ');
                isSeat.innerHTML = listIdSeat.join(' , ');
                for (var test of text2) {
                    if (test.htmlFor == this.id) {
                        test.style.backgroundColor = '#848484';
                    }
                }
            }
        })
    }



    var arraySeat = [];
    var seat = document.querySelectorAll('.seat')
    for(var checkSeat of seat) {
        checkSeat.addEventListener('click', function() {
            console.log(checkSeat);
            checkSeat.style.backgroundColor = 'back'
        })
    } 
</script>
<style>
    .header-book-seat {
    color: black;
    display: flex;
    justify-content: space-between;
    padding: 20px;
}

.header-book-seat > h2 {
    font-weight: 700;
}

.header-book-seat > ul {
    display: flex;
}

.header-book-seat > ul > li {
    list-style: none;
    margin: 10px;
    font-size: 14px;
    border: 1px solid #d1d1d1;
    padding: 2px 6px;
    background-color: white;
}

.header-book-seat > ul > li > a {
    color: black;
}

.screen {
    position: relative;
}

.screen > .img-banner-screen {
    width: 100%;
    display: block;
    margin: 15px 0;
    line-height: 25px;
}

.screen > .text-screen {
    font-size: 20px;
    color: #231f20;
    text-align: center;
    font-weight: normal;
    font-style: italic;
    font-weight: bold;
    position: absolute;
    z-index: 100;
    top: -12%;
    left: 50%;
}

.is-check {
    background-color: blue;
}
.container>.title {
    font-size: 2rem;
    text-align: center;
    color: white;
    text-transform: capitalize;
}

.input-box-wrapper {
    background: #F9F8F3;
    position: relative;
}

.list-row-seat {
    position: absolute;
    top: 20px;
    left: 16%;
}

.name-row {
    text-transform: capitalize;
    display: block;
    width: 100%;
    text-align: center;
    user-select: none;
    margin: 5px;
    display: block;
    width: 22px;
    height: 22px;
    font-size: 14px;
    line-height: 23px;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
}

.list-seat-choose {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    padding: 20px;
    flex-direction: column;
    align-items: center;
}


.box {
    display: flex;
    align-items: center;
    border-bottom: 0;
}


.list-seat-choose>.box>label {
    text-transform: capitalize;
    display: block;
    cursor: pointer;
    width: 100%;     
    text-align: center;
    user-select: none;
    margin: 5px;
    display: block;
    width: 22px;
    height: 22px;
    background: #848484;      
    color: #fff;
    font-size: 11px;
    line-height: 23px;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
}

.list-seat-choose>.box>label:hover {
    background-color: #231f20;
}


.list-seat-choose .box .checkbox {
    position: relative;
    width: 20px;
    height: 20px;
    cursor: pointer;
}

input[type="checkbox"] {
    display: none;
}

.print-value {
    border: 1px solid #333;
    height: 200px;
}

.check {
    background-color: gray;
    width: 200px;
    height: 200px;
}

.input-check-seat {
    border: none;
    width: 40px;
    height: auto;
}
.is-check {
    background: red !important;
}
.box > label:nth-of-type(4), 
.box > label:nth-of-type(8), 
.box > label:nth-of-type(12) {
    margin-right: 30px;
}

.box:nth-of-type(5),
.box:nth-of-type(10),
.box:nth-of-type(15) {
    margin-bottom: 10px !important;
}

.name-row:nth-of-type(5),
.name-row:nth-of-type(10),
.name-row:nth-of-type(15) {
    margin-bottom: 15px !important;
}



.seat-infor {
    display: flex;
    justify-content: flex-end;
    margin: 20px 0;
}

.seat-infor > li {
    list-style: none;
    margin: 15px;
}

/* ------product--------- */

.product-show {
    background-color: #f9f6ec;
    padding: 20px;
}

.list-product {
    display: flex;
    justify-content: space-between;
}

.content-product {
    font-size: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-weight: bold;
    margin: 20px 0;
}

.item-product {
    border: 1px solid #dedede;
    background: #fff;
}

.item-product > .image-product > img {
    width: 230px;
}

.name-product {
    padding: 10px;
    border-top: 1px solid #dedede;
    height: 80px;
}

.name-product > a{
    font-weight: bold;
}

.price-product {
    border-top: 1px solid #dedede;
    display: flex;
    justify-content: space-between;
    padding: 5px 10px;
    align-items: center;
}

.dash-price {
    font-weight: bold;
}

.price-product > .price {
    font-weight: bold;
    font-size: 18px;
}
/* --------------------- */

/* ---------BTN NEXT ------------ */
.btn-next {
    background-color: #cdc197;
    width: 100%;
}

.btn-next > .container {
    display: flex;
    justify-content: space-between;
    height: 50px;
    align-items: center;
}

.btn-next > .container > .btn-container {
    font-size: 18px;
    color: #231f20;
    font-weight: bold;
}

/* ---------BTN NEXT ------------ */

/* ---------TOTAL MOVIE---------- */
.total-movie {
    background-color: #231f20;
    height: 200px;
}

.total-movie > .container {
    display: flex;
    height: 100%;
}

.total-movie > .container > .item-movie {
    border: 1px solid white;
    width: 25%;
    height: 100%;
    padding: 15px;
}

.item-movie > .title-item-movie {
    font-size: 16px;
    color: #cdc197;
}

.item-movie > .box-item-movie {
    display: flex;
    margin-top: 10px;
}

.box-item-movie > .image-box-item-movie {
    margin-right: 10px;
}

.box-item-movie > .image-box-item-movie > img {
    width: 130px;
}

.infor-movie {
    font-size: 14px;
    color: white;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.detail-ticket {
    display: flex;
}

.detail-ticket > ul {
    padding: 0;
    margin-right: 10px;
}

.detail-ticket > ul:first-child {
    width: 100px;
}

.detail-ticket > ul:last-child > li {
    color: white;
}

.detail-ticket > ul > li {
    list-style: none;
}

.detail-ticket > ul > li:last-child {
    margin-top: 22px;
}

.total-price-tiket {
    display: flex;
    justify-content: flex-end;
    color: white;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.total-price-tiket > span {
    font-size: 20px;
    font-weight: bold;
}
/* ---------TOTAL MOVIE---------- */

</style>

