<?php

include 'koneksi.php';

mysqli_query($koneksi, "DELETE FROM database_pegawai");
mysqli_query($koneksi, "DELETE FROM database_absen");


header("location:index.php");

?>