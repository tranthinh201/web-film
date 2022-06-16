<?php
       include('../config/db.php');
       session_start();

           // code...
           $length = count($_SESSION['counter']);
           $id = $_GET['id'];
           $date = date('Y-m-d');
           $sum = $_GET['sum'];



            for($i = 0; $i < $length; $i++) 
            {
                $GHE = "SELECT * FROM ghe_ngoi, loai_ghe 
                        WHERE ghe_ngoi.loai_ghe_id = loai_ghe.id 
                        AND ghe_ngoi.id = ".$_SESSION['counter'][$i]."";
              
                $result = executeResult($GHE);
                foreach ($result as $row) {
                    $SQL = "INSERT INTO ve_ban(ghe_id, gia_ve_id, suat_chieu_id, ngay_ban, tong_tien) VALUES(".$_SESSION['counter'][$i].", '1', '".$id."', '".$date."', ".$row['phu_thu'].")";
                            // var_dump($SQL);
                    $query = mysqli_query($connect, $SQL);
                }

                    if ($query==true) {
                        // code...
                         header("Location:./index.php");
                    }
                    else
                    {
                        header("Location:./contact-us.php");
                    }
            die();          
            }

           


?>