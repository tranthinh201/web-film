<?php
session_start();
if (isset($_SESSION['user-client'])) {
    unset($_SESSION['user-client']);
    header("location: index.php");
}
