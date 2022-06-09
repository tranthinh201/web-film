<?php
    require('../config/db.php');
    if (isset($_GET['suatchieu'])) {
        $suat_chieu       = $_GET['suatchieu'];
        $length = count($_POST['is-seat']);
        // $nguoiLon = $_GET['nguoi-lon'];
        // $treEm = $_GET['tre-em'];
        // var_dump($nguoiLon);
        // var_dump($treEm);
        for($i = 0; $i < $length; $i++) {
            $GHE = "SELECT * FROM ghe_ngoi WHERE id = ".$_POST["is-seat"][$i]."";
            $result = executeResult($GHE);
            
            foreach ($result as $row) {
                $SQL = "INSERT INTO ve_ban(ghe_id, gia_ve_id, suat_chieu_id) VALUES(".$_POST["is-seat"][$i].", '1', '".$suat_chieu."')";
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
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    include './include/library.php'
?>
    <title>thanh toán</title>
</head>
<body>
    <h2>hellooo</h2>
</body>
<?php
    include './include/library.php'; 
?>
</html>