<?php include('../config/db.php');
include('../config/sql_cn.php');
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
    <title>Đặt vé</title>

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
                    <a class="content-link" href="#">Lịch chiếu</a>
                    <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                    <a class="content-link" href="./dat-ve.php?id=<?= $id; ?>"><?= $item['ten'] ?></a>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="sidebar-container">
        </div>
        select * from suat_chieu
        where suat_chieu.ngay_chieu > now() + INTERVAL 7 day;

        <article class="movie-line-entity">
            <div class="entity-extra" style="width: 100%">
                <div class="text-uppercase entity-extra-title">Lịch chiếu</div>
                <div class="entity-showtime">
                    <div class="showtime-wrap">
                        <?php

                        $date = new DateTime();
                        $sql = 'select * from suat_chieu where suat_chieu.ngay_chieu > now()';
                        $result = executeResult($sql);

                        foreach ($result as $row) {
                            echo '<div class="showtime-item">
                                     <a href="./book-ticket.php?suat_chieu=' . $row['id'] . '" style="color:white" class="btn-time btn" aria-disabled="true">' . date('H:i', strtotime($row['gio_bat_dau']))  . '</a>
                                    </div>';
                        }

                        // $date = strtotime("+1 day");
                        // echo date('d/m/Y', $date);
                        ?>
                    </div>
                </div>
            </div>
        </article>
    </div>


    <article class="movie-line-entity">
        <div class="entity-extra" style="width: 100%">
            <div class="text-uppercase entity-extra-title">Lịch chiếu</div>
            <div class="entity-showtime">
                <div class="showtime-wrap">
                    <?php

                    $date = new DateTime();
                    for ($i = 1; $i <= 7; $i++) {
                        $sql = 'SELECT TIME(gio_bat_dau), TIME(gio_ket_thuc), id  FROM suat_chieu WHERE ngay_chieu = "' . $date->add(new DateInterval('P1D'))->format('Y-m-d') . '"';

                        $result = executeResult($sql);
                        foreach ($result as $row) {
                            echo '
                                <div class="showtime-item">
                                    <a href="./book-ticket.php?id=' . $row['id'] . '" style="color:white" class="btn-time btn" aria-disabled="true">' . date('H:i', strtotime($row['TIME(gio_bat_dau)']))  . '</a>
                                </div>
                            ';
                        }
                    }
                    // $date = strtotime("+1 day");
                    // echo date('d/m/Y', $date);
                    ?>

                </div>
            </div>
        </div>
    </article>

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