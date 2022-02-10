<?php
require_once('../../../config/db.php');
var_dump($_POST['action']);
if (!empty($_POST)) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        switch ($action) {
            case 'delete':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $sql = 'delete from loai_phim where id = ' . $id;
                    execute($sql);
                }
                break;
        }
    }
}
