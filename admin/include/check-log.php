<?php
if (!isset($_SESSION['user'])) {
    header('Location: ../../pages/sign-in.php');
}
