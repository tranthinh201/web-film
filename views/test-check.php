
  <?php include('../config/db.php');
session_start();
if (!isset($_SESSION['user-client'])) {
    echo '<script>alert("dang nhap di cu")</script>';
    header("Location: /phim/views/login.php");
}
if (isset($_GET['suat_chieu'])) {
    $id       = $_GET['suat_chieu'];
    $nsql      = 'SELECT suat_chieu.phong_chieu_id, suat_chieu.dinh_dang_phim_id, phim.ngon_ngu, phim.ten, phim.thoi_luong, phim.gioi_han_tuoi, phim.hinh_anh, loai_phim.ten_loai FROM loai_phim, suat_chieu, phim WHERE suat_chieu.phim_id = phim.id and suat_chieu.id = "' . $id . '"';
    $query = mysqli_query($connect, $nsql);
    $item  = mysqli_fetch_assoc($query);
   

    $data = "SELECT ghe_ngoi.id, ve_ban.suat_chieu_id, ghe_ngoi.vi_tri_day, ghe_ngoi.vi_tri_cot, ghe_ngoi.loai_ghe_id
                FROM ghe_ngoi
                LEFT JOIN ve_ban
                ON ghe_ngoi.id = ve_ban.ghe_id AND  ve_ban.suat_chieu_id = '$id'
                LEFT JOIN suat_chieu
                ON suat_chieu.id = ve_ban.suat_chieu_id 
                LEFT JOIN phong_chieu
                ON phong_chieu.id = ghe_ngoi.phong_chieu_id
                WHERE phong_chieu.id = ".$item['phong_chieu_id']."
                ORDER BY ghe_ngoi.id ASC";
     var_dump($data);

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Movie Seat Booking</title>
  </head>
  <body>
    <div class="movie-container">
      <label> Select a movie:</label>
      <select id="movie">
        <option value="220">Godzilla vs Kong (RS.220)</option>
        <option value="320">Radhe (RS.320)</option>
        <option value="250">RRR (RS.250)</option>
        <option value="260">F9 (RS.260)</option>
      </select>
    </div>

    <ul class="showcase">
      <li>
        <div class="seat"></div>
        <small>Available</small>
      </li>
      <li>
        <div class="seat selected"></div>
        <small>Selected</small>
      </li>
      <li>
        <div class="seat sold"></div>
        <small>Sold</small>
      </li>
    </ul>
    <div class="container">
      <div class="screen"></div>

      <div class="row">
        <?php
          $resultData = executeResult($data);
         
          foreach($resultData as $value) {
            if($value['vi_tri_day'] == "A") {
              if($value['suat_chieu_id'] == NULL) {
                echo '
                  <div class="seat" type-seat= "'.$value['loai_ghe_id'].'" id-seat="'.$value['id'].'">'.$value['vi_tri_cot'].''.$value['vi_tri_day'].'</div>
                ';
              }
              else {
                echo '
                  <div class="seat sold" type-seat= "'.$value['loai_ghe_id'].'" id-seat="'.$value['id'].'">'.$value['vi_tri_cot'].''.$value['vi_tri_day'].'</div>
                ';
              }
            } 
          }
        ?>
      </div>

    <p class="text">
      You have selected <span id="count">0</span> seat for a price of RS.<span
        id="total"
        >0</span
      >
    </p>
    <script src="script.js"></script>
  </body>
</html>


<script>
    const container = document.querySelector(".container");
const seats = document.querySelectorAll(".row .seat:not(.sold)");
const count = document.getElementById("count");
const total = document.getElementById("total");
const movieSelect = document.getElementById("movie");



// Seat click event
container.addEventListener("click", (e) => {
  if (
    e.target.classList.contains("seat") &&
    !e.target.classList.contains("sold")
  ) {
    e.target.classList.toggle("selected");

  }
});

</script>


<style>
    @import url("https://fonts.googleapis.com/css?family=Lato&display=swap");

* {
  box-sizing: border-box;
}

body {
  background-color: #242333;
  color: #fff;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 100vh;
  font-family: "Lato", sans-serif;
  margin: 0;
}

.movie-container {
  margin: 20px 0;
}

.movie-container select {
  background-color: #fff;
  border: 0;
  border-radius: 5px;
  font-size: 16px;
  margin-left: 10px;
  padding: 5px 15px 5px 15px;
  -moz-appearance: none;
  -webkit-appearance: none;
  appearance: none;
}

.container {
  perspective: 1000px;
  margin-bottom: 30px;
}

.seat {
  background-color: #444451;
  margin: 3px;
  font-size: 50px;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.seat.selected {
  background-color: green;
}

.seat.sold {
  background-color: #fff;
  color: black
}

.seat:nth-of-type(2) {
  margin-right: 18px;
}

.seat:nth-last-of-type(2) {
  margin-left: 18px;
}

.seat:not(.sold):hover {
  cursor: pointer;
  transform: scale(1.2);
}

.showcase .seat:not(.sold):hover {
  cursor: default;
  transform: scale(1);
}

.showcase {
  background: rgba(0, 0, 0, 0.1);
  padding: 5px 10px;
  border-radius: 5px;
  color: #777;
  list-style-type: none;
  display: flex;
  justify-content: space-between;
}

.showcase li {
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 10px;
}
.showcase li small {
  margin-left: 2px;
}

.row {
  display: flex;
}

.screen {
  background-color: #fff;
  height: 120px;
  width: 100%;
  margin: 15px 0;
  transform: rotateX(-48deg);
  box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
}

p.text{
    margin: 5px 0;
}

p.text span{
    color: rgb(158, 248, 158);
}
</style>