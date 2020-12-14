<?php
// Enter your Host, username, password, database below.
$conn = mysqli_connect("localhost","root","mysql","soc");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
?>