<?php
	$connect = mysqli_connect("localhost","root","","skill_db");

	if(!$connect){
		die("Connection Failed: " .mysqli_connect_error());
	}
?>
