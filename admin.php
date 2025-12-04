<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <div class="d-flex justify-content-between mb-4">
        <h3>💅 Kelola Jadwal MUA</h3>
        <a href="logout.php" class="btn btn-outline-danger">Logout</a>
    </div>

    <div class="card p-3 shadow-sm">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Tgl Acara</th>
                    <th>Nama Client</th>
                    <th>Paket</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // QUERY JOIN: Mengambil nama paket dari tabel paket berdasarkan ID
                $query = "SELECT booking.*, paket.nama_paket 
                          FROM booking 
                          JOIN paket ON booking.id_paket = paket.id_paket 
                          ORDER BY booking.tanggal_booking ASC";
                
                $result = mysqli_query($koneksi, $query);
                while($d = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td class="fw-bold"><?php echo $d['tanggal_booking']; ?></td>
                    <td>
                        <?php echo $d['nama_client']; ?><br>
                        <small class="text-muted"><?php echo $d['no_hp']; ?></small>
                    </td>
                    <td><?php echo $d['nama_paket']; ?></td>
                    <td>
                        <?php 
                        if($d['status']=='Pending'){ echo "<span class='badge bg-warning'>Pending</span>"; }
                        elseif($d['status']=='Confirmed'){ echo "<span class='badge bg-success'>Fix/DP</span>"; }
                        elseif($d['status']=='Dibatalkan'){ echo "<span class='badge bg-danger'>Batal</span>"; }
                        else { echo "<span class='badge bg-secondary'>Selesai</span>"; }
                        ?>
                    </td>
                    <td>
                        <a href="edit.php?id=<?php echo $d['id_booking']; ?>" class="btn btn-primary btn-sm">Proses</a>
                        <a href="hapus.php?id=<?php echo $d['id_booking']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini selamanya?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>