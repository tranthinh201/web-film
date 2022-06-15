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
<div id="lich-chieu">
  <div class="container">
      <div class="demo-frame">
        <div class="slick slick-tab">
            <?php
              $date = new DateTime();
              for ($i = 1; $i <= 14; $i++) {
                  echo '<div>'. $date->add(new DateInterval('P1D'))->format('d/m') . '</div>';
              }
            ?>
        </div>
        <div class="slick slick-content">
          <?php
            $date = new DateTime();
            for ($i = 0; $i <= 14; $i++) {
                  echo '<div>';
                      $sql = 'SELECT DISTINCT phim.ten, phim.id
                              FROM phim, suat_chieu
                              WHERE phim.id = suat_chieu.phim_id AND phim.id = "'.$id.'"';
                      $query = mysqli_query($connect, $sql);
                  
                        while ($row = mysqli_fetch_array($query)) {?>
                            <div>
                                  
                              <div class="show-time-box">
                              <?php
                                  $sqlInfor = 'SELECT TIME(gio_bat_dau), TIME(gio_ket_thuc), suat_chieu.id suat, suat_chieu.phong_chieu_id, suat_chieu.dinh_dang_phim_id, suat_chieu.ngay_chieu
                                              FROM suat_chieu, phim
                                              WHERE suat_chieu.phim_id = phim.id
                                              AND suat_chieu.ngay_chieu =  "' . $date->add(new DateInterval('P1D'))->format('Y-m-d') . '"
                                              AND phim.id = "'.$id.'" 
                                              ORDER BY suat_chieu.gio_bat_dau ASC';

                                  $q = mysqli_query($connect, $sqlInfor);

                                  while ($rows = mysqli_fetch_array($q)) {?>
                                      <?php
                                        $sumSeat = 'SELECT  COUNT(ghe_ngoi.vi_tri_cot)
                                                    FROM ghe_ngoi, phong_chieu
                                                    WHERE phong_chieu.id = ghe_ngoi.phong_chieu_id
                                                    AND ghe_ngoi.phong_chieu_id = '.$rows['phong_chieu_id'].'';
                                              $querySum = mysqli_query($connect, $sumSeat);
                                              $itemSum  = mysqli_fetch_assoc($querySum);

                                        $sqlSeat = 'SELECT suat_chieu.id, COUNT(ve_ban.suat_chieu_id)
                                                    FROM suat_chieu, phim, ve_ban
                                                    WHERE suat_chieu.phim_id = phim.id
                                                    AND suat_chieu.id = ve_ban.suat_chieu_id
                                                    AND suat_chieu.id =  "'.$rows['suat'].'"
                                                    AND phim.id = "'.$id.'"';
                                        
                                        $querySeat = mysqli_query($connect, $sqlSeat);
                                        $item  = mysqli_fetch_assoc($querySeat);
                                      ?>
                                      <div class="show-time">
                                          <div class="dinh-dang">
                                            <?= $rows['dinh_dang_phim_id']  ?> | Phụ đề
                                          </div>
                                          <a href="./book-ticket.php?suat_chieu=<?= $rows['suat']  ?>" class="btn-time btn btn-show-time" aria-disabled="true">
                                            
                                          <div class="phong-chieu">
                                            <span>
                                              SCREEN <?= $rows['phong_chieu_id']  ?>
                                            </span>
                                          </div>
  
                                          <div class="time-start">
                                            <?= date('H:i', strtotime($rows['TIME(gio_bat_dau)'])) ?>
                                          </div>
  
                                          <div class="seat-sum">
                                              <?= $item['COUNT(ve_ban.suat_chieu_id)']  ?> /
                                              <?= $itemSum['COUNT(ghe_ngoi.vi_tri_cot)']   ?>
                                          </div>
  
                                          </a>
                                      </div>
                                  <?php } ?> 
                              </div> 
                        <?php } ?>
                            </div>
                  </div>
              <?php } ?>          
          </div>
    </div>
</div>


<?php
  include('./include/footer.php');
?>
</body>
</html>

<style>
  .list-menu-lich-chieu > li{
    height: 50px;
  }

  .list-menu-lich-chieu > li > a {
    color: black;
    font-weight: bold;
    font-size: 17px;
  }

  .list-menu-lich-chieu > li:first-child {
    background-color: #ff8a00;
  }

  .list-menu-lich-chieu > li:first-child > a {
    color: white;
  }

  
  .demo-frame{
    width: 100%;
    padding: 20px 0;
  }
  
  .slick-slider .slick-arrow,
  .slick-slider .slick-dots{
    display:none !important
  }



  .slick-tab .slick-slide {
        padding:5px 35px;
        text-align: center;
        background-color: white;
  }
  .slick-tab .slick-current{
    border-bottom:solid 2px blue
  }

  .slick-content .slick-slide{
    background: white;
    padding:15px;min-height: 200px;
  }
  

  .btn-show-time {
    background-color: white;
    color: black;
    border: 1px solid #e5e5e5;
  }

  #lich-chieu {
    background-color: #f9f6ec;
  }

  .phong-chieu, .seat-sum, .time-start {
    border-bottom: 1px solid #e5e5e5;
    margin-bottom: 2px;
  }


  .show-time-box {
    display: flex;
  }

  .show-time {
    margin: 10px;
  }
</style>



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

<script>
        $('.slick-tab').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            asNavFor: '.slick-content',
            dots: true,           
            focusOnSelect: true,
            infinite: false,
            variableWidth: true
        });

        $('.slick-content').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slick-tab',
            infinite: false
        });
        
    </script>
