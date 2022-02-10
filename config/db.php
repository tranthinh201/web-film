
<?php
const HOST = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'webfilm';

$connect = mysqli_connect('localhost', 'root', '', 'webfilm');
if ($connect) {
    mysqli_query($connect, "SET NAMES 'UTF8'");
} else {
    echo "Kết nối thất bại!";
}




function execute($sql)
{
    $conn = new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

/**
 * Su dung cho lenh: select
 */
function executeResult($sql, $isSingle = false)
{
    // Them du lieu vao database
    //B1. Mo ket noi toi database
    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    //B2. Thuc hien truy van insert
    $resultset = mysqli_query($conn, $sql);
    $data      = [];


    if ($isSingle) {
        $data = mysqli_fetch_array($resultset, 1);
    } else {
        while (($row = mysqli_fetch_array($resultset, 1)) != null) {
            $data[] = $row;
        }
    }

    //B3. Dong ket noi database
    mysqli_close($conn);

    return $data;
}
