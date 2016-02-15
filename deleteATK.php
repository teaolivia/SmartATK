<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "smartatk";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$kode_barang = $_GET["kode_barang"];
	
	$sql = "DELETE FROM t_atk WHERE kode_barang = '$kode_barang'";
	
	if ($conn->query($sql) === TRUE ){
		echo "Record deleted successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	
	header("Location: editstock.php");
?>