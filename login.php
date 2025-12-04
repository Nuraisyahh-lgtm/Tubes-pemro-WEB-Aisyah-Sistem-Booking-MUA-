<!DOCTYPE html>
<html>
<head>
    <title>Login MUA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card p-4 shadow" style="width: 350px;">
        <h4 class="text-center">Login Admin MUA</h4>
        <?php 
        if(isset($_GET['pesan'])){
            echo "<div class='alert alert-danger py-1'>Login Gagal!</div>";
        }
        ?>
        <form action="cek_login.php" method="POST">
            <div class="mb-3">
                <input type="text" name="user" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <input type="password" name="pass" class="form-control" placeholder="Password" required>
            </div>
            <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" name="ingat_aku">
    <label class="form-check-label">Ingat Saya (Cookie)</label>
</div>
            <button class="btn btn-primary w-100">Masuk</button>
        </form>
        <div class="text-center mt-3"><a href="index.php">Kembali ke Home</a></div>
    </div>
</body>
</html>