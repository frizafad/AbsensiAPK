<?php

 include 'koneksi.php';
        // shift III late
        mysqli_query($koneksi,"UPDATE database_absen SET late='ON TIME' WHERE timetable='Shift III' && clock_in<='22:00:00' && clock_in>'07:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET late='TIDAK ABSEN' WHERE timetable='Shift III' && clock_in='00:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET late='TELAT' WHERE timetable='Shift III' && clock_in>'22:00:00'" );

        // shift III early
        mysqli_query($koneksi,"UPDATE database_absen SET early='ON TIME LEMBUR' WHERE timetable='Shift III' && clock_out>='07:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET early='TIDAK ABSEN' WHERE timetable='Shift III' && clock_out='00:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET early='PULANG AWAL' WHERE timetable='Shift III' && clock_out<'07:00:00' && clock_out>'00:00:00'" );

        header("location:proses.php");

?>