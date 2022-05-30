<?php
    require('../config/db.php');
    if (isset($_GET['suatchieu'])) {
        $suat_chieu       = $_GET['suatchieu'];
        $length = count($_POST['is-seat']);
        $nguoi_lon = $_POST['nguoi-lon'];
        $tre_em = $_POST['tre-em'];
        var_dump($nguoi_lon);
        var_dump($tre_em);
        for($i = 0; $i < $length; $i++) {
            $GHE = "SELECT * FROM ghe_ngoi WHERE id = ".$_POST["is-seat"][$i]."";
            $result = executeResult($GHE);
            foreach ($result as $row) {
                $SQL = "INSERT INTO ve_ban(ghe_id, gia_ve_id, suat_chieu_id) VALUES(".$_POST["is-seat"][$i].", '1', '".$suat_chieu."')";
                var_dump($SQL);
                die();
                execute($SQL);
            }
        
            
            // $SQL = "INSERT INTO ve_ban(ghe_id) VALUES(".$_POST["is-seat"][$i].")";
            // execute($SQL);
            // if($i == $length ) {
            //     echo "<script>alert('Đặt zes thàng kum')</script>";
            // }
        } 
    }
?>