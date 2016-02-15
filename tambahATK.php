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
	
	$kode_barang = mysqli_real_escape_string($conn,$_POST["kode_barang"]);
	$nama_barang = mysqli_real_escape_string($conn,$_POST["nama_barang"]);
	$stok = mysqli_real_escape_string($conn,$_POST["stok"]);
	
	$sql = "INSERT INTO t_atk(`kode_barang`,`nama_barang`,`stok`) VALUES ('$kode_barang','$nama_barang','$stok')";
	
	if ($conn->query($sql) === TRUE ){
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();
	
	header("Location: editstock.php");
?>