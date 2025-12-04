<?php 
include 'koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM booking WHERE id_booking='$id'");
$d = mysqli_fetch_array($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5" style="max-width: 500px;">
    
    <div class="card p-4">
        <h4>Update Status Booking</h4>
        <form action="proses_edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $d['id_booking']; ?>">

            <div class="mb-3">
                <label>Nama Client</label>
                <input type="text" class="form-control" value="<?php echo $d['nama_client']; ?>" disabled>
            </div>
            
            <div class="mb-3">
                <label>Tanggal Acara (Reschedule)</label>
                <input type="date" name="tanggal" class="form-control" value="<?php echo $d['tanggal_booking']; ?>">
            </div>

            <div class="mb-3">
                <label>Update Status</label>
                <select name="status" class="form-select">
                    <option value="Pending" <?php if($d['status']=='Pending') echo 'selected'; ?>>Pending (Menunggu)</option>
                    <option value="Confirmed" <?php if($d['status']=='Confirmed') echo 'selected'; ?>>Confirmed (DP Masuk)</option>
                    <option value="Done" <?php if($d['status']=='Done') echo 'selected'; ?>>Selesai (Lunas)</option>
                    <option value="Dibatalkan" <?php if($d['status']=='Dibatalkan') echo 'selected'; ?>>Batalkan</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
            <a href="admin.php" class="btn btn-link w-100 text-center mt-2">Kembali</a>
        </form>
    </div>

</body>
</html>