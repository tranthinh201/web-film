<?php include('../config/db.php');
session_start();
if (!isset($_SESSION['user-client'])) {
    header("Location: /phim/views/login.php");
}
if (isset($_GET['suat_chieu'])) {
    $id       = $_GET['suat_chieu'];
    $nsql      = 'SELECT suat_chieu.phong_chieu_id, suat_chieu.dinh_dang_phim_id, phim.ngon_ngu, phim.ten, phim.thoi_luong, phim.gioi_han_tuoi, phim.hinh_anh, loai_phim.ten_loai FROM loai_phim, suat_chieu, phim WHERE suat_chieu.phim_id = phim.id and suat_chieu.id = "' . $id . '"';
    $query = mysqli_query($connect, $nsql);
    $item  = mysqli_fetch_assoc($query);
    

    $ghe = 'SELECT ghe_ngoi.id, vi_tri_day, vi_tri_cot FROM suat_chieu, ghe_ngoi WHERE suat_chieu.phong_chieu_id = ghe_ngoi.phong_chieu_id AND suat_chieu.id = "' . $id . '"';
    $kqghe = executeResult($ghe);

    $ghe_dat = 'SELECT ve_ban.ghe_id, ghe_ngoi.vi_tri_cot, ghe_ngoi.vi_tri_day FROM suat_chieu, ve_ban, ghe_ngoi WHERE ve_ban.suat_chieu_id = suat_chieu.id AND ve_ban.ghe_id = ghe_ngoi.id AND suat_chieu.id = "' . $id . '"';
    $kqghedat = executeResult($ghe_dat);
  
    // echo('<hr>');
    // print_r($kqghe);
    // echo('</hr>');
    // var_dump($kqghedat[1]);
    // foreach ($kqghe as $item) {
    //     echo '<hr>' . $item['vi_tri_cot'],"----", $item['id']. '</hr>';
    //     echo("--------------------------------------------------");
    //     foreach ($kqghedat as $items) {
    //         // if ($item['id'] == $items['ghe_id']) {
    //         //     echo '<hr>' . $item['vi_tri_cot'],"----", $item['id'], "----", $items['ghe_id']. '</hr>hihi';
    //         // } else {
    //         //     echo '<hr>' . $item['vi_tri_cot'],"----", $item['id'], "----", $items['ghe_id']. '</hr>';
    //         // }
    //         if ($item['id'] == $items['ghe_id']) {
    //         echo '<hr>' .$items['ghe_id']. '</hr>';}
    //     }
    //         echo '<hr>' .$items['ghe_id']. '--ohohoho</hr>';
        
     
    
    // foreach ($kqghe as $item) {
    //     if (!empty($kqghedat)) {
    //         foreach ($kqghedat as $items) {
    //             if ($item['id'] == $items['ghe_id']) {
    //                 echo '<hr>' . $item['vi_tri_cot'],"----", $item['id'], "----", $items['ghe_id']. '</hr>hihi';
    //             }
    //             else {
    //                 echo '<hr>' . $item['vi_tri_cot'],"----", $item['id'], "----", $items['ghe_id']. '</hr>';
    //                 break;
    //             }
    //         }
    //     }
    //     else {
    //         echo '<hr>' . $item['vi_tri_cot'],"----", $item['id'], "----", $items['ghe_id']. '</hr>';
    //     }
    // }

    // die();
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

    <title>Trang chủ</title>
</head>

<body>
    <?php include('./include/header.php'); ?>
    <section class="after-head d-flex section-text-white position-relative">
        <div class="d-background" data-image-src="http://via.placeholder.com/1920x1080" data-parallax="scroll"></div>
        <div class="d-background bg-black-80"></div>
        <div class="top-block top-inner container">
            <div class="top-block-content">
                <h1 class="section-title">Thông tin phim</h1>
                <div class="page-breadcrumbs">
                    <a class="content-link" href="./index.php">Trang chủ</a>
                    <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                    <a class="content-link" href="./dat-ve.php?id=<?= $id; ?>"><?= $item['ten'] ?></a>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="section-long">
            <div class="section-line">
                <div class="movie-info-entity">
                    <div class="entity-poster" data-role="hover-wrap">
                        <div class="embed-responsive embed-responsive-poster">
                            <img class="embed-responsive-item" style="object-fit: cover; height: auto" src="../image/phim/<?= $item['hinh_anh'] ?>" alt="<?= $item['ten'] ?>" />
                        </div>
                        <div class="d-over bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                            <div class="entity-play">
                                <a class="action-icon-theme action-icon-bordered rounded-circle" href="https://www.youtube.com/watch?v=d96cjJhvlMA" data-magnific-popup="iframe">
                                    <span class="icon-content"><i class="fas fa-play"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="entity-content">
                        <h2 class="entity-title"><?= $item['ten'] ?></h2>
                        <div class="entity-category">
                            <?= $item['ten_loai'] ?>
                        </div>
                        <div class="entity-info">
                            <div class="info-lines">

                                <div class="info info-short">
                                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                    <span class="info-text"><?= $item['thoi_luong'] ?></span>
                                    <span class="info-rest">&nbsp;phút</span>
                                </div>
                            </div>
                        </div>
                        <ul class="entity-list">
                            <li>
                                <span class="entity-list-title">Giới hạn tuổi:</span>
                                <a class="content-link" href="#"><?= $item['gioi_han_tuoi'] ?></a>
                            </li>
                            <li>
                                <span class="entity-list-title">Ngôn ngữ:</span><?= $item['ngon_ngu'] ?>
                            </li>
                            <li class="print-value">
                                <form action="./checkout.php?suatchieu=<?=$id?>" method="post" enctype='multipart/form-data'>
                                    <select name="nguoi-lon" id="nguoi-lon">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <select name="tre-em" id="tre-em">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                    <div id="value-list"></div>
                                    <button>Checking</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="input-box-wrapper">
            <div class="box">
                <?php
                foreach ($kqghe as $item) {
                        foreach ($kqghedat as $items) {
                            if ($item['vi_tri_day'] == 'A') {
                                if($item['vi_tri_cot'] !== $items['vi_tri_cot']){
                                    echo ' <input type="checkbox" value="' . $item['id'] . '" class="checkbox" id="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '" disabled>
                                    <label for="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '">' . $item['vi_tri_cot'] . '</label>'; 
                                    echo '<br>'.$item['vi_tri_cot'].' === '.$items['vi_tri_cot'].'</br>';
                                } else if($item['id'] == $items['ghe_id'] && $item['vi_tri_cot'] == $items['vi_tri_cot']) {
                                    echo '<br>'.$item['vi_tri_cot'].' ==== '.$items['vi_tri_cot'].'</br>';
                                    echo ' <input type="checkbox" value="' . $item['id'] . '" class="checkbox" id="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '" disabled>
                                    <label style="color:red"; for="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '">' . $item['vi_tri_cot'] . '</label>'; 
                                }  
                            } 
                        }       
                        
                    }
                
                foreach ($kqghe as $item) {
                        
                }
                ?>
            </div>
            <div class="" id-seat="377" type-seat="VIP">1A</div>
        </div>
    </div>


    

</body>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../js/swiper-bundle.min.js"></script>

</html>

<style type="text/css">
    .container>.title {
        font-size: 2rem;
        text-align: center;
        color: white;
        text-transform: capitalize;
    }

    .container .input-box-wrapper {
        position: relative;
        background: black;
        display: flex
    }

    .input-box-wrapper .box {
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #383854;
        border-bottom: 0;
        padding: 14px 10px;
    }



    .input-box-wrapper>.box>label {
        color: white;
        text-transform: capitalize;
        display: block;
        cursor: pointer;
        width: 100%;
        padding: 20px;
        text-align: center;
        background-color: black;
        border: 1px white solid;
        user-select: none;
        margin: 10px;
    }


    .input-box-wrapper .box .checkbox {
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
</style>

<script>
    var nguoilon = document.getElementById('nguoi-lon').value;
    var treem = document.getElementById('tre-em').value;
    console.log(nguoilon, treem);
    var list = document.getElementById('value-list');
    var text = '<span>Ghế bạn vừa chọn là: </span>';
    var listArray = [];
    var checkboxs = document.querySelectorAll('.checkbox');
    var text2 = document.querySelectorAll('.input-box-wrapper>.box>label');
    var hehe = document.querySelectorAll('#value-list>p');
    for (var check of checkboxs) {
        check.addEventListener('click', function() {
            console.log(this)
            if (this.checked == true) {
                if(listArray.length > 5) {
                    alert('Đéo được hơn 6 người đâu dmm')
                }
                else {
                    listArray.push(`<input type="text" value = ${this.value} class = "input-check-seat" name="is-seat[]">`);
                    list.innerHTML = text + listArray.join(' , ');
                    for (var test of text2) {
                        if (test.htmlFor == this.id) {
                            test.style.backgroundColor = 'red';
                        }
                    }
                }
            } else {
                listArray = listArray.filter(e => e !== `<input type="text" value = ${this.value} class = "input-check-seat" name="is-seat[]">`);
                list.innerHTML = text + listArray.join(' , ');
                for (var test of text2) {
                    if (test.htmlFor == this.id) {
                        test.style.backgroundColor = 'black';
                    }
                }
            }
        })
    }

    
</script>