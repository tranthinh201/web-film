<?php
	require_once ('db.php');
	$conn=new mysqli(HOST, USERNAME, PASSWORD, DATABASE);
			mysqli_set_charset($conn, "utf8");
			if ($conn->connect_error) {
				var_dump($conn->connect_error);
				die();

			}
