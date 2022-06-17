<?php
session_start();
include("../config/db.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
?>

<!DOCTYPE html>
<html>

<head>
    <?php include('./include/library.php'); ?>
    <link href='//fonts.googleapis.com/css?family=Roboto:100,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <title>Trang chủ</title>
</head>

<body class="body">
    <?php include "./include/header.php" ?>
    <div class="container" style="padding: 20px;">
        <div class="quiz-window">
          <div class="quiz-window-header">
            <div class="quiz-window-title">Bảng giá</div>
            <!-- <button class="quiz-window-close">&times;</button> -->
          </div>
          <div class="quiz-window-body">
            <div class="gui-window-awards">
              <ul class="guiz-awards-row guiz-awards-header">
                <li class="guiz-awards-header-star">Màu</li>
                <li class="guiz-awards-header-title ">Tên loại ghế</li>
                <li class="guiz-awards-header-track">Giá loại ghế</li>
                <li class="guiz-awards-header-time">Số lượng đặt</li>
              </ul>
              <?php
                $SQL = 'SELECT * FROM loai_ghe';
                $result = executeResult($SQL);
                foreach($result as $row) {
                    echo '
                    <ul class="guiz-awards-row">
                        <li class="guiz-awards-star" style="text-align:center;"><span class="star silverstar" style="margin:auto;"></span></li>
                        <li class="guiz-awards-title" style="text-align:center;">'.$row['ten_ghe'].'</li>
                        <li class="guiz-awards-track"><span class="null">'.$row['phu_thu'].'</span></li>
                        <li class="guiz-awards-time"><span class="null">6</span></li>
                    </ul>
                    ';
                }
              ?>
            </div>
            <div class="guiz-awards-buttons"><a class="guiz-awards-but-back" href="./lich-chieu.php"><i class="fa fa-angle-left"></i>ĐẶT VÉ NGAY NÀO</a></div>
          </div>
        </div>
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

<style>

button, select, input {
  font-family: 'Roboto', sans-serif;
  font-size: 17px;
}
.quiz-window {
  margin: auto;
  border-radius: 4px;
  background: #fff;
  overflow: hidden;
  padding: 30px;
}
.quiz-window-header {
  padding: 20px 15px;
  text-align:center;
  position: relative;
}
.quiz-window-title {
  font-size: 26px;
}
.quiz-window-close {
  position: absolute;
  top:20px;
  right:20px;
  padding:0;
  background:none;
  border:0;
  width: 30px;
  height: 30px;
  font-size: 60px;
  font-weight: 100;
  line-height: 24px;
  color: #777;
  cursor:pointer;
}
.quiz-window-body {
  background-color: #f9f9f9;
}
.guiz-awards-row {
  margin:0;
  padding: 10px 40px;
  list-style: none;
}
.guiz-awards-row:after {
  content: '';
  display: table;
  clear:both;
}
.guiz-awards-row-even {
  background-color: #fff;
}
.guiz-awards-row li {
  display:inline-block;
  vertical-align: top;
  float: left;
}
.guiz-awards-header {
  text-align: center;
  padding: 20px 40px;
}
.guiz-awards-star, .guiz-awards-track, .guiz-awards-time,
.guiz-awards-header-star, .guiz-awards-header-track, .guiz-awards-header-time{
  min-width: 54px;
  text-align: center;
  width: 16%;
}
.guiz-awards-title {
  width: 40%;
  min-width: 160px;
  font-size: 18px;
  font-weight: normal;
  padding-top: 3px;
}
.guiz-awards-header-title {
  width: 40%;
  min-width: 160px;
}
.guiz-awards-subtitle {
  color: #858585;
  font-size: 14px;
  font-weight: 300;
}
.guiz-awards-track, .guiz-awards-time {
  width: 22%;
  min-width: 80px;
  font-size: 18px;
  line-height: 45px
}
.guiz-awards-header-track, .guiz-awards-header-time {
  width: 22%;
  min-width: 80px;
}
.guiz-awards-track .null, .guiz-awards-time .null {
  color:#bababa;
}
.star {
  display:block;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  border: 2px solid #bdc2c1;
  background: #d6d6d6;  
}
.goldstar {
  border-color: #4c8193;
  background: #14b0bf;  
}
.silverstar {
  border-color: gray;
  background: gray;  
}
.bronzestar {
  border-color: #998247;
  background: #aa984b;  
}
.rhodiumstar {
  border-color: #743a7f;
  background: #a0409d;
}
.platinumstar {
  border-color: #10393b;
  background: #2b5770;
}

.guiz-awards-buttons {
  background: #fff;
  text-align: center;
  padding: 20px 0;
}
.guiz-awards-but-back {
  display:inline-block;
  background: none;
  border: 1px solid #61a3e5;
  border-radius: 21px;
  padding: 7px 40px 7px 20px;
  color: #61a3e5;
  font-size: 17px;
  cursor:pointer;
  transition: all .3s ease;
}

.guiz-awards-but-back:hover {
  background: #61a3e5;
  color: #fff;
}

.guiz-awards-but-back i {
  font-size: 26px;
  line-height: 17px;
  margin-right: 20px;
  position: relative;
  top: 2px;
}
</style>