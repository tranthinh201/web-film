<?php
session_start();
include("../config/db.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<!DOCTYPE html>
<html>

<head>
    <?php include('./include/library.php'); ?>
    <title>Trang chủ</title>
</head>

<body class="body">
    <?php include "./include/header.php" ?>
    <section class="section-text-white position-relative">
        <div class="d-background" data-image-src="../image/banner/banner-2.jpg" data-parallax="scroll"></div>
        <div class="mt-auto container position-relative">
            <div class="top-block-head text-uppercase">
                <h2 class="display-4">Phim Hot
                    <span class="text-theme">tháng <?php echo date('m') ?></span>
                </h2>
            </div>
            <div class="top-block-footer">
                <div class="slick-spaced slick-carousel" data-slick-view="navigation responsive-4">
                    <div class="slick-slides">
                        <?php
                        $sql = "SELECT ten, ten_loai, hinh_anh, thoi_luong, trailer, phim.id FROM phim, loai_phim where phim.loai_phim_id = loai_phim.id LIMIT 6";
                        $result = executeResult($sql);
                        foreach ($result as $row) {
                            echo '
                                <div class="slick-slide">
                                <article class="poster-entity" data-role="hover-wrap">
                                    <div class="embed-responsive embed-responsive-poster">
                                        <img class="embed-responsive-item" src="../image/phim/' . $row['hinh_anh'] . '" alt="" />
                                    </div>
                                    <div class="d-background bg-theme-lighted collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show"></div>
                                    <div class="d-over bg-highlight-bottom">
                                        <div class="collapse animated faster entity-play" data-show-class="fadeIn show" data-hide-class="fadeOut show">
                                            <a class="action-icon-theme action-icon-bordered rounded-circle" href= "' . $row['trailer'] . '" data-magnific-popup="iframe" autoplay="true">
                                                <span class="icon-content"><i class="fas fa-play"></i></span>
                                            </a>
                                        </div>
                                        <h4 class="entity-title">
                                            <a class="content-link" href="./detail-movie.php?id=' . $row['id'] . '">' . $row['ten'] . '</a>
                                        </h4>
                                        <div class="entity-category">
                                            <a class="content-link" href="javascript:void(0)">' . $row['ten_loai'] . '</a>
                                        </div>
                                        <div class="entity-info">
                                            <div class="info-lines">
                                                
                                                <div class="info info-short">
                                                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                                    <span class="info-text">' . $row['thoi_luong'] . '</span>
                                                    <span class="info-rest">&nbsp;phút</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            ';
                        }
                        ?>
                    </div>
                    <div class="slick-arrows">
                        <div class="slick-arrow-prev">
                            <span class="th-dots th-arrow-left th-dots-animated">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                        <div class="slick-arrow-next">
                            <span class="th-dots th-arrow-right th-dots-animated">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-long">
        <div class="container">
            <div class="section-head">
                <h2 class="section-title text-uppercase">PHIM CHiếU Hôm nay</h2>
                <p class="section-text">Ngày: <?php echo date('d/m/Y'); ?></p>
            </div>
            <section class="section-text-white position-relative">
                <div class="mt-auto container position-relative">
                    <div class="slick-spaced slick-carousel" data-slick-view="navigation responsive-4">
                    </div>
                    <div class="top-block-footer">
                        <div class="slick-spaced slick-carousel" data-slick-view="navigation responsive-4">
                            <div class="slick-slides">
                                <div class="slick-slide">
                                    <article class="poster-entity" data-role="hover-wrap">
                                        <div class="embed-responsive embed-responsive-poster">
                                            <img class="embed-responsive-item" src="../image/banner/banner-3.jpg" alt="" />
                                        </div>

                                    </article>
                                </div>
                                <?php
                                $sql = "SELECT phim.id, ten, ten_loai, hinh_anh, thoi_luong FROM phim, loai_phim where phim.loai_phim_id = loai_phim.id LIMIT 6";
                                $result = executeResult($sql);
                                foreach ($result as $row) {
                                    echo '
                                    <div class="slick-slide">
                                        <article class="poster-entity" data-role="hover-wrap">
                                            <div class="embed-responsive embed-responsive-poster">
                                                <img class="embed-responsive-item" src="../image/phim/' . $row['hinh_anh'] . '" alt="" />
                                            </div>
                                            <div class="d-background bg-theme-dark collapse animated faster" data-show-class="fadeIn show" data-hide-class="fadeOut show"></div>
                                            <div class="hidden-block">
                                                <div class="book-now">
                                                    <a href="./dat-ve.php?id=' . $row['id'] . '">Mua vé</a>
                                                </div>
                                                <div class="detail-film">
                                                    <a href="./detail-movie.php?id=' . $row['id'] . '">Chi tiết</a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                            ';
                                }
                                ?>
                            </div>
                            <div class="slick-arrows">
                                <div class="slick-arrow-prev">
                                    <span class="th-dots th-arrow-left th-dots-animated" style="color:#ff8a00">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                </div>
                                <div class="slick-arrow-next">
                                    <span class="th-dots th-arrow-right th-dots-animated" style="color:#ff8a00">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </section>
    <div class="block-ev">
        <div class="container">
            <div class="content-banner">
                <h1>
                    EVENT
                </h1>
                <div class="event">
                    <div class="event-main">
                        <div class="event-head">
                            <ul>
                                <li><img src="../image/banner/ev1.jpg" alt="ev1"></li>
                                <li><img src="../image/banner/ev2.jpg" alt="ev2"></li>
                            </ul>
                            <ul>
                                <li><img src="../image/banner/ev3.jpg" alt="ev3"></li>
                                <li><img src="../image/banner/ev4.jpg" alt="ev4"></li>
                            </ul>
                        </div>
                        <div class="event-bottom">
                            <img src="../image/banner/ev7.jpg" alt="ev4">
                        </div>
                    </div>
                    <div class="event-right">
                        <ul>
                            <li><img src="../image/banner/ev5.jpg" alt="ev1"></li>
                            <li><img src="../image/banner/ev6.jpg" alt="ev2"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section-solid-long section-text-white position-relative">
        <div class="d-background" data-image-src="../image/banner/tat-mode.png" data-parallax="scroll"></div>
        <div class="d-background bg-gradient-black"></div>
        <div class="container position-relative">
            <div class="section-head">
                <h2 class="section-title text-uppercase">Sắp ra mắt</h2>
            </div>
            <div class="slick-spaced slick-carousel" data-slick-view="navigation single">
                <div class="slick-slides">
                    <?php
                    $sql = "SELECT phim.hinh_anh, phim.ten, phim.id, phim.trailer, loai_phim.ten_loai, phim.ngay_cong_chieu, phim.thoi_luong, phim.tom_tat FROM phim, loai_phim WHERE phim.loai_phim_id = loai_phim.id AND phim.trang_thai = 'Sắp chiếu'";
                    $result = executeResult($sql);
                    foreach ($result as $row) {
                        echo '
                                <div class="slick-slide">
                                <article class="movie-line-entity">
                                    <div class="entity-preview">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <img class="embed-responsive-item" style="object-fit: contain;" src="../image/phim/' . $row['hinh_anh'] . '" alt="' . $row['ten'] . '" />
                                        </div>
                                        <div class="d-over">
                                            <div class="entity-play">
                                                <a class="action-icon-theme action-icon-bordered rounded-circle" href= "' . $row['trailer'] . '" data-magnific-popup="iframe">
                                                    <span class="icon-content"><i class="fas fa-play"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="entity-content">
                                        <h4 class="entity-title">
                                            <a class="content-link" href="./detail-movie.php?id=' . $row['id'] . '">' . $row['ten'] . '</a>
                                        </h4>
                                        <div class="entity-category">
                                            <a class="content-link" href="movies-blocks.html">' . $row['ten_loai'] . '</a>
                                        </div>
                                        <div class="entity-info">
                                            <div class="info-lines">
                                                <div class="info info-short">
                                                    <span class="text-theme info-icon"><i class="fas fa-calendar-alt"></i></span>
                                                    <span class="info-text">' . $row['ngay_cong_chieu'] . '</span>
                                                </div>
                                                <div class="info info-short">
                                                    <span class="text-theme info-icon"><i class="fas fa-clock"></i></span>
                                                    <span class="info-text">' . $row['thoi_luong'] . '</span>
                                                    <span class="info-rest">&nbsp;phút</span>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-short entity-text">' . $row['tom_tat'] . '
                                        </p>
                                    </div>
                                </article>
                            </div>
                        ';
                    }
                    ?>
                </div>
                <div class="slick-arrows">
                    <div class="slick-arrow-prev">
                        <span class="th-dots th-arrow-left th-dots-animated">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                    <div class="slick-arrow-next">
                        <span class="th-dots th-arrow-right th-dots-animated">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-long">
    </section>
    <section>
        <div class="gmap-with-map">
            <iframe class="gmap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6570604823937!2d105.78272751531402!3d21.046403592550753!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abb158a2305d%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1646707097614!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 ml-lg-auto">
                        <div class="gmap-form bg-white">
                            <h4 class="form-title text-uppercase">Liên hệ
                                <span class="text-theme">chúng tôi</span>
                            </h4>
                            <p class="form-text">Chúng tôi luôn tiếp nhận phản hồi từ bạn</p>
                            <form autocomplete="off">
                                <div class="row form-grid">
                                    <div class="col-sm-6">
                                        <div class="input-view-flat input-group">
                                            <input class="form-control" name="name" type="text" placeholder="Họ và tên" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-view-flat input-group">
                                            <input class="form-control" name="email" type="email" placeholder="Email" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="input-view-flat input-group">
                                            <textarea class="form-control" name="message" placeholder="Lời nhắn"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="px-5 btn btn-theme" type="submit">Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
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