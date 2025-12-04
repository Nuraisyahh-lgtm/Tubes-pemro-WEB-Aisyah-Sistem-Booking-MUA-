<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_mua");

// Error Handling (Syarat Tubes)
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>