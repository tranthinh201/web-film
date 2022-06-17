<?php
       include('../config/db.php');
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
                $GHE = "SELECT * FROM ghe_ngoi, loai_ghe 
                        WHERE ghe_ngoi.loai_ghe_id = loai_ghe.id 
                        AND ghe_ngoi.id = ".$_SESSION['counter'][$i]."";
              
                $result = executeResult($GHE);
                foreach ($result as $row) {
                    $SQL = "INSERT INTO ve_ban(ghe_id, suat_chieu_id, ngay_ban, tong_tien, khach_hang_id, da_huy) VALUES(".$_SESSION['counter'][$i].", '".$id."', '".$date."', ".$row['phu_thu'].", '".$row_up['id'].", 0')";
             
                    $query = mysqli_query($connect, $SQL);

                }
                      

                    if ($query==true) {
                        // code...
                         header("Location:./index.php");
                    }
                    else
                    {
                        header("Location:./lich-chieu.php");
                    }
            }

?>