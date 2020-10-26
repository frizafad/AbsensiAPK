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

	<?php 
	if(isset($_GET['berhasil'])){
		echo "<p>".$_GET['berhasil']." Data berhasil di import.</p>";
	}
	?>

	<br><a href="upload.php">IMPORT DATA</a>

    <br><a href="proses.php">PROSES DATA</a>

	<br><a href="drop.php">DROP</a>
    
	<br><table border="1">
		<tr>
			<th>Tanggal</th>
			<th>AC-No./NIK</th>
            <th>Nama</th>
			<th>Shift/Normal</th>
            <th>Timetable</th>
            <th>Fungsi Kerja</th>
            <th>Clock In</th>
            <th>Clock Out</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no=1;
        $data = mysqli_query($koneksi,"select * from database_absen");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<th><?php echo $d['tanggal']; ?></th>
				<th><?php echo $d['nik']; ?></th>
                <th><?php echo $d['name']; ?></th>
                <th><?php echo $d['shift']; ?></th>
                <th><?php echo $d['timetable']; ?></th>
                <th><?php echo $d['fungsi_kerja']; ?></th>
                <th><?php echo $d['clock_in']; ?></th>
                <th><?php echo $d['clock_out']; ?></th>
			</tr>

            
			<?php 
		}
		?>

	</table>
</body>
</html>