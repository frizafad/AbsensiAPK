<?php

include 'koneksi.php';

// mysqli_query($koneksi,"INSERT INTO database_pegawai(nik) SELECT DISTINCT nik FROM database_absen order by name DESC");
set_time_limit(500);
$sql=mysqli_query($koneksi,"SELECT * FROM database_absen");
$sql1=mysqli_query($koneksi,"SELECT * FROM database_pegawai");

while($d=mysqli_fetch_array($sql)){
    $countlate = mysqli_query($koneksi,"INSERT INTO database_pegawai(nik,tidak_absen)
                SELECT nik ,COUNT(late) FROM database_absen WHERE nik= $d[nik] && late='TIDAK ABSEN'");
}


    $updatex = mysqli_query($koneksi,"UPDATE database_pegawai SET hari_kerja = (
        SELECT COUNT(nik) FROM database_absen  
        WHERE nik=nik && database_absen.nik = database_pegawai.nik)");

    $update = mysqli_query($koneksi,"UPDATE database_pegawai SET telat = (
                SELECT COUNT(late) FROM database_absen  
                WHERE nik=nik && late='TELAT' && database_absen.nik = database_pegawai.nik)");
    
    $update1 = mysqli_query($koneksi,"UPDATE database_pegawai SET ontime = (
        SELECT COUNT(late) FROM database_absen  
        WHERE nik=nik && late='ON TIME' && database_absen.nik = database_pegawai.nik)");
    
    $update3 = mysqli_query($koneksi,"UPDATE database_pegawai SET pulang_awal = (
        SELECT COUNT(early) FROM database_absen  
        WHERE nik=nik && early ='PULANG AWAL' && database_absen.nik = database_pegawai.nik)");

    $update3 = mysqli_query($koneksi,"UPDATE database_pegawai SET tidakabsen = (
        SELECT COUNT(early) FROM database_absen  
        WHERE nik=nik && early ='TIDAK ABSEN' && database_absen.nik = database_pegawai.nik)");

    $update3 = mysqli_query($koneksi,"UPDATE database_pegawai SET lembur = (
        SELECT COUNT(early) FROM database_absen  
        WHERE nik=nik && early ='ON TIME LEMBUR' && database_absen.nik = database_pegawai.nik)");


header("location:count.php");

?>