<?php include('../config/db.php');
session_start();
if (!isset($_SESSION['user-client'])) {
    echo '<script>alert("dang nhap di cu")</script>';
    header("Location: /phim/views/login.php");
}
if (isset($_GET['suat_chieu'])) {
    $id       = $_GET['suat_chieu'];
    $nsql      = 'SELECT suat_chieu.phong_chieu_id, suat_chieu.dinh_dang_phim_id, phim.ngon_ngu, phim.ten, phim.thoi_luong, phim.gioi_han_tuoi, phim.hinh_anh, loai_phim.ten_loai FROM loai_phim, suat_chieu, phim WHERE suat_chieu.phim_id = phim.id and suat_chieu.id = "' . $id . '"';
    $query = mysqli_query($connect, $nsql);
    $item  = mysqli_fetch_assoc($query);
   

    $data = "SELECT ghe_ngoi.id, ve_ban.suat_chieu_id, ghe_ngoi.vi_tri_day, ghe_ngoi.vi_tri_cot
                FROM ghe_ngoi
                LEFT JOIN ve_ban
                ON ghe_ngoi.id = ve_ban.ghe_id AND  ve_ban.suat_chieu_id = '$id'
                LEFT JOIN suat_chieu
                ON suat_chieu.id = ve_ban.suat_chieu_id 
                LEFT JOIN phong_chieu
                ON phong_chieu.id = ghe_ngoi.phong_chieu_id
                WHERE phong_chieu.id = ".$item['phong_chieu_id']."
                ORDER BY ghe_ngoi.id ASC";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Trang chủ</title>
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="../animate.css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome iconic font -->
    <link href="../fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link href="../magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slick carousel -->
    <link href="../slick/slick.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Theme styles -->
    <link href="../css/dot-icons.css" rel="stylesheet" type="text/css">
    <link href="../css/theme.css" rel="stylesheet" type="text/css">
    <link href="../css/booking.css" rel='stylesheet' type='text/css'>
    <title>Trang chủ</title>
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
                <ul>
                    <li>
                        Chọn loại vé
                    </li>
                    <li>
                        Đặt lại<i></i>
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
        <div class="input-box-wrapper">
                <div class="box">
                <div class="name-row">
                    A
                </div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'A') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                   <div class="name-row">B</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'B') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                <div class="name-row">C</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'C') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                <div class="name-row">D</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'D') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                <div class="name-row">E</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'E') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                <div class="name-row">F</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'F') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                <div class="name-row">G</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'G') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                <div class="name-row">H</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'H') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                <div class="name-row">I</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'I') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                    <div class="name-row">J</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'J') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                <div class="name-row">K</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'K') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <div class="box">
                <div class="name-row">L</div>
                    <?php
                    $resultdata = executeResult($data);
                    foreach ($resultdata as $value) {
                        if ($value['vi_tri_day'] == 'L') {
                          if($value['suat_chieu_id'] == NULL) {
                                    echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" >
                                <label " for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';  
                            }
                            else {
                              echo ' <input type="checkbox" value="' . $value['id'] . '" class="checkbox" id="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '" disabled>
                              <label class="is-check" for="' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '">' . $value['vi_tri_cot'] . '' . $value['vi_tri_day'] . '</label>';
                              
                            }
                          }
                    }
                    ?>
                </div>
                <!--  -->
            </div>
        
            <div id="value-list">
    
            </div>
        </div>
     
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

<!-- -----------------------PRODUCT---------------------------- -->
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


<?php
    include('./include/footer.php')
?>

</body>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../js/swiper-bundle.min.js"></script>

</html>

<script>

  
    var list = document.getElementById('value-list');
    var valueListSeat = document.getElementById('value-list-seat')
    var text = '<span>Ghế bạn vừa chọn là: </span>';
    var listArray = [];
    var listSeat = [];
    var checkboxs = document.querySelectorAll('.checkbox');
    var text2 = document.querySelectorAll('.input-box-wrapper>.box>label');
    var hehe = document.querySelectorAll('#value-list>p');
    var box = document.getElementsByClassName('box');
    console.log(box)
    for (var check of checkboxs) {
        check.addEventListener('click', function() {
             console.log(listSeat)
            if (this.checked == true) {
            
                if(listArray.length > 5) {
                    alert('Đéo được hơn 6 người đâu dmm')
                }
                else {
                    listArray.push(`<input type="text" value = ${this.value} class = "input-check-seat" name="is-seat[]">`);
                    // listSeat.push(`<span>${this.id}</span>`)
                    list.innerHTML = text + listArray.join(' , ');
                    for (var test of text2) {
                        if (test.htmlFor == this.id) {
                            test.style.backgroundColor = 'black';
                        }
                    }
                }
            } else {
                listArray = listArray.filter(e => e !== `<input type="text" value = ${this.value} class = "input-check-seat" name="is-seat[]">`);
                listSeat = listSeat.filter(e => e !== `<span>${this.id}</span>`);
                // valueListSeat.innerHTML = text + listSeat.join(", ")
                list.innerHTML = listArray.join(' , ');
                console.log(listArray)
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