<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
        include('../config/db.php');
        include('../config/sql_cn.php');
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
            <div class="infor-ticket">
                <?php
                    $SQLSC = "SELECT DISTINCT ve_ban.suat_chieu_id, phim.ten, TIME(suat_chieu.gio_bat_dau), TIME(suat_chieu.gio_ket_thuc), phim.hinh_anh, ve_ban.ngay_ban, suat_chieu.ngay_chieu
                                FROM ve_ban, khach_hang, suat_chieu, phim
                                WHERE khach_hang.id = ve_ban.khach_hang_id 
                                AND suat_chieu.id = ve_ban.suat_chieu_id 
                                AND khach_hang.id = ve_ban.khach_hang_id
                                AND suat_chieu.phim_id = phim.id
                                AND khach_hang.id = '".$row_up['id']."'
                                AND ve_ban.da_huy = 0";
                    $SC = executeResult($SQLSC);
            
                    if(empty($result)) {
                        echo '<div class ="empty-result">
                                Bạn chưa mua vé nào của chúng tôi ~.~
                                <br>
                            <a href="./movies-list.php">Đặt vé nào <3</a>
                            </div>';
                    } else {
                        echo '
                        <h2 class="" style="text-align: center; font-weight:bold;">
                            Danh sách vé đã đặt
                        </h2>
                        ';
                        foreach($SC as $row) {
                            echo'
                            <div class="container-box-ticket">
                            <div class="box-ticket">
                                <div class="image">
                                    <img src="../image/phim/'.$row['hinh_anh'].'"/>
                                </div>
                                <div class="box-infor">
                                    <span>Phim: '.$row['ten'].'</span>
                                    <div class="">
                                        <span>Thời gian chiếu: </span><span>'.$row['TIME(suat_chieu.gio_bat_dau)'].' ~ '.$row['TIME(suat_chieu.gio_ket_thuc)'].'</span>
                                    </div>
                                    <span>Ngày: '.$row['ngay_chieu'].'</span>
                                </div>
                            </div>
                            ';
                            $VE = "SELECT ve_ban.id, ghe_ngoi.vi_tri_day, ghe_ngoi.vi_tri_cot, ve_ban.tong_tien 
                                FROM suat_chieu, khach_hang, ve_ban, ghe_ngoi
                                WHERE ve_ban.suat_chieu_id = suat_chieu.id
                                AND ve_ban.ghe_id = ghe_ngoi.id
                                AND ve_ban.suat_chieu_id = '".$row['suat_chieu_id']."'
                                AND khach_hang.id = ve_ban.khach_hang_id
                                AND khach_hang.id = '".$row_up['id']."'
                                AND ve_ban.da_huy = 0";
                               
                            $RS = mysqli_query($connect, $VE);
                            $sum = 0;
                            echo'<div class="box-remove">';
                            echo'<div style="font-size:18px;">Danh sách ghế đã đặt:</div>';
                            while($rows = mysqli_fetch_array($RS)) {?>
                                    <div class="box-ticket-remove">
                                        <?=$rows['vi_tri_cot']?><?=$rows['vi_tri_day']?>
                                        <a href="./include/delete-ticket.php?id=<?=$rows['id']?>" onclick="return Del('<?= $rows['id'] ?>')"><i class="fas fa-times"></i></a>
                                    </div>
                                    <?php  $sum += $rows['tong_tien']?>
                            <?php } 
                            echo '</div>';
                            echo '<span style="font-size:18px;">Tổng tiền: '.number_format($sum, 0, ''. '.').'đ</span>';
                            echo '</div>';
                        }

                    }
                   
                    ?>
            </div>
            <span class="badge badge-warning">Sau khi bạn huỷ vé tiền sẽ trả về tài khoản sau 30 phút</span>
            <span class="badge badge-warning">Bạn sẽ không thể huỷ vé trước 30p khi phim chiếu</span>
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

    .read-more-state {
            display: none;
    }

    .read-more-target {
        opacity: 0;
        max-height: 0;
        font-size: 0;
        transition: .25s ease;
    }

    .read-more-state:checked ~ .read-more-wrap .read-more-target {
        opacity: 1;
        font-size: inherit;
        max-height: 999em;
    }

    .read-more-state ~ .read-more-trigger:before {
        content: 'Show more';
    }

    .read-more-state:checked ~ .read-more-trigger:before {
        content: 'Show less';
    }

    .read-more-trigger {
        cursor: pointer;
        display: inline-block;
        padding: 0 .5em;
        color: #666;
        font-size: .9em;
        line-height: 2;
        border: 1px solid #ddd;
        border-radius: .25em;
    }

    /* Other style */ 
    .empty-result {
        text-align: center;
        padding: 300px;
        font-size: 40px;
        font-weight: bold;
    }
    
    .box-ticket {
        display: flex;
    }

    .box-ticket > .image > img {
        width: 150px;
    }

    .box-ticket > .box-infor {
        margin-left: 20px;
    }

    .box-ticket > .box-infor {
        display: flex;
        flex-direction: column;
    }

    .box-ticket > .box-infor span{
        font-size: 16px;
        font-weight: 700;
    }

    .box-infor > button {
        border: 1px solid;
        color: orange;
        background-color: #ddd;
        width: 100px;
    }

    .box-ticket-remove {
        border: 1px solid;
        width: 50px;
        display: flex;
        justify-content: space-around;
        margin: 5px;
    }
   
    .box-remove {
        display: flex;
        align-items: center;
    }

    .container-box-ticket {
        padding: 10px;
        border-bottom: 1px solid;
    }
        

</style>

<script type="text/javascript">
    function Del(id) {
        return confirm("Bạn có chắc chắn muốn huỷ vé này không?");
    }
</script>