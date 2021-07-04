<?php

	$servername = "localhost";
	$user = "FuzzyStak0";
	$pass = "stak01987";
	$dbname = "hotel_v2";

	$conn = mysqli_connect($servername, $user, $pass, $dbname);

	if(!$conn) {
		echo 'Error connection fail ' . mysqli_connect_error();
	}
	