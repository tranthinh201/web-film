<?php
  include('../config/db.php');
  include('../config/sql_cn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/lich-chieu.css" rel="stylesheet" type="text/css" />
    <title>Lịch chiếu phim</title>
</head>
<body>
<?php
  $sql = "SELECT phim.ten, suat_chieu.id, loai_phim.ten_loai from phim, loai_phim, suat_chieu where suat_chieu.ngay_chieu > now() AND phim.loai_phim_id = loai_phim.id AND suat_chieu.phim_id = phim.id";
  $result = mysqli_query($connect,$sql);
  while ($row=mysqli_fetch_array($result)) 
      { ?>
            <div class="wrapper">
            <div class="title">
              <h2><?= $row['ten'] ?></h2>
              <ul class="categories">
                <li class="category"><?= $row['ten_loai'] ?></li>
              </ul>
            </div>
            <div class="steps">
              <div class="step step1"></div>
              <div class="step step2"></div>
              <div class="step step3"></div>
            </div>
            
            <div class="showtimes">
              <div class="showtime-header">
                <h6>Thời gian sắp chiếu</h6>
              </div>
              <div class="times-list">
              <?php
                  $data = "SELECT TIME(suat_chieu.gio_bat_dau), suat_chieu.ngay_chieu FROM suat_chieu WHERE suat_chieu.id ='".$row['id']."'";
                  $resultData = executeResult($data);
                  foreach($resultData as $items) {
                    echo '
                      <div class="times active">
                        <p class="date">'.$items['ngay_chieu'].'</p>         
                        <p class="time">'.$items['TIME(suat_chieu.gio_bat_dau)'].'</p>         
                      </div>
                    ';
                  }
                
           
              ?>
       </div>
  <?php } 
  
?>
</body>
</html>