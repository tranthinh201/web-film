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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

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
        <!-- <div class="input-box-wrapper">
            <div class="box">
                <input type="checkbox" value="Javascript" class="checkbox" id="Javascript">
                <label for="Javascript"><i class="fa-solid fa-square"></i></label>
            </div>
            <div class="box">
                <input type="checkbox" value="Java" class="checkbox" id="Java">
                <label for="Java"><i class="fa-solid fa-square"></i></label>
            </div>
            <div class="box">
                <input type="checkbox" value="ReactJS" class="checkbox" id="ReactJS">
                <label for="ReactJS"><i class="fa-solid fa-square"></i></label>
            </div>

        </div> -->

        <div class="print-value">
            <p id="value-list" style="color: white; "></p>
        </div>
        <div class="input-box-wrapper">
            <div class="box">

                <?php
                foreach ($kqghe as $item) {
                    if (!empty($kqghedat)) {
                        foreach ($kqghedat as $items) {
                            if ($item['vi_tri_day'] == 'A') {
                                if ($item['id'] == $items['ghe_id']) {
                                    echo ' <input type="checkbox" value="' . $item['id'] . '" class="checkbox" id="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '" disabled>
                                <label style="color:pink;" for="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '"><i class="fa-solid fa-square"></i></label>';
                                } else {
                                    echo ' <input type="checkbox" value="' . $item['id'] . '" class="checkbox" id="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '">
                                <label for="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '"><i class="fa-solid fa-square"></i></label>';
                                }
                            }
                        }
                    } else if ($item['vi_tri_day'] == 'A') {
                        echo ' <input type="checkbox" value="' . $item['id'] . '" class="checkbox" id="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '">
                                <label for="' . $item['vi_tri_cot'] . '' . $item['vi_tri_day'] . '"><i class="fa-solid fa-square"></i></label>';
                    }
                }
                ?>
            </div>

        </div>



</body>
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="../js/swiper-bundle.min.js"></script>

</html>

<style type="text/css">
    .container {
        position: relative;
        width: 600px;
        background-color: #232234;
        padding: 24px;
        margin: 30px auto;
    }

    .container .title {
        font-size: 2rem;
        text-align: center;
        color: white;
        text-transform: capitalize;
    }

    .container .input-box-wrapper {
        position: relative;
    }

    .input-box-wrapper .box {
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #383854;
        border-bottom: 0;
        padding: 14px 10px;
    }



    .input-box-wrapper>.box>label {
        color: white;
        text-transform: capitalize;
        margin-left: 20px;
        display: block;
        cursor: pointer;
        width: 100%;
    }


    .input-box-wrapper .box .checkbox {
        position: relative;
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    input[type="checkbox"] {
        display: none;
    }
</style>

<script>
    var list = document.getElementById('value-list');
    var text = '<span>Bạn đã chọn: </span>';
    var listArray = [];
    var checkboxs = document.querySelectorAll('.checkbox');
    var text2 = document.querySelectorAll('.input-box-wrapper>.box>label');
    var hehe = document.querySelectorAll('#value-list>p');
    console.log(listArray)
    for (var check of checkboxs) {
        check.addEventListener('click', function() {
            if (this.checked == true) {
                listArray.push(this.id);
                list.innerHTML = text + listArray.join(' , ');
                for (var test of text2) {
                    if (test.htmlFor == this.id) {
                        test.style.color = 'red';
                    }
                }

            } else {
                listArray = listArray.filter(e => e !== this.id);
                list.innerHTML = text + listArray.join(' , ');
                for (var test of text2) {
                    if (test.htmlFor == this.id) {
                        test.style.color = 'white';
                    }
                }
            }
        })
    }
</script>