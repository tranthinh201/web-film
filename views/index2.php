<?php include('../config/db.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css" />

    <title>Trang chủ</title>
</head>

<body>
    <!-- header-start -->
    <?php include('./include/header.php');

    ?>
    <!-- header-end -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><img src="https://www.galaxycine.vn/media/2022/1/19/banner-2048x682_1642609806386.jpg" alt="logo"></div>
            <div class="swiper-slide"><img src="https://www.galaxycine.vn/media/2022/1/19/banner-2048x682_1642609806386.jpg" alt="logo"></div>
            <div class="swiper-slide"><img src="https://www.galaxycine.vn/media/2022/1/19/banner-2048x682_1642609806386.jpg" alt="logo"></div>
            <div class="swiper-slide"><img src="https://www.galaxycine.vn/media/2022/1/19/banner-2048x682_1642609806386.jpg" alt="logo"></div>
            <div class="swiper-slide"><img src="https://www.galaxycine.vn/media/2022/1/19/banner-2048x682_1642609806386.jpg" alt="logo"></div>
            <div class="swiper-slide"><img src="https://www.galaxycine.vn/media/2022/1/19/banner-2048x682_1642609806386.jpg" alt="logo"></div>
            <div class="swiper-slide"><img src="https://www.galaxycine.vn/media/2022/1/19/banner-2048x682_1642609806386.jpg" alt="logo"></div>
            <div class="swiper-slide"><img src="https://www.galaxycine.vn/media/2022/1/19/banner-2048x682_1642609806386.jpg" alt="logo"></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>


    <div class="tabs">
        <div class="tab-2">
            <label for="tab2-1" class="border-bottom">PHIM ĐANG CHIẾU</label>
            <input id="tab2-1" class="mr-t-1px" name="tabs-two" type="radio" checked="checked">
            <div class="tab-ui">
                <?php
                $sql = "SELECT * FROM phim WHERE trang_thai = 'Đang chiếu'";
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
                    
                        <span>' . $items['ten'] . '</span>
                        
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>
        </div>
        <div class="tab-2">
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
            </div>
        </div>
    </div>


</body>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../js/swiper-bundle.min.js"></script>

</html>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 2000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });


    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);

    const tabs = $$(".tab-item");
    const panes = $$(".tab-pane");

    const tabActive = $(".tab-item.active");
    const line = $(".tabs .line");

    line.style.left = tabActive.offsetLeft + "px";
    line.style.width = tabActive.offsetWidth + "px";

    tabs.forEach((tab, index) => {
        const pane = panes[index];

        tab.onclick = function() {
            $(".tab-item.active").classList.remove("active");
            $(".tab-pane.active").classList.remove("active");

            line.style.left = this.offsetLeft + "px";
            line.style.width = this.offsetWidth + "px";

            this.classList.add("active");
            pane.classList.add("active");
        };
    });
</script>

<style>
    .swiper {
        width: 100%;

    }

    .swiper-slide {
        text-align: center;
        background: #fff;


        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
        object-fit: cover;

    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.5s linear;
    }

    .swiper {
        margin-left: auto;
        margin-right: auto;
    }

    .swiper-pagination-bullet-active {
        background-color: orange !important;
        transition: all 0.1s linear;
    }
</style>