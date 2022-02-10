<?php include('../config/db.php');
if (isset($_GET['id'])) {
    $id       = $_GET['id'];
    $sql      = 'SELECT * FROM phim WHERE phim.id = "' . $id . '"';
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
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/dat-ve.css">
    <link rel="stylesheet" href="../css/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Trang chủ</title>
</head>

<body>
    <nav class="nav-bar">
        <div class="header">
            <div class="logo">
                <img src="../image/logo/spiderman.png" alt="logo" style="width: 80px">
            </div>
            <div class="search-input">
                <input type="text" placeholder="Tìm kiếm tên phim và diễn viên">
                <i class="fa fa-search ps-abs"></i>
            </div>
            <div class="login">
                <i class="fa fa-user me-sm-1"></i>
                <span>Đăng nhập</span>
            </div>
        </div>
        <div class="menu">
            <ul>
                <li><a href="">Mua vé</a></li>
                <li><a href="">Phim</a></li>
                <li><a href="">Góc điện ảnh</a></li>
                <li><a href="">Sự kiện</a></li>
                <li><a href="">Rạp</a></li>
                <li><a href="">Giá vé</a></li>
                <li><a href="">Hỗ trợ</a></li>
                <li><a href="">Thành viên</a></li>
            </ul>
        </div>
    </nav>

    <div class="row-link">
        <ul>
            <li>
                <span>
                    Trang chủ
                </span>
                <i class="bx bx-chevron-right"></i>
            </li>
            <li>
                <span>
                    Đặt vé
                </span>
                <i class="bx bx-chevron-right"></i>
            </li>
            <li class="last-it">
                <span>
                    <?= $item['ten'] ?>
                </span>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="box-movie">
            <div class="image-movie">
                <img src="../image/phim/<?= $item['hinh_anh'] ?>" alt="<?= $item['ten'] ?>">
            </div>
            <div class="infor-movie">
                <div class="name-movie">
                    <h2><?= $item['ten'] ?></h2>
                </div>
                <div class="if-m">
                    <span>
                        <i class="bx bx-time-five"></i>
                    </span>
                    <span><?= $item['thoi_luong'] ?></span>
                </div>
                <div class="if-m">
                    <span>Nhà sản xuất:</span>
                    <span><?= $item['nha_san_xuat'] ?></span>
                </div>
                <div class="if-m">
                    <span>Diễn viên:</span>
                    <span><?= $item['dien_vien'] ?></span>
                </div>
                <div class="if-m">
                    <span>Quốc gia:</span>
                    <span><?= $item['quoc_gia'] ?></span>
                </div>
                <div class="if-m">
                    <span>Thể loại:</span>
                    <span><?= $ten_loai_phim['ten'] ?></span>
                </div>
                <div class="if-m">
                    <span>Ngày:</span>
                    <span><?= $item['ngay_cong_chieu'] ?></span>
                </div>
            </div>
        </div>
        <div class="content-text">
            <div class="infor">
                <h3>Nội dung phim</h3>
                <div class="content-text-actors-info content-text">
                    <span><?= $item['tom_tat'] ?></span>
                </div>
            </div>
        </div>
        <div class="choose-address">
            <div class="infor">
                <h3>Lịch chiếu</h3>
            </div>
            <ul class="address">
                <li>
                    <select>
                        <option value="1">Cả nước</option>
                    </select>
                </li>
                <li>
                    <div>
                        <input type="date">
                    </div>
                </li>
                <li>
                    <select>
                        <option value="1">Tất cả các rạp</option>
                    </select>
                </li>
            </ul>
            <div class="list-cinema">
                <div class="item-cinema">
                    <div class="name-cinema">
                        <span>Rạp Phủ Lý</span>
                    </div>
                    <div class="box-cinema">
                        <div class="infor-cinema">
                            <span>
                                2D - Phụ đề tiếng Việt
                            </span>
                        </div>
                        <div class="time-movie">
                            <ul class="list-time-cinema">
                                <?php
                                $sql = 'SELECT * FROM suat_chieu WHERE phim_id = "' . $id . '"';
                                $result = executeResult($sql);
                                foreach ($result as $row) {
                                    echo '
                                        <li><a href="./book-ticket.php?suat_chieu=' . $row['id'] . '">' . $row['gio_bat_dau'] . '</a></li>
                                    ';
                                }
                                ?>
                            </ul>
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