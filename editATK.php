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
        <script type = "text/javascript" src="js/validatedelete.js"> </script>
        <script type = "text/javascript" src="js/validateedit.js"> </script>
        <script type = "text/javascript" src="js/validateKurangStok.js"> </script>

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
                            <li class="active"><a href="editstock.php">Edit Data Stok</a></li>
                            <li><a href="usage.php">Pemakaian ATK</a></li>
                            <li><a href="data.php">Lihat Data</a></li>
                            <li><a href="stats.php">Statistik</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="row row-content">
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
        
                            $sql = "SELECT * FROM t_atk WHERE kode_barang = '$kode_barang'";
                            $result = $conn->query($sql);
     
                                echo'
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Stok (pcs)</th>
                                                <th>Jumlah Update</th>
                                                <th>Tambah</th>
                                                <th>Kurang</th>
                                                <th>Hapus</th>
                                            </tr>
                                        </thead>
                                ';
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        while($row = $result->fetch_assoc()) {
                                            echo'
                                                <tbody>
                                                    <tr>
                                                        <th>'.$row["kode_barang"].'</th>
                                                        <th>'.$row["nama_barang"].'</th>
                                                        <th>'.$row["stok"].'</th>
                                                        <form name="editstok" method="Post">
                                                            <th><input type="text" class="form-control" id="n_stok" name="n_stok" style="width:110px;"></th>
                                                            <th><button type="submit" class="btn btn-default" formaction="tambahStok.php?kode_barang='.$kode_barang.'" onclick="return validateForm('.$row["stok"].')"><img src="img/plus.png" style="width:24px;height:24px;"/></button></th>
                                                            <th><button type="submit" class="btn btn-default" formaction="kurangStok.php?kode_barang='.$kode_barang.'" onclick="return validateKurangStokForm('.$row["stok"].')"><img src="img/minus.png" style="width:24px;height:24px;"/></button></th>
                                                        </form>
                                                        <th><a href="deleteATK.php?kode_barang='.$kode_barang.'" onclick="return confirmDelete()"><button class="btn btn-default"><img src="img/delete.png" style="width:24px;height:24px;"/></button></a></th>
                                                    </tr>
                                                </tbody>
                                            ';
                                            
                                        }
                                        echo'
                                            </table>
                                        ';
                                    } else {
                                        echo "0 results";
                                    }
                            $conn->close();
                        ?>
                        
                    </div>
                    <br>
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