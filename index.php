<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <head>
    <title>GlowUp MUA Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">
</head>
</head>
<body>

    <div class="hero text-center mb-5">
        <h1>✨ GlowUp MUA Artist ✨</h1>
        <p>Booking Jadwal Makeup Spesial Harimu Sekarang!</p>
        <a href="login.php" class="btn btn-light btn-sm mt-2">Login Admin</a>
    </div>

    <div class="container">
        <div class="row">
            
            <div class="col-md-6 mb-4">
                <h4 class="text-secondary">💖 Pilihan Paket</h4>
                <div class="row">
                    <?php 
                    $data = mysqli_query($koneksi, "SELECT * FROM paket");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <div class="col-6 mb-3">
                        <div class="card p-3 text-center h-100">
                            <h5><?php echo $d['nama_paket']; ?></h5>
                            <h6 class="text-danger fw-bold">Rp <?php echo number_format($d['harga']); ?></h6>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card p-4">
                    <h4 class="text-center mb-3">📅 Form Booking</h4>
                    
                    <form action="proses_booking.php" method="POST">
                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" required placeholder="Contoh: Siti Aisyah">
                        </div>
                        <div class="mb-3">
                            <label>No. WhatsApp</label>
                            <input type="number" name="hp" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Alamat Lokasi Makeup</label>
                            <textarea name="alamat" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Tanggal Acara</label>
                            <input type="date" name="tanggal" class="form-control" required>
                            <small class="text-muted">*Kami akan cek ketersediaan tanggal ini.</small>
                        </div>
                        <div class="mb-3">
                            <label>Pilih Paket</label>
                            <select name="paket" class="form-select">
                                <?php 
                                $qry = mysqli_query($koneksi, "SELECT * FROM paket");
                                while($p = mysqli_fetch_array($qry)){
                                    echo "<option value='".$p['id_paket']."'>".$p['nama_paket']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger w-100">BOOKING SEKARANG</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

</body>
</html>