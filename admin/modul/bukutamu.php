<html>
</head>
	<title>Buku Tamu</title>
	<style type="text/css">
		body 
		{ 
			font-family:tahoma; 
			font-size:12px; 
		}
		#container 
		{ 
			width:450px; 
			padding:20px 40px; 
			margin:50px auto; 
			border:0px solid #555; 
			box-shadow:0px 0px 2px #555; 
		}
		input[type="text"] 
		{
		 width:200px; 
		}
		input[type="text"], textarea 
		{ 
			padding:5px; 
			margin:2px 0px; 
			border: 1px solid #777; 
		}
		input[type="submit"], input[type="reset"] 
		{ 
			padding: 5px 20px;
			margin:2px 0px; 
			font-weight:bold; 
			cursor:pointer; 
		}
		#error
		{ 
			border:1px solid red; 
			background:#ffc0c0; 
			padding:5px; 
		}
	</style>
	<script src="../tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
		tinymce.init({selector:'#komentar'});
	</script>
</head>
<body>
 
	<div id="container">
		<h1>Buku Tamu</h1>
		<p>Silahkan isi buku tamu di bawah ini untuk meninggalkan pesan Anda!</p>

	<?php
		if(!empty($_POST['go'])){
			mysqli_connect("localhost", "root", "", "coba_db");
 
			$id	= htmlentities(mysqli_real_escape_string($koneksi, $_POST['id']));
			$status	= htmlentities(mysqli_real_escape_string($koneksi, $_POST['status']));
			$nama	= htmlentities(mysqli_real_escape_string($koneksi, $_POST['nama']));
			$email	= htmlentities(mysqli_real_escape_string($koneksi, $_POST['email']));
			$alamat	= htmlentities(mysqli_real_escape_string($koneksi, $_POST['alamat']));
			$komentar	= htmlentities(mysqli_real_escape_string($koneksi, $_POST['komentar']));
			$tgl	= time();
 
			if($nama && $email && $komentar){
				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					$in = mysqli_query($koneksi, "INSERT INTO buku_tamu VALUES('$id', '$status', '$nama', '$email', '$alamat', '$tgl', '$komentar')");
					if(!$in){
						die('query error'. mysqli_error($koneksi));
					}
					if($in){
						echo '<script language="javascript">alert("Terima kasih, data Anda berhasil disimpan"); document.location="server.php?module=showbuku";</script>';
					}else{
						echo '<div id="error">Uppsss...! Query ke database gagal dilakukan!</div>';
					}
				}else{
					echo '<div id="error">Uppsss...! Email Anda tidak valid!</div>';
				}
			}else{
				echo '<div id="error">Uppsss...! Lengkapi form!</div>';
			}
		}
		?>
		<form action="" method="post">
			<p><b>ID :</b><br><input type="text" name="id" placeholder="ID" required /></p>
			<p><b>Status :</b><br><input type="text" name="status" placeholder="Status" required /></p>
			<p><b>Nama  :</b><br><input type="text" name="nama" placeholder="Nama Lengkap" required /></p>
			<p><b>Email :</b><br><input type="text" name="email" placeholder="Email" required /></p>
			<p><b>Alamat :</b><br><input type="text" name="alamat" placeholder="Alamat" /></p>
			<p><b>Tanggal :</b><br><input type="date" name="tanggal" placeholder="Tanggal" required /></p>
			<p><b>Komentar :</b><br><textarea name="komentar" rows="5" cols="50" placeholder="Komentar" id="komentar" required></textarea></p>
			<p><input type="submit" name="go" value="Kirim" /> <input type="reset" name="del" value="Hapus" /></p>
		</form>
	</div>
 
</body>
</html>