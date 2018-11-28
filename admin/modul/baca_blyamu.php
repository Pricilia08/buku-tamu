<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Data Buku Tamu</title>
	</head>
	<body>
		<h1>Data Buku Tamu</h1>
		<?php
    $koneksi = new mysqli("localhost","root","","coba_db");
    if ($koneksi->connect_error) {
        die("Koneksi DB gagal: ".$koneksi->connect_error);
    }else{        
        $sql = "SELECT * FROM buku_tamu";
        $result = $koneksi->query($sql);
        $jumlah = $result->num_rows;
        echo "<center>Daftar Pengunjung</center>";
        echo "Jumlah pengunjung: $jumlah";
        echo "<hr>";

        $urutan = 1;
        while($row = $result->fetch_array()){
            echo "$urutan<br>";
            echo "Status: $row[1] <br>";
            echo "Nama: $row[2] <br>";
            echo "Email: $row[3] <br>";
            echo "Alamat: $row[4] <br>";
            echo "Tanggal: $row[5] <br>";
            echo "Komentar: $row[6] <br><br>";
            $urutan++;
        }
    }
?>
	
</body>
</html>