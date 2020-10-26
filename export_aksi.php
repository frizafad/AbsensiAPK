<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Pegawai.xls");
	?>

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