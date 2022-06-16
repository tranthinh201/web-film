<?php
       include('../config/db.php');
       session_start();
       $length = count($_SESSION['counter']);
       $id = $_GET['id'];
       $date = date('Y-m-d');
       $sum = $_GET['sum'];
        for($i = 0; $i < $length; $i++) {
        $GHE = "SELECT * FROM ghe_ngoi WHERE id = ".$_SESSION['counter'][$i]."";
        $result = executeResult($GHE);
        var_dump($result);
        echo "string";
        foreach ($result as $row) {
            $SQL = "INSERT INTO ve_ban(ghe_id, gia_ve_id, suat_chieu_id, ngay_ban, tong_tien) VALUES(".$_SESSION['counter'][$i].", '1', '".$id."', '".$date."', ".$sum.")";
                    // [[var_dump($SQL);
            execute($SQL);
        
        }
        
        
    }
    session_unset($_SESSION['counter']);
?>