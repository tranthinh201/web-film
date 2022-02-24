<?php
require_once('../../../config/db.php');
if (!empty($_POST)) {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'delete':
                if (isset($_POST['id'])) {
                    $id = $_POST['id'];
                    $sql = 'DELETE FROM suat_chieu WHERE id = ' . $id;
                    execute($sql);
                }
                break;
        }
    }
}
