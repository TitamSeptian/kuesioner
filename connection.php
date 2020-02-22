<?php
	$host		="localhost";
	$username	="root";
	$password	="";
	$db			="bbtb";

	date_default_timezone_set("Asia/Jakarta");
	$mysqli 	= new mysqli($host, $username,$password,$db);
	if (mysqli_connect_errno()) {
		die();
	}
?>