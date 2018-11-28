<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
	<head>
		<title>Simpan Data Buku Tamu</title>
	</head>
	<body>
			<h1>Simpan Buku Tamu</h1>
	<?php
		$id = $_POST["id"];
		$status = $_POST["status"];
		$nama = $_POST["nama"];
		$email = $_POST["email"];
		$alamat = $_POST["alamat"];
		$tanggal = $_POST["tanggal"];
		$komentar = $_POST["komentar"];
		$koneksi = new mysqli ("localhost","root","","coba_db") or die ("Koneksi database gagal");
		// $koneksi -> select_db("coba_db");
		echo "ID 		: $id <br>";
		echo "Status 	: $status <br>";
		echo "Nama 		: $nama <br>";
		echo "Email		: $email <br>";
		echo "Alamat 	: $alamat <br>";
		echo "Tanggal	: $tanggal <br>";
		echo "Komentar	: $komentar <br>";
		$sqltr = "insert into buku_tamu (id_bktamu, status_bktamu, nm_bktamu, email_bktamu, alamat_bktamu, tgl_bktamu, komentar) value ('$id','$status','$nama', '$email', '$alamat', '$tanggal','$komentar')";
		$hasil = $koneksi -> query($sqltr);
	
		echo "Simpan buku tamu berhasil dilakukan";
	?>
	<br>
	<br>
	<a href="baca_blyamu.php">Lihat Buku Tamu</a>
	</body>
	</html>

