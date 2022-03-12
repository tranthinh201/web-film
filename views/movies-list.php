
<?php include('../config/db.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>THcinema</title>
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css" />
</head>

<body class="body">
    <?php include './include/header.php' ?>
    <section class="after-head d-flex section-text-white position-relative">
        <div class="d-background" data-parallax="scroll">
            <img style="width: 100%;height: 100%;" src="../image/banner/banner.jpg"  alt="">
        </div>
        <div class="d-background bg-black-80"></div>
        <div class="top-block top-inner container">
            <div class="top-block-content">
                <h1 class="section-title">Movies list</h1>
                <div class="page-breadcrumbs">
                    <a class="content-link" href="#">Home</a>
                    <span class="text-theme mx-2"><i class="fas fa-chevron-right"></i></span>
                    <span>Movies</span>
                </div>
            </div>
        </div>
    </section>
    <div class="tabs">
        <div class="tab-2">
            <label for="tab2-1" class="border-bottom">PHIM ĐANG CHIẾU</label>
            <input id="tab2-1" class="mr-t-1px" name="tabs-two" type="radio" checked="checked">
            <div class="tab-ui">
                <?php
                $sql = "SELECT * FROM phim WHERE trang_thai = 'Đang chiếu' AND da_xoa = '0'";
                $result = executeResult($sql);
                foreach ($result as $items) {
                    echo '
                    <div class="item-movie">
                        <div class="image-movie">
                            <img src="../image/phim/' . $items['hinh_anh'] . '" alt="phim">
                            <div class="booking-movie">
                                <a href="./dat-ve.php?id=' . $items['id'] . '" class="button">Đặt vé</a>
                            </div>
                        </div>
                        <div class="name-movie">
                        <a href="./dat-ve.php?id=' . $items['id'] . '" class="button"><span>' . $items['ten'] . '</span></a>
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
        <div class="tab-2" >
            <label for="tab2-2" class="border-bottom">PHIM SẮP CHIẾU</label>
            <input id="tab2-2" class="mr-t-1px" name="tabs-two" type="radio">
            <div class="tab-ui">
                <div class="item-movie">
                    <div class="image-movie">
                        <img src="https://www.galaxycine.vn/media/2021/12/7/1350x900_1638861163467.jpg" alt="phim">
                        <div class="booking-movie">
                            <a href="./mua-ve.php?id" class="button">Đặt vé</a>
                        </div>
                    </div>
                    <div class="name-movie">
                        <span>SPIDER-MAN NO WAY HOME</span>
                    </div>
                </div>
                <div class="item-movie">
                    <div class="image-movie">
                        <img src="https://www.galaxycine.vn/media/2021/12/7/1350x900_1638861163467.jpg" alt="phim">
                        <div class="booking-movie">
                            <a href="./mua-ve.php?id" class="button">Đặt vé</a>
                        </div>
                    </div>
                    <div class="name-movie">
                        <span>SPIDER-MAN NO WAY HOME</span>
                    </div>
                </div>
                <div class="item-movie">
                    <div class="image-movie">
                        <img src="https://www.galaxycine.vn/media/2021/12/7/1350x900_1638861163467.jpg" alt="phim">
                        <div class="booking-movie">
                            <a href="./mua-ve.php?id" class="button">Đặt vé</a>
                        </div>
                    </div>
                    <div class="name-movie">
                        <span>SPIDER-MAN NO WAY HOME</span>
                    </div>
                </div>
                <div class="item-movie">
                    <div class="image-movie">
                        <img src="https://www.galaxycine.vn/media/2021/12/7/1350x900_1638861163467.jpg" alt="phim">
                        <div class="booking-movie">
                            <a href="./mua-ve.php?id" class="button">Đặt vé</a>
                        </div>
                    </div>
                    <div class="name-movie">
                        <span>SPIDER-MAN NO WAY HOME</span>
                    </div>
                </div>
                <div class="item-movie" >
                    <div class="image-movie">
                        <img src="https://www.galaxycine.vn/media/2021/12/7/1350x900_1638861163467.jpg" alt="phim">
                        <div class="booking-movie">
                            <a href="./mua-ve.php?id" class="button">Đặt vé</a>
                        </div>
                    </div>
                    <div class="name-movie">
                        <span>SPIDER-MAN NO WAY HOME</span>
                    </div>
                </div>
                <div class="item-movie" >
                    <div class="image-movie">
                        <img src="https://www.galaxycine.vn/media/2021/12/7/1350x900_1638861163467.jpg" alt="phim">
                        <div class="booking-movie">
                            <a href="./mua-ve.php?id" class="button">Đặt vé</a>
                        </div>
                    </div>
                    <div class="name-movie">
                        <span>SPIDER-MAN NO WAY HOME</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <script src="../js/script.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ4Qy67ZAILavdLyYV2ZwlShd0VAqzRXA&callback=initMap"></script>
    <script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>
</body>

</html>