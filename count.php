<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}

		p{
			color: green;
		}
	</style>

	<br><a href="drop.php">Drop</a>
	<br><a href="export_aksi1.php">Export</a>

	<br><table border="1">
		<tr>
			<th>NIK</th>
			<th>Nama</th>
			<th>Hari Kerja</th>
            <th>Telat</th>
			<th>Tidak Absen(in)</th>
            <th>On Time(in)</th>
            <th>Pulang Awal</th>
            <th>Tidak Absen(out)</th>
            <th>On Time/Lembur(out)</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no=1;
        $data = mysqli_query($koneksi,"SELECT DISTINCT database_pegawai.nik, database_absen.name, database_pegawai.hari_kerja, database_pegawai.telat, database_pegawai.tidak_absen, database_pegawai.ontime, database_pegawai.pulang_awal, database_pegawai.tidakabsen, database_pegawai.lembur
                                        FROM database_pegawai
                                        INNER JOIN database_absen 
                                        ON database_pegawai.nik=database_absen.nik");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<th><?php echo $d['nik']; ?></th>
				<th><?php echo $d['name']; ?></th>
                <th><?php echo $d['hari_kerja']; ?></th>
                <th><?php echo $d['telat']; ?></th>
                <th><?php echo $d['tidak_absen']; ?></th>
                <th><?php echo $d['ontime']; ?></th>
                <th><?php echo $d['pulang_awal']; ?></th>
                <th><?php echo $d['tidakabsen']; ?></th>
				<th><?php echo $d['lembur']; ?></th>
			</tr>

            
			<?php 
		}
		?>

	</table>
</body>
</html>