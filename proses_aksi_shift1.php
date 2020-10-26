     <?php
        
 include 'koneksi.php';
// shift I late
mysqli_query($koneksi,"UPDATE database_absen SET late='ON TIME' WHERE timetable='Shift I' && clock_in<='07:00:00' && clock_in>'01:00:00'" );
mysqli_query($koneksi,"UPDATE database_absen SET late='TIDAK ABSEN' WHERE timetable='Shift I' && clock_in='00:00:00'" );
mysqli_query($koneksi,"UPDATE database_absen SET late='TELAT' WHERE timetable='Shift I' && clock_in>'07:00:00' && clock_in<'16:00:00'" );

// shift I early
mysqli_query($koneksi,"UPDATE database_absen SET early='ON TIME LEMBUR' WHERE timetable='Shift I' && clock_out>='16:00:00'" );
mysqli_query($koneksi,"UPDATE database_absen SET early='TIDAK ABSEN' WHERE timetable='Shift I' && clock_out='00:00:00'" );
mysqli_query($koneksi,"UPDATE database_absen SET early='PULANG AWAL' WHERE timetable='Shift I' && clock_out<'16:00:00' && clock_out>'00:00:00'" );

header("location:proses_aksi_shift2.php");
    ?>