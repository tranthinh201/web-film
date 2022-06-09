<?php include('../config/db.php');
include('../config/sql_cn.php');
session_start();
if (!isset($_SESSION['user-client'])) {
    echo '<script>confirm("dang nhap di cu")</script>';
    header("Location: ./login.php");
}
if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'SELECT * FROM phim, loai_phim WHERE phim.loai_phim_id = loai_phim.id AND phim.id = "' . $id . '"';
    $query = mysqli_query($connect, $sql);
    $item  = mysqli_fetch_assoc($query);

    $loai_phim      = 'SELECT * FROM loai_phim WHERE loai_phim.id = ' . $item['loai_phim_id'] . '';
    $query_loai_phim = mysqli_query($connect, $loai_phim);
    $ten_loai_phim  = mysqli_fetch_assoc($query_loai_phim);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>
    <?php include('./include/library.php'); ?>
    <title>Chi tiết phim</title>

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
        <div class="sidebar-container">
            <div class="content">
                <section class="section-long">
                    <div class="section-line">
                        <div class="movie-info-entity">
                            <div class="entity-poster" data-role="hover-wrap">
                                <div class="embed-responsive embed-responsive-poster">
                                    <img class="embed-responsive-item" src="../image/phim/<?= $item['hinh_anh'] ?>" alt="<?= $item['ten'] ?>" />
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
                                        <span class="entity-list-title">Ngày công chiếu:</span><?= date("d/m/Y", strtotime($item['ngay_cong_chieu'])) ?>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Diễn viên:</span>
                                        <a class="content-link" href="#"><?= $item['dien_vien'] ?></a>

                                    </li>
                                    <li>
                                        <span class="entity-list-title">Nhà sản xuất:</span>
                                        <a class="content-link" href="#"><?= $item['nha_san_xuat'] ?></a>

                                    </li>
                                    <li>
                                        <span class="entity-list-title">Giới hạn tuổi:</span>
                                        <a class="content-link" href="#"><?= $item['gioi_han_tuoi'] ?></a>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Quốc gia:</span>
                                        <a class="content-link" href="#"><?= $item['quoc_gia'] ?></a>
                                    </li>
                                    <li>
                                        <span class="entity-list-title">Ngôn ngữ:</span><?= $item['ngon_ngu'] ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="sidebar section-long order-lg-last">
                <section class="section-sidebar">
                    <div class="section-head">
                        <h2 class="section-title text-uppercase">Phim đang hot</h2>
                    </div>
                    <?php
                    $sql = "SELECT * FROM phim LIMIT 3";
                    $result = executeResult($sql);
                    foreach ($result as $row) {
                        echo '
                        <div class="movie-short-line-entity">
                            <a class="entity-preview" href="./dat-ve.php?id=' . $row['id'] . '">
                                <span class="embed-responsive embed-responsive-16by9">
                                    <img class="embed-responsive-item" style="object-fit:cover" src="../image/phim/' . $row['hinh_anh'] . '" alt="' . $row['ten'] . '" />
                                </span>
                            </a>
                            <div class="entity-content">
                                <h4 class="entity-title">
                                    <a class="content-link" href="./dat-ve.php?id=' . $row['id'] . '">' . $row['ten'] . '</a>
                                </h4>
                                <p class="entity-subtext">' . date("d/m/Y", strtotime($row['ngay_cong_chieu'])) . '</p>
                            </div>
                        </div>
                        ';
                    }
                    ?>
                </section>
            </div>
        </div>
    
        <article class="movie-line-entity">
            <div class="entity-extra" style="width: 100%">
                <a href="./dat-ve.php?id=<?= $id ?>">Đặt vé</a>
            </div>
        </article>
    </div>


  

    <?php include './include/footer.php' ?>
    <!-- jQuery library -->
    <script src="../js/jquery-3.3.1.js"></script>
    <!-- Bootstrap -->
    <script src="../bootstrap/js/bootstrap.js"></script>
    <!-- Paralax.js -->
    <script src="../parallax.js/parallax.js"></script>
    <!-- Waypoints -->
    <script src="../waypoints/jquery.waypoints.min.js"></script>
    <!-- Slick carousel -->
    <script src="../slick/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="../magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Inits product scripts -->
    <script src="../js/fescript.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ4Qy67ZAILavdLyYV2ZwlShd0VAqzRXA&callback=initMap"></script>
    <script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>
</body>

</html>