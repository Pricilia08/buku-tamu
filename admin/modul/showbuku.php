<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
	<title>Simpan Data Buku Tamu</title>
</head>
<body>
	<?php
	$koneksi = mysqli_connect("localhost","root","","coba_db") or die("database tidak ditemukan");
	$tampil=mysqli_query($koneksi, "select * from buku_tamu");
	?>
	<h1>Buku tamu</h1>
	<table border="1">
		<?php
		while ($r=mysqli_fetch_array($tampil))
		{
			?>

			<tr>
				<td>ID : <?=$r['id_bktamu']?></td>
				<td>Nama : <?=$r['nm_bktamu']?></td>
				<td>Email: <?=$r['email_bktamu']?></td>
				<td>Komentar: <?=$r['komentar']?></td>
			</tr>
			<?php
		}
		?>
	</table>
	

</body>
</html>

