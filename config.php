<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$base = "employee";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $base);

	// Check connection
	if ($conn->connect_error) {
		echo "connection failed";
		die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully<br />";
?>