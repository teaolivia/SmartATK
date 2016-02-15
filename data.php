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
        <script src="js/jquery.min.js"></script>
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
                            <li class="active"><a href="data.php">Lihat Data</a></li>
                            <li><a href="stats.php">Statistik</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="row row-content">
                        <div class="col-xs-12">
                            <h2>Lihat Data</h2>
                        </div>
                        <div class="col-xs-12 col-sm-4" style="text-align:center;">
                            <a href="data.php?type=atk"><button class="btn btn-primary">ATK</button></a>
                        </div>
                        <div class="col-xs-12 col-sm-4" style="text-align:center;">
                            <a href="data.php?type=user"><button class="btn btn-primary">User</button></a>
                        </div>
                        <div class="col-xs-12 col-sm-4" style="text-align:center;">
                            <a href="data.php?type=usage"><button class="btn btn-primary">Pemakaian</button></a>
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

                            $data = "na";
                            if (isset($_GET["type"])) {
                                $data = $_GET["type"];
                            }
                        ?>

                        <div class="col-xs-12">
                            <p style="padding-bottom:20px;"> </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <?php
                                        if ($data=="atk") {
                                            echo "<h3> Data ATK dan Stok </h3>";
                                            //$atk = "SELECT nama_barang, stok FROM t_ATK";
                                            $atk = "SELECT * FROM t_ATK";
                                            $result = $conn->query($atk);

                                            if ($result->num_rows > 0) {
                                                echo "<tr>";
                                                echo "  <td>Kode Barang</td>";
                                                echo "  <td>Nama Barang</td>";
                                                echo "  <td>Stok</td>";
                                                echo "</tr>";
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "  <td>" . $row["kode_barang"] . "</td>";
                                                    echo "  <td>" . $row["nama_barang"] . "</td>";
                                                    echo "  <td>" . $row["stok"] . "</td>";
                                                    echo "</tr>";
                                                }   
                                            }
                                            else {
                                                echo "<p>Tidak ada hasil</p>";
                                            }
                                        }
                                        else if ($data=="user") {
                                            echo "<h3> Data Pengguna </h3>";
                                            //$user= SELECT nama_user, kategori_user FROM t_user");
                                            $user= "SELECT * FROM t_user";
                                            $result = $conn->query($user);

                                            if ($result->num_rows > 0) {
                                                echo "<tr>";
                                                echo "  <td>ID User</td>";
                                                echo "  <td>Nama User</td>";
                                                echo "  <td>Kategori User</td>";
                                                echo "</tr>";
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "  <td>" . $row["id_user"] . "</td>";
                                                    echo "  <td>" . $row["nama_user"] . "</td>";
                                                    echo "  <td>" . $row["kategori_user"] . "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            else {
                                                echo "<p>Tidak ada hasil</p>";
                                            }
                                        }
                                        else if ($data=="usage") {
                                            echo "<h3> Data Pemakaian </h3>";
                                            $usage = "SELECT id_pemakaian, nama_barang, nama_user, n_pakai FROM t_pemakaian ORDER BY nama_user ASC";
                                            $result = $conn->query($usage);

                                            if ($result->num_rows > 0) {
                                                echo "<tr>";
                                                echo "  <td>No.</td>";
                                                echo "  <td>Nama Barang</td>";
                                                echo "  <td>Pemakai</td>";
                                                echo "  <td>Jumlah Pakai</td>";
                                                echo "</tr>";
                                                while($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "  <td>" . $row["id_pemakaian"] . "</td>";
                                                    echo "  <td>" . $row["nama_barang"] . "</td>";
                                                    echo "  <td>" . $row["nama_user"] . "</td>";
                                                    echo "  <td>" . $row["n_pakai"] . "</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                            else {
                                                echo "<p>Tidak ada hasil</p>";
                                            }
                                        }
                                    ?>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row row-footer">
                <div class ="col-xs-12 col-sm-4">
                    
                </div>
                <div class ="col-xs-12 col-sm-4">
                    <p style="text-align:center;">Sistem Informasi ATK </p>
                    <p> Sarana dan Prasarana Institut Teknologi Bandung </p>
                </div>            
                <div class ="col-xs-12 col-sm-4">
                    <p> Copyright 2016.</br> Sofspot Software House </p>
                </div>
            </div>
        </div>
    </body>
</html>