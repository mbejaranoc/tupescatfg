<?php
	
	// Create connection 
	$conn = new mysqli("localhost", "root", "", "tfg_prueba");
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
	
	$conn->set_charset("utf8");	
?>