		<?php 
        include 'koneksi.php';
        
		// daytime late
        mysqli_query($koneksi,"UPDATE database_absen SET late='ON TIME' WHERE timetable='Daytime' && clock_in<='08:00:00' && clock_in>'00:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET late='TIDAK ABSEN' WHERE timetable='Daytime' && clock_in='00:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET late='TELAT' WHERE timetable='Daytime' && clock_in>'08:00:00' && clock_in<'17:00:00'" );
        
        // daytime early
        mysqli_query($koneksi,"UPDATE database_absen SET early='ON TIME LEMBUR' WHERE timetable='Daytime' && clock_out>='17:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET early='TIDAK ABSEN' WHERE timetable='Daytime' && clock_out='00:00:00'" );
        mysqli_query($koneksi,"UPDATE database_absen SET early='PULANG AWAL' WHERE timetable='Daytime' && clock_out<'17:00:00' && clock_out>'00:00:00'" );

        header("location:proses_aksi_shift1.php");
		?>