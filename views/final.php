<?php
       include('../config/db.php');
       require_once("../config/sql_cn.php");
       include('./include/library.php');
       session_start();

           // code...
            $length = count($_SESSION['counter']);
            $id = $_GET['id'];
            $date = date('Y-m-d');
            $ACCOUNT = 'SELECT id FROM khach_hang where email = "' . $_SESSION['user-client'] . '"';
            $query_up = mysqli_query($connect, $ACCOUNT);
            $row_up = mysqli_fetch_assoc($query_up);

            for($i = 0; $i < $length; $i++) 
            {
                $GHE = "SELECT ghe_ngoi.vi_tri_day, ghe_ngoi.vi_tri_cot, ghe_ngoi.id, loai_ghe.phu_thu FROM ghe_ngoi, loai_ghe 
                        WHERE ghe_ngoi.loai_ghe_id = loai_ghe.id 
                        AND ghe_ngoi.id = ".$_SESSION['counter'][$i]."";
                $result = executeResult($GHE);
                foreach ($result as $row) {
                    $SQL = "INSERT INTO ve_ban(ghe_id, suat_chieu_id, ngay_ban, tong_tien, khach_hang_id, da_huy) VALUES(".$_SESSION['counter'][$i].", '".$id."', '".$date."', ".$row['phu_thu'].", '".$row_up['id']."', 0)";
                    $SQLC = "SELECT ve_ban.suat_chieu_id, ve_ban.ghe_id 
                            FROM ve_ban 
                            WHERE ve_ban.suat_chieu_id = '$id' AND ve_ban.ghe_id = ".$_SESSION['counter'][$i]."";

                
                    $old = mysqli_query($conn, $SQLC);
                    if (mysqli_num_rows($old) > 0) {
                        echo '<script type="text/javascript">alert("Ghế '.$row['vi_tri_day'].''.$row['vi_tri_cot'].' đã bị đặt. Bạn chậm hơn mất r :))")</script>'; 
                    } else {
                        $query = mysqli_query($connect, $SQL);
                        if($query == true) {
                            echo '
                                <button type="button" class="btn badge-success">
                                    Ghế <span class="badge badge-light">'.$row['vi_tri_day'].''.$row['vi_tri_cot'].'</span> đã đặt thành công!
                                </button>
                            ';
                        }
                        else {
                            echo '
                                <button type="button" class="btn badge-danger">
                                    Ghế <span class="badge badge-light">'.$row['vi_tri_day'].''.$row['vi_tri_cot'].'</span> đã đặt thất bại!
                                </button>
                            ';
                        }
                    }

                } 
            }

?>

<a type="button" class="btn btn-primary" href="./index.php">Trở về trang chủ</a>
<?php
?>

<style>
    a {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%);
    }
</style>

