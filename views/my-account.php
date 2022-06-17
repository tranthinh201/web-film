<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include('../config/db.php');
        include('./include/library.php');
        $ACCOUNT = 'SELECT id FROM khach_hang where email = "' . $_SESSION['user-client'] . '"';
        $query_up = mysqli_query($connect, $ACCOUNT);
        $row_up = mysqli_fetch_assoc($query_up);
    ?>
    <title>Tài khoản của tôi</title>
</head>
<body>
    <?php
        include('./include/header.php');
    ?>

    <div class="main">
        <div class="container">
            <h2 class="" style="text-align: center; font-weight:bold;">
                Danh sách vé đã đặt
            </h2>
            <div class="infor-ticket">
                <?php
                    $SQL = "SELECT ve_ban.id ve_id, ve_ban.ngay_ban, ve_ban.tong_tien, ve_ban.suat_chieu_id, suat_chieu.gio_bat_dau, suat_chieu.gio_ket_thuc, phim.ten, phim.hinh_anh, suat_chieu.phong_chieu_id
                            FROM ve_ban, khach_hang, suat_chieu, phim
                            WHERE khach_hang.id = ve_ban.khach_hang_id 
                            AND suat_chieu.id = ve_ban.suat_chieu_id
                            AND suat_chieu.phim_id = phim.id 
                            AND khach_hang.id = ve_ban.khach_hang_id and khach_hang.id = '".$row_up['id']."'";
                    $result = executeResult($SQL);
                    foreach($result as $row) {
                        echo'
                            <ul>
                                <li>'.$row['ve_id'].'</li>
                                <li>'.$row['tong_tien'].'</li>
                                <li>'.$row['gio_bat_dau'].'</li>
                                <li>'.$row['gio_ket_thuc'].'</li>
                                <li>'.$row['ten'].'</li>
                                <li>
                                    <img src="../image/phim/'.$row['hinh_anh'].'" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="'.$row['ten'].'">
                                </li>
                                <li>'.$row['phong_chieu_id'].'</li>
                            </ul>
                        ';
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        include('./include/footer.php');
    ?>
</body>
</html>

<style>
    .main {
        padding: 20px 0;
        background: #faf7ee;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }


</style>