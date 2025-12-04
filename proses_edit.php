<?php 
include 'koneksi.php';
$id = $_POST['id'];
$tgl = $_POST['tanggal'];
$stt = $_POST['status'];

mysqli_query($koneksi, "UPDATE booking SET tanggal_booking='$tgl', status='$stt' WHERE id_booking='$id'");
header("location:admin.php");
?>