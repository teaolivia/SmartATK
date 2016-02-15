<!DOCTYPE html>
<html>
    <head>
        <title>SmartATK</title>
        <?php
            $user_name = $_POST["user_name"];
            $category = $_POST["category"];
            $atk_name = $_POST["atk_name"];
            $amount = $_POST["amount"];
            $desc = $_POST["desc"];

            $servername = "localhost";
            $username = "root";
            $dbname = "smartatk";

            $conn = new mysqli($servername, $username, "", $dbname);
            
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $query_atk_code = "SELECT kode_barang, stok FROM t_atk WHERE nama_barang='" . $atk_name . "'";
            $result = $conn->query($query_atk_code);

            while($row = $result->fetch_assoc()) {
                $atk_code = $row["kode_barang"];
                $stok = $row["stok"];
            }

            if ($stok >= $amount) {
                $query_user_id = "SELECT id_user FROM t_user WHERE nama_user='" . $user_name . "' and kategori_user='" . $category . "'";
                $result = $conn->query($query_user_id);

                while ($result->num_rows == 0) {
                    $new_user = "INSERT INTO t_user(`nama_user`,`kategori_user`) VALUES('$user_name', '$category')";
                    $conn->query($new_user);

                    $query_user_id = "SELECT id_user FROM t_user WHERE nama_user='" . $user_name . "' and kategori_user='" . $category . "'";
                    $result = $conn->query($query_user_id);
                }

                while($row = $result->fetch_assoc())
                    $user_id = $row["id_user"];

                $curDate = date("Y-m-d");
                $new_usage = "INSERT INTO t_pemakaian(`id_user`, `nama_user`, `kategori_user`, `n_pakai`, `kode_barang`, `nama_barang`, `deskripsi`, `tanggal`) VALUES('$user_id', '$user_name', '$category', '$amount', '$atk_code', '$atk_name', '$desc', '$curDate')";

                if ($conn->query($new_usage)) {
                    $subtract_stock = "UPDATE t_atk SET stok=stok-'$amount' WHERE kode_barang='$atk_code'";
                    $conn->query($subtract_stock);
                }
                else {
                    echo "<script>
                        alert('Anda hanya boleh memakai atk yang sama 1 kali dalam sehari');
                        window.location.href='usage.php';
                    </script>";
                }
            }
            else {
                echo "<script>
                        alert('Jumlah pemakaian lebih dari stok');
                        window.location.href='usage.php';
                    </script>";
            }
            echo "<script>
                    alert('Transaksi pemakaian berhasil');
                    window.location.href='usage.php';
                </script>";
            $conn->close();
        ?>
    </head>
</html>