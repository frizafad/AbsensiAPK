
<?php 
// menghubungkan dengan koneksi
include 'koneksi.php';
// menghubungkan dengan library excel reader
include "excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filedata']['name']) ;
move_uploaded_file($_FILES['filedata']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filedata']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filedata']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
set_time_limit(120);
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
  	$tanggal        = $data->val($i, 1);
	  $nik            = $data->val($i, 2);
    $name           = $data->val($i, 3);
    $shift          = $data->val($i, 4);
    $timetable      = $data->val($i, 5);
    $fungsi_kerja   = $data->val($i, 6);
    $clock_in       = $data->val($i, 7);
    $clock_out      = $data->val($i, 8);
    $late           = $data->val($i, 9);
    $early           = $data->val($i, 10);

		// input data ke database (table data_pegawai)
		mysqli_query($koneksi,"INSERT into database_absen values('$tanggal','$nik','$name','$shift','$timetable','$fungsi_kerja','$clock_in','$clock_out','$late','$early')");
        $berhasil++;
 }
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filedata']['name']);

// alihkan halaman ke index.php
header("location:index.php?berhasil=$berhasil");
?>