<?php 
session_start();
include 'koneksi.php';

$user = $_POST['user'];
$pass = $_POST['pass'];

$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$user' AND password='$pass'");

if(mysqli_num_rows($data) > 0){
    $_SESSION['admin_mua'] = $user;
    $_SESSION['status'] = "login";

    // --- INI TAMBAHAN COOKIE-NYA ---
    if(isset($_POST['ingat_aku'])){
        // Buat cookie bernama 'mua_login' isinya username, berlaku 1 jam
        setcookie('mua_login', $user, time() + 3600); 
    }
    // -------------------------------

    header("location:admin.php");
}
?>