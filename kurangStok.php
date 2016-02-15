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
	$n_stok = mysqli_real_escape_string($conn,$_POST["n_stok"]);

	$sql = "UPDATE t_atk SET stok = stok - '$n_stok' WHERE kode_barang='$kode_barang'";
	
	if ($conn->query($sql) === TRUE) {
		echo "Record update successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$conn->close();

	header("Location: editATK.php?kode_barang=$kode_barang");
?>