<?php
// Mulai session di bagian paling atas file
include 'koneksi.php';
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); // <--- Ganti index.php ini dengan nama file halaman luar portfoliomu
    exit;
}

if (isset($_POST['tambah'])) {
    $nama_produk   = $_POST['nama_produk'];
    $kategori      = $_POST['kategori'];
    $harga         = $_POST['harga'];
    $tanggal_beli  = $_POST['tanggal_beli'];
    $estimasi_habis= $_POST['estimasi_habis'];
    $status_stok   = $_POST['status_stok'];

    $query = "INSERT INTO tbl_skincare (nama_produk, kategori, harga, tanggal_beli, estimasi_habis, status_stok) 
              VALUES ('$nama_produk', '$kategori', '$harga', '$tanggal_beli', '$estimasi_habis', '$status_stok')";
    
    mysqli_query($koneksi, $query);
    header("Location: skincare.php"); 
    exit;
}

if (isset($_POST['update'])) {
    $idskincare    = $_POST['idskincare'];
    $nama_produk   = $_POST['nama_produk'];
    $kategori      = $_POST['kategori'];
    $harga         = $_POST['harga'];
    $tanggal_beli  = $_POST['tanggal_beli'];
    $estimasi_habis= $_POST['estimasi_habis'];
    $status_stok   = $_POST['status_stok'];

    $query = "UPDATE tbl_skincare SET 
              nama_produk='$nama_produk', kategori='$kategori', 
              harga='$harga', tanggal_beli='$tanggal_beli', estimasi_habis='$estimasi_habis', 
              status_stok='$status_stok' WHERE idskincare=$idskincare";
              
    mysqli_query($koneksi, $query);
    header("Location: skincare.php");
    exit;
}

if (isset($_GET['hapus'])) {
    $idskincare = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM tbl_skincare WHERE idskincare=$idskincare");
    header("Location: skincare.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skincare | Portfolio</title>
    <!-- CSS Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #0a192f; /* Warna Navy Gelap */
        }

        /* Style Card & Input Transparan seperti Login Box */
        .card-custom, .input-custom {
            background-color: rgba(255, 255, 255, 0.05) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            color: #ffffff !important;
        }

        /* Latar Input saat Fokus (Diklik) */
        .input-custom:focus {
            background-color: #112240 !important;
            border-color: #0d6efd !important;
            color: #ffffff !important;
            box-shadow: none;
        }

        /* Menyesuaikan warna dropdown option */
        .input-custom option {
            background-color: #0a192f;
            color: #ffffff;
        }
    </style>
</head>
<body class="text-white py-4">

<div class="container" style="max-width: 1000px;">
    
    <!-- Header Page -->
    <div class="d-flex justify-content-between align-items-center mb-4 pb-2 border-bottom border-secondary">
        <h2 class="h4 m-0">Skincare Bulanan ✨</h2>
        <a href="skincare.php?logout=true" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin keluar?')">Logout</a>
    </div>

    <?php
    // ==========================================
    // MODE EDIT DATA
    // ==========================================
    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        $idskincare = $_GET['id']; 
        $skincare = mysqli_query($koneksi, "SELECT * FROM tbl_skincare WHERE idskincare=$idskincare");
        
        if ($skincare && mysqli_num_rows($skincare) > 0) {
            $data = mysqli_fetch_assoc($skincare);
        } else {
            echo "<div class='alert alert-danger text-center'>Data tidak ditemukan! <a href='skincare.php' class='alert-link'>Kembali</a></div>";
            exit;
        }
    ?>
        
        <!-- Form Edit -->
        <div class="card card-custom text-white mx-auto shadow-lg rounded-4" style="max-width: 500px;">
            <div class="card-body p-4">
                <h3 class="h5 text-center mb-3">Edit Data Produk</h3>
                <form method="POST">
                    <input type="hidden" name="idskincare" value="<?php echo $data['idskincare']; ?>">
                    
                    <div class="mb-3">
                        <label class="form-label text-white-50">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control input-custom" value="<?php echo htmlspecialchars($data['nama_produk']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Kategori</label>
                        <input type="text" name="kategori" class="form-control input-custom" value="<?php echo htmlspecialchars($data['kategori']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control input-custom" value="<?php echo $data['harga']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Tanggal Beli</label>
                        <input type="date" name="tanggal_beli" class="form-control input-custom" value="<?php echo $data['tanggal_beli']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Estimasi Habis</label>
                        <input type="date" name="estimasi_habis" class="form-control input-custom" value="<?php echo $data['estimasi_habis']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white-50">Status Stok</label>
                        <select name="status_stok" class="form-select input-custom" required>
                            <option value="Tersedia" <?php if($data['status_stok'] == 'Tersedia') echo 'selected'; ?>>Tersedia</option>
                            <option value="Menipis" <?php if($data['status_stok'] == 'Menipis') echo 'selected'; ?>>Menipis</option>
                            <option value="Habis" <?php if($data['status_stok'] == 'Habis') echo 'selected'; ?>>Habis</option>
                        </select>
                    </div>
                    <button type="submit" name="update" class="btn btn-primary w-100 mb-2 py-2 fw-semibold">Update Data</button>
                    <a href="skincare.php" class="btn btn-outline-secondary w-100 btn-sm">Batal</a>
                </form>
            </div>
        </div>

    <?php
    } else {
    ?>

        <!-- ========================================== -->
        <!-- MODE HALAMAN UTAMA (TAMBAH & TABEL) -->
        <!-- ========================================== -->
        
        <!-- Form Tambah -->
        <div class="card card-custom text-white mb-4 shadow-lg rounded-4">
            <div class="card-body p-4">
                <h3 class="h5 mb-3">Tambah Produk Baru</h3>
                <form method="POST">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label text-white-50">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control input-custom" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-white-50">Kategori</label>
                            <input type="text" name="kategori" class="form-control input-custom" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-white-50">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control input-custom" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-white-50">Tanggal Beli</label>
                            <input type="date" name="tanggal_beli" class="form-control input-custom" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-white-50">Estimasi Habis</label>
                            <input type="date" name="estimasi_habis" class="form-control input-custom" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-white-50">Status Stok</label>
                            <select name="status_stok" class="form-select input-custom" required>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Menipis">Menipis</option>
                                <option value="Habis">Habis</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary mt-3 py-2 px-4 fw-semibold">Simpan Produk</button>
                </form>
            </div>
        </div>

        <!-- Tabel Data -->
        <div class="card card-custom text-white shadow-lg rounded-4 overflow-hidden">
            <div class="card-body p-0 table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle" style="--bs-table-bg: transparent;">
                    <thead>
                        <tr class="border-bottom border-secondary">
                            <th class="py-3 px-3">Nama Produk</th>
                            <th class="py-3">Kategori</th>
                            <th class="py-3">Harga</th>
                            <th class="py-3">Tgl Beli</th>
                            <th class="py-3">Est. Habis</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $result = mysqli_query($koneksi, "SELECT * FROM tbl_skincare ORDER BY idskincare DESC");
                        
                        if (!$result) {
                            echo "<tr><td colspan='7' class='text-center text-danger py-3'>Error Query: " . mysqli_error($koneksi) . "</td></tr>";
                        } else if (mysqli_num_rows($result) == 0) {
                            echo "<tr><td colspan='7' class='text-center text-muted py-4'>Belum ada data skincare yang tersimpan.</td></tr>";
                        } else {
                            while($row = mysqli_fetch_assoc($result)) { 
                                $badgeColor = 'success';
                                if ($row['status_stok'] == 'Menipis') $badgeColor = 'warning';
                                if ($row['status_stok'] == 'Habis') $badgeColor = 'danger';
                        ?>
                        <tr>
                            <td class="px-3"><strong><?php echo htmlspecialchars($row['nama_produk']); ?></strong></td>
                            <td><?php echo htmlspecialchars($row['kategori']); ?></td>
                            <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td><?php echo $row['tanggal_beli']; ?></td>
                            <td><?php echo $row['estimasi_habis']; ?></td>
                            <td>
                                <span class="badge bg-<?php echo $badgeColor; ?>">
                                    <?php echo $row['status_stok']; ?>
                                </span>
                            </td>
                            <td>
                                <a href="skincare.php?action=edit&id=<?php echo $row['idskincare']; ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                                <a href="skincare.php?hapus=<?php echo $row['idskincare']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            } 
                        } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php } ?>
</div>

</body>
</html>