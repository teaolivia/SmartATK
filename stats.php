<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SmartATK</title>
        <!-- Bootstrap -->
        <!-- If you are online, or will deploy this to server, uncomment this part
        <!-- Latest compiled and minified CSS
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        -->

        <!-- If you are offline, uncomment this part -->
        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/bootstrap-social.css" rel="stylesheet">
        <link href="css/mystyles.css" rel="stylesheet">
        <!-- jQuery -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="js/jquery.min.js"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script>
			$(function() {
			$( "#startdate" ).datepicker({
				dateFormat: 'yy-mm-dd'
			});
			});
			$(function() {
			$( "#enddate" ).datepicker({
				dateFormat: 'yy-mm-dd'
			});
			});
		</script>
		<!-- Fusion Chart -->
		<script src="js/fusioncharts.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class ="row row-header">
                <div class="col-xs-12 col-sm-4 col-sm-offset-8">
                    <h1 id="title">SmartATK</h1>
                </div>
            </div>

            <div class="row row-content">
                <div class="col-xs-12 col-sm-3">
                    <button type="button" class="navbar-toggle collapse" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navbar">
                        <ul class="nav nav-pills nav-stacked na">
                            <li><a href="editstock.php">Edit Data Stok</a></li>
                            <li><a href="usage.php">Pemakaian ATK</a></li>
                            <li><a href="data.php">Lihat Data</a></li>
                            <li class="active"><a href="stats.php">Statistik</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="row row-content">
                        <div class="col-xs-12" style="text-align:center;">
                            <h2>Pilih statistik yang mau ditampilkan</h2>
                            <div class="col-xs-12 col-sm-4" style="text-align:center;">
                            	<a href="stats.php?type=stok_min"><button class="btn btn-primary">Stok Minimum ATK</button></a>
	                        </div>
	                        <div class="col-xs-12 col-sm-4" style="text-align:center;">
	                            <a href="stats.php?type=per_user"><button class="btn btn-primary">Pemakaian per User</button></a>
	                        </div>
	                        <div class="col-xs-12 col-sm-4" style="text-align:center;">
	                            <a href="stats.php?type=per_periode"><button class="btn btn-primary">Pemakaian per Periode</button></a>
	                        </div>

                            <?php
								$servername = "localhost";
								$username = "root";
								$dbname = "smartatk";

								$conn = new mysqli($servername, $username, "", $dbname);
								
								// Check connection
								if ($conn->connect_error) {
								    die("Connection failed: " . $conn->connect_error);
								}

								$stat = "def";
								if (isset($_GET["type"])) {
									$stat = $_GET["type"];
								}
							?>
						</div>
						<div class="col-xs-12">
							<br>
							<br>
						</div>
						<div class="col-xs-12" style="text-align:center;">
	                        <h3>Tampilan statistik</h3>
							<?php
								if($stat == "stok_min") {
									$limitDate = date("Y-m-d", strtotime("-1 months"));
									echo "Stok minimum ATK berdasarkan pemakaian setelah " . $limitDate . " (1 bulan lalu)<br>";
									$stok_min = "SELECT a.kode_barang, a.nama_barang, stok_minimum FROM (SELECT kode_barang, nama_barang FROM t_atk) AS a JOIN (SELECT kode_barang, sum(n_pakai) as stok_minimum FROM t_pemakaian WHERE tanggal>='" . $limitDate . "' GROUP BY kode_barang) AS b ON a.kode_barang=b.kode_barang";

									$result = $conn->query($stok_min);
									if ($result->num_rows > 0) {
										echo "<div class='table-responsive'>";
										echo "<table class='table table-striped' style='width:100%'>";
										echo "<tr>";
			                            echo "<td>Kode Barang</td>";
			                            echo "<td>Nama Barang</td>";
			                            echo "<td>Stok Minimum</td>";
								        echo "</tr>";
									    while($row = $result->fetch_assoc()) {
									        echo "<tr>";
									        echo "<td>" . $row["kode_barang"] . "</td>";
									        echo "<td>" . $row["nama_barang"] . "</td>";
									        echo "<td>" . $row["stok_minimum"] . "</td>";
									        echo "</tr>";
									        echo "<br>";
									    }
									    echo "</table>";
									    echo "</div>";
									}
									else {
									    echo "tidak ada hasil";
									}
								}
								else if($stat == "per_user") {
									echo "<form action='' method='post'>";
									echo "<br>";
									echo "Awal: <input type='text' name='start' id='startdate' />" . str_repeat('&nbsp;', 3);
									echo "Akhir: <input type='text' name='end' id='enddate' />" . str_repeat('&nbsp;', 3);
									echo "Nama user:  <input type='text' name='user_name' />";
									echo "<input value='Refresh' type='submit' />";
									echo "</form>";
									echo "<br>";
									if (!isset($_POST["start"]) || !isset($_POST["end"]) || !isset($_POST["user_name"])) {
										echo "Pilih nama user dan tanggal periode";
									}
									else {
										$start = $_POST["start"];
										$end = $_POST["end"];
										if (strtotime($end) < strtotime($start))
											echo "Tanggal tidak valid";
										else {
											$name = $_POST["user_name"];
											$per_user = "SELECT nama_user, kategori_user, nama_barang, n_pakai, deskripsi, tanggal FROM t_pemakaian WHERE tanggal>='" . $start . "' and tanggal<='" . $end . "' and nama_user='" . $name ."'";
											$result = $conn->query($per_user);

											if ($result->num_rows > 0) {
												echo "Pemakaian ATK dari periode " . $start . " sampai " . $end . " oleh " . $name;
												echo "<br><br>";
												echo "<div class='table-responsive'>";
												echo "<table class='table table-striped' style='width:100%'>";
												echo "<tr>";
					                            echo "<td>Nama User</td>";
					                            echo "<td>Kategori User</td>";
					                            echo "<td>Nama Barang</td>";
					                            echo "<td>Jumlah Pemakaian</td>";
					                            echo "<td>Deskripsi</td>";
					                            echo "<td>Tanggal</td>";
											    while($row = $result->fetch_assoc()) {
											        echo "<tr>";
											        echo "<td>" . $row["nama_user"] . "</td>";
											        echo "<td>" . $row["kategori_user"] . "</td>";
											        echo "<td>" . $row["nama_barang"] . "</td>";
											        echo "<td>" . $row["n_pakai"] . "</td>";
											        echo "<td>" . $row["deskripsi"] . "</td>";
											        echo "<td>" . $row["tanggal"] . "</td>";
											        echo "</tr>";
											    }
											    echo "</table>";
											    echo "</div>";
											}
											else {
											    echo "tidak ada hasil";
											}
										}
									}
								}
								else if($stat == "per_periode") {
									echo "<form action='' method='post'>";
									echo "<br>";
									echo "Awal: <input type='text' name='start' id='startdate' />" . str_repeat('&nbsp;', 5);
									echo "Akhir: <input type='text' name='end' id='enddate' />";
									echo "<br><br>";
									echo "<input value='Refresh' type='submit' />";
									echo "</form>";
									echo "<br>";
									if (!isset($_POST["start"]) || !isset($_POST["end"])) {
										echo "Pilih tanggal awal dan akhir periode";
									}
									else {
										$start = $_POST["start"];
										$end = $_POST["end"];
										if (strtotime($end) < strtotime($start))
											echo "Tanggal tidak valid";
										else {
											$per_periode = "SELECT nama_barang, sum(n_pakai) as 'jumlah pemakaian' FROM t_pemakaian WHERE tanggal<='". $end . "' and tanggal>='" . $start . "' GROUP BY kode_barang";
											$result = $conn->query($per_periode);
											echo "<br>";
											if ($result->num_rows > 0) {
											    include("fusioncharts.php");
											    $arrData = array(
									        	    "chart" => array(
									                  "caption" => "Pemakaian ATK dari periode " . $start . " sampai " . $end,
									                  "xAxisName" => "Nama Barang",
									                  "yAxisName" => "Jumlah Pemakaian"
									              	)
									           	);

									           	$arrData["data"] = array();
											    while($row = mysqli_fetch_array($result)) {
											        array_push($arrData["data"], array(
										              	"label" => $row["nama_barang"],
										              	"value" => $row["jumlah pemakaian"]
										              	)
										           	);
											    }
											    $chart = new FusionCharts("column2D", "periodChart" , 600, 400, "chart-1", "json", json_encode($arrData));
											    $chart->render();
						    ?>
						    <div id="chart-1"></div>
						    <?php
											}
											else {
											    echo "tidak ada hasil";
											}
										}
									}
								}

								$conn->close();
							?>
						</div>
                    </div>
                </div>
            </div>
            <div class="row row-footer">
                <div class ="col-xs-12 col-sm-4">
                    
                </div>
                <div class ="col-xs-12 col-sm-4">
                    <p>Sistem Informasi ATK </p>
                    <p>Sarana dan Prasarana Institut Teknologi Bandung</p>
                </div>            
                <div class ="col-xs-12 col-sm-4">
                    <p>Copyright 2016. Softspot Software House</p>
                </div>
            </div>
        </div>
    </body>
</html>
