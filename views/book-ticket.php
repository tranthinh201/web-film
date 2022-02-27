<?php include('../config/db.php');
if (isset($_GET['suat_chieu'])) {
    $id       = $_GET['suat_chieu'];
    $nsql      = 'SELECT * FROM suat_chieu, phim WHERE suat_chieu.phim_id = phim.id and suat_chieu.id = "' . $id . '"';
    $query = mysqli_query($connect, $nsql);
    $item  = mysqli_fetch_assoc($query);
    // ten phim

    $ghe = 'SELECT ghe_ngoi.id, vi_tri_day, vi_tri_cot FROM suat_chieu, ghe_ngoi WHERE suat_chieu.phong_chieu_id = ghe_ngoi.phong_chieu_id AND suat_chieu.id = "' . $id . '"';
    $kqghe = executeResult($ghe);

    $ghe_dat = 'SELECT ve_ban.ghe_id FROM suat_chieu, ve_ban WHERE ve_ban.suat_chieu_id = suat_chieu.id AND suat_chieu.id = "' . $id . '"';
    $kqghedat = executeResult($ghe_dat);
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
    <?php include('./include/header.php'); ?>

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
        <div class="screen"></div>
        <div class="row">
            <span class="seat occupied" style="color: white;">A</span>
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'A') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied"><input value="' . $item['vi_tri_cot'] . '" type="text">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'A') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '</div></br>';
                }
            }
            ?>
            <span class="seat occupied" style="color: white;">A</span>
        </div>
        <div class="row">
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'B') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'B') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                }
            }
            ?>
        </div>
        <div class="row">
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'C') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'C') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                }
            }
            ?>
        </div>
        <div class="row">
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'D') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'D') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                }
            }
            ?>
        </div>
        <div class="row">
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'E') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'E') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                }
            }
            ?>
        </div>
        <div class="row">
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'F') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'F') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                }
            }
            ?>
        </div>
        <div class="row">
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'G') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'G') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                }
            }
            ?>
        </div>
        <div class="row">
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'H') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'H') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                }
            }
            ?>
        </div>
        <div class="row">
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'I') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'I') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                }
            }
            ?>
        </div>
        <div class="row">
            <?php
            foreach ($kqghe as $item) {
                if (!empty($kqghedat)) {
                    foreach ($kqghedat as $items) {
                        if ($item['vi_tri_day'] == 'J') {
                            if ($item['id'] == $items['ghe_id']) {
                                echo '<div class="seat occupied">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            } else {
                                echo '<div class="seat">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                            }
                        }
                    }
                } else if ($item['vi_tri_day'] == 'J') {
                    echo '<div class="seat ">' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '</div></br>';
                }
            }
            ?>
        </div>







        <div class="movie-container">
            <label for="movie">Pick a movie:</label>
            <select name="movie" id="movie">
                <option value="10">The Big Lebowski ($10)</option>
                <option value="12">Fargo ($12)</option>
                <option value="8">O Brother ($8)</option>
                <option value="9">No Country for Old Men ($9)</option>
            </select>
        </div>


        <p class="text">
            You have selected <span id="count" style="color: white">0</span> seats for a price of $<span id="total">0</span>
        </p>


</body>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../js/swiper-bundle.min.js"></script>

</html>

<style type="text/css">
    @import url("https://fonts.googleapis.com/css?family=Poppins&display=swap");

    * {
        box-sizing: border-box;
    }

    .movie-container {
        margin: 20px 0;
    }

    .movie-container select {
        background-color: #fff;
        border: 0;
        border-radius: 5px;
        font-size: 14px;
        font-family: inherit;
        margin-left: 10px;
        padding: 5px 15px;
        -moz-appearance: none;
        -webkit-appearance: none;
        appearance: none;
    }

    .container {
        perspective: 100%;
        margin-bottom: 30px;
        background-color: #242333;

    }

    .seat {
        background-color: #444451;
        /* height: 21px; */
        padding: 10px 20px;
        width: 65px;
        margin: 6px;
        /* border-top-left-radius: 10px; */
        /* border-top-right-radius: 10px; */
        text-align: center;
        font-weight: bold;
        color: antiquewhite;
    }

    .seat.selected {
        background-color: #6feaf6;
        color: black;
    }

    .seat.occupied {
        background-color: #fff;
        color: black;

    }

    .seat:nth-of-type(7) {
        margin-right: 28px;
    }

    .seat:nth-last-of-type(7) {
        margin-left: 28px;
    }

    .seat:not(.occupied):hover {
        cursor: pointer;
        transform: scale(1.2);
    }

    .showcase .seat:not(.occupied):hover {
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
        justify-content: center;
    }

    .screen {
        background-color: #fff;
        height: 70px;
        width: 100%;
        margin: 15px 0;
        transform: rotateX(-45deg);
        box-shadow: 0 3px 10px rgba(255, 255, 255, 0.7);
    }

    p.text {
        margin: 5px 0;
    }

    p.text span {
        color: #6feaf6;
    }
</style>

<script>
    const container = document.querySelector(".container");
    const seats = document.querySelectorAll(".row .seat:not(.occupied)");
    const count = document.getElementById("count");
    const total = document.getElementById("total");
    const movieSelect = document.getElementById("movie");


    let ticketPrice = +movieSelect.value;

    // Note: localStorage is not enabled in CodePen for security reasons.
    function populateUI() {
        const selectedSeats = JSON.parse(localStorage.getItem("selectedSeats"));
        if (selectedSeats !== null && selectedSeats.length > 0) {
            seats.forEach((seat, index) => {
                if (selectedSeats.indexOf(index) > -1) seat.classList.add("selected");
            });
        }
        const selectedMovieIndex = localStorage.getItem("selectedMovieIndex");
        if (selectedMovieIndex !== null)
            movieSelect.selectedIndex = selectedMovieIndex;
    }

    function setMovieData(movieIndex, moviePrice) {
        localStorage.setItem("selectedMovieIndex", movieIndex);
        localStorage.setItem("selectedMoviePrice", moviePrice);
    }

    function updateSelectedCount() {
        const selectedSeats = document.querySelectorAll(".row .seat.selected");
        // const seatsIndex = [...selectedSeats].map((seat) => [...seats].indexOf(seat));
        // localStorage.setItem("selectedSeats", JSON.stringify(seatsIndex));
        const selectedSeatsCount = selectedSeats.length;
        count.innerText = selectedSeatsCount;
        total.innerText = selectedSeatsCount * ticketPrice;
        console.log(selectedSeatsCount)
    }

    movieSelect.addEventListener("change", (e) => {
        ticketPrice = +e.target.value;
        // setMovieData(e.target.selectedIndex, e.target.value);
        updateSelectedCount();
    });

    container.addEventListener("click", (e) => {
        if (
            e.target.classList.contains("seat") &&
            !e.target.classList.contains("occupied")
        ) {

            e.target.classList.toggle("selected");
            updateSelectedCount();

        }
    });

    // Init
    // populateUI();
    // updateSelectedCount();
</script>