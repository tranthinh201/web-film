<?php
  include('../config/db.php');
  include('../config/sql_cn.php');
  
  $sql = "SELECT COUNT(phong_chieu.id), SUM(phong_chieu.so_luong_day), SUM(phong_chieu.so_luong_cot) FROM phong_chieu";
  $query = mysqli_query($connect, $sql);
  $item  = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
      include('./include/library.php');
    ?>
    <title>Lịch chiếu phim</title>
</head>
<body>
<?php
  include('./include/header.php');
?>
<div class="banner-lich-chieu">
  <img src="../assets/image/banner/banner-lich-chieu.jpg" alt="bannẻ page lịch chiếu" class="w-100">
</div>

<div class="contnt-cinema">
  <div class="container">
    <div class="d-flex p-2 h4">
      <div class="p-2 h5">
        Phủ Lý
      </div>
      <div class="table-price-ticket p-2 border border-primary h6" style="border-color: black !important;">
        <a href="javascript:void(0)">Bảng giá vé</a>
      </div>
    </div>
    <div>
      <span class="pl-2">Tầng 4, TTTM Vincom Plaza Phủ Lý, số 60, đường Biên Hòa, P.Minh Khai, TP.Phủ Lý, T.Hà Nam, Việt Nam</span>
    </div>
    <div>
      <span><b class="border-right px-2">Tổng số phòng chiếu</b> <?= $item['COUNT(phong_chieu.id)'] ?> phòng</span>
      <span><b class="border-right px-2">Tổng số ghế ngồi</b> <?= $item['SUM(phong_chieu.so_luong_day)'] * $item['SUM(phong_chieu.so_luong_cot)'] ?> ghế</span>
    </div>

    <ul class="d-flex justify-content-between p-0 list-menu-lich-chieu my-4">
      <li class="border border-dark w-100 d-flex justify-content-center align-items-center"><a href="#lich-chieu">Lịch chiếu phim</a></li>
      <li class="border-right border-top border-bottom border-dark w-100 d-flex justify-content-center align-items-center"><a href="#vi-tri-rap">Vị trí của rạp</a></li>
      <li class="border-right border-top border-bottom border-dark w-100 d-flex justify-content-center align-items-center"><a href="#huong-dan">Hướng đi tới rạp</a></li>
      <li class="border-right border-top border-bottom border-dark w-100 d-flex justify-content-center align-items-center"><a href="#tien-ich">Tiện ích đi kèm</a></li>
    </ul>
  </div>
</div>

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
                              WHERE phim.id = suat_chieu.phim_id AND suat_chieu.ngay_chieu =  "' . $date->add(new DateInterval('P1D'))->format('Y-m-d') . '"';
                      $query = mysqli_query($connect, $sql);
                  
                        while ($row = mysqli_fetch_array($query)) {?>
                            <div>
                                  <!-- HTML -->
                                    <a href="./chi-tiet-phim.php?id=<?= $row['id']  ?>"><?= $row['ten']  ?></a>
                                  <!-- HTML -->
                              <div class="show-time-box">
                              <?php
                                  $sqlInfor = 'SELECT TIME(gio_bat_dau), TIME(gio_ket_thuc), suat_chieu.id suat, suat_chieu.phong_chieu_id, suat_chieu.dinh_dang_phim_id, suat_chieu.ngay_chieu
                                              FROM suat_chieu, phim
                                              WHERE suat_chieu.phim_id = phim.id
                                              AND suat_chieu.ngay_chieu =  "' . $date->add(new DateInterval('P0D'))->format('Y-m-d') . '"
                                              AND suat_chieu.phim_id = "'.$row['id'].'" 
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
                                                    AND suat_chieu.id =  "'.$rows['suat'].'"';
                
                                  
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
    <div  style="background-color: #f9f6ec;">
      <div class="container">
        <ul>
          <li>Lịch chiếu phim có thể thay đổi và được báo trước</li>
          <li>Thời gian bắt đầu chiếu phim có thể chênh lệch 15 phút do chiếu quảng cáo, giới thiệu phim ra rạp</li>
        </ul>
      </div>
    </div>
</div>

<div class="mt-5" id="vi-tri-rap">
  <div class="container">
    <div class="text-address">
      <h4 class="p-2">Vị trí của rạp chiếu</h4>
    </div>
    <div class="maps">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12524.713903500506!2d105.79341840623455!3d21.047896623520497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5c357d21c785ea3d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyDEkGnhu4duIEzhu7Fj!5e0!3m2!1svi!2s!4v1655270027379!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
</div>

<?php include('./include/footer.php'); ?>
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
    padding: 20px;
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

<script src="../js/jquery-3.6.0.min.js"></script>
<script src="../slick/slick.min.js"></script>



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
