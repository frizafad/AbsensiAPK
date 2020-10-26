        <?php
     include 'koneksi.php';

        // shift II late
        mysqli_query($koneksi,"UPDATE database_absen SET late='ON TIME' WHERE timetable='Shift II' && clock_in<='14:00:00' && clock_in>'00:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET late='TIDAK ABSEN' WHERE timetable='Shift II' && clock_in='00:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET late='TELAT' WHERE timetable='Shift II' && clock_in>'14:00:00' && clock_in<'23:00:00'" );

        // shift II early
        mysqli_query($koneksi,"UPDATE database_absen SET early='ON TIME LEMBUR' WHERE timetable='Shift II' && clock_out>='23:00:00' || clock_out>'00:00:00' " );
        mysqli_query($koneksi,"UPDATE database_absen SET early='TIDAK ABSEN' WHERE timetable='Shift II' && clock_out='00:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET early='PULANG AWAL' WHERE timetable='Shift II' && clock_out<'23:00:00' && clock_out>'14:00:00'" );
           
        header("location:proses_aksi_shift3.php");   
           ?>