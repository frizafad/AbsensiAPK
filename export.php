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

    <br><a target="_blank" href="export_aksi.php">EXPORT</a>

	<br><table border="1">
		<tr>
			<th>Id</th>
			<th>Tanggal</th>
			<th>AC-No./NIK</th>
            <th>Nama</th>
			<th>Shift/Normal</th>
            <th>Timetable</th>
            <th>Fungsi Kerja</th>
            <th>Clock In</th>
            <th>Clock Out</th>
			<th>Late</th>
			<th>Early</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no=1;
        $data = mysqli_query($koneksi,"select * from database_absen");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<th><?php echo $no++; ?></th>
				<th><?php echo $d['tanggal']; ?></th>
				<th><?php echo $d['nik']; ?></th>
                <th><?php echo $d['name']; ?></th>
                <th><?php echo $d['shift']; ?></th>
                <th><?php echo $d['timetable']; ?></th>
                <th><?php echo $d['fungsi_kerja']; ?></th>
                <th><?php echo $d['clock_in']; ?></th>
                <th><?php echo $d['clock_out']; ?></th>
				<th><?php echo $d['late']; ?></th>
				<th><?php echo $d['early']; ?></th>
			</tr>

            
			<?php 
		}
		?>

	</table>
</body>
</html>