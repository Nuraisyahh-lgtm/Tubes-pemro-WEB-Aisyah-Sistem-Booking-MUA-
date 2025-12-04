<?php 
include 'koneksi.php';

$nama = $_POST['nama'];
$hp   = $_POST['hp'];
$almt = $_POST['alamat'];
$tgl  = $_POST['tanggal'];
$pkt  = $_POST['paket'];

// LOGIKA ANTI BENTROK (Validasi Tanggal)
// Cek apakah tanggal tersebut sudah ada yang booking dan statusnya BUKAN batal?
$cek_jadwal = mysqli_query($koneksi, "SELECT * FROM booking WHERE tanggal_booking='$tgl' AND status != 'Dibatalkan'");

if(mysqli_num_rows($cek_jadwal) > 0){
    // Jika > 0 artinya tanggal PENUH
    echo "<script>
            alert('MAAF KAK! Tanggal $tgl MUA sudah full booked. Silahkan pilih tanggal lain.');
            window.location='index.php';
          </script>";
} else {
    // Jika 0 artinya KOSONG, boleh insert
    mysqli_query($koneksi, "INSERT INTO booking VALUES('', '$nama', '$hp', '$almt', '$tgl', '$pkt', 'Pending')");
    
    echo "<script>
            alert('Yeay! Booking berhasil dikirim. Tunggu admin menghubungi via WA ya!');
            window.location='index.php';
          </script>";
}
?>