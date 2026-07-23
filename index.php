<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
if (isset($_POST['tambah_sosmed'])) {
    $platform = mysqli_real_escape_string($koneksi, $_POST['platform']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $link     = mysqli_real_escape_string($koneksi, $_POST['link']);

    $query = "INSERT INTO tbl_sosmed (platform, username, link) VALUES ('$platform', '$username', '$link')";
    mysqli_query($koneksi, $query);
    header("Location: index.php#contact");
    exit;
}
if (isset($_POST['update_sosmed'])) {
    $idsosmed = $_POST['idsosmed'];
    $platform = mysqli_real_escape_string($koneksi, $_POST['platform']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $link     = mysqli_real_escape_string($koneksi, $_POST['link']);

    $query = "UPDATE tbl_sosmed SET platform='$platform', username='$username', link='$link' WHERE idsosmed=$idsosmed";
    mysqli_query($koneksi, $query);
    header("Location: index.php#contact");
    exit;
}

if (isset($_GET['hapus_sosmed'])) {
    $idsosmed = $_GET['hapus_sosmed'];
    mysqli_query($koneksi, "DELETE FROM tbl_sosmed WHERE idsosmed=$idsosmed");
    header("Location: index.php#contact");
    exit;
}
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dini | Portofolio</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Poppins:wght@300;400;600&display=swap"
      rel="stylesheet"
    />

    <style>
      html {
        scroll-behavior: smooth;
      }

      body {
        font-family: "Poppins", sans-serif;
        background-color: #0b192c;
        color: #ffffff;
      }

      h1, h2, h3, h4, h5 {
        font-family: "Montserrat", sans-serif;
        font-weight: 700;
      }

      .bg-navy {
        background-color: #0b192c;
        color: #ffffff;
      }
      .bg-navy-light {
        background-color: #1e3e62;
        color: #ffffff;
      }
      .text-gold {
        color: #e6b325;
      }
      .btn-gold {
        background-color: #e6b325;
        color: #0b192c;
        font-weight: 600;
        border: none;
      }
      .btn-gold:hover {
        background-color: #cd9b1d;
        color: #0b192c;
      }
      .btn-outline-gold {
        border: 2px solid #e6b325;
        color: #e6b325;
        font-weight: 600;
      }
      .btn-outline-gold:hover {
        background-color: #e6b325;
        color: #0b192c;
      }

      section {
        padding: 100px 0 80px 0;
      }

      .img-cover-panjang {
        width: 70%;
        aspect-ratio: 2 / 3;
        object-fit: cover;
        margin: 20px auto 0 auto; 
        border-radius: 8px;
        display: block;
      }
      .hobi-card {
        border-left: 5px solid #e6b325;
        background-color: #1e3e62;
        color: #ffffff;
        transition: transform 0.2s;
      }
      .hobi-card:hover {
        transform: translateY(-5px);
      }
      .sosmed-card {
        background-color: #1e3e62 !important;
        transition: all 0.3s ease;
      }
      .sosmed-card:hover {
        transform: scale(1.05);
      }
      .card-custom, .input-custom {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        color: #ffffff !important;
      }
      .input-custom:focus {
        background-color: #1e3e62 !important;
        border-color: #e6b325 !important;
        color: #ffffff !important;
        box-shadow: none;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-navy sticky-top shadow border-bottom border-secondary">
      <div class="container">
        <a class="navbar-brand fw-bold text-gold" href="#home">PORTFOLIO</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto gap-2">
            <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#hobi">Hobi</a></li>
            <li class="nav-item"><a class="nav-link" href="#karya">Karya</a></li>
            <li class="nav-item"><a class="nav-link" href="skincare.php">Skincare</a></li>
            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <section id="home" class="bg-navy border-bottom border-secondary d-flex align-items-center justify-content-center text-center" style="min-height: 80vh;">
      <div class="container">
        <div class="row justify-content-center g-5">
          <div class="col-lg-8">
            <h1 class="display-4 fw-bold mb-3 text-white">
              WELCOME TO MY PORTFOLIO
            </h1>
            <p class="lead mb-4 text-white-50">
              Penasaran dengan saya? Yuk kepoin lebih dalam mengenai aktivitas dan karya saya.
            </p>
            <div class="d-flex justify-content-center gap-3">
              <a href="skincare.php" class="btn btn-gold btn-lg px-4 shadow">
                Skincare Bulanan
              </a>
              <a href="#contact" class="btn btn-outline-gold btn-lg px-4">
                My Social Media
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="about" class="bg-navy border-bottom border-secondary">
      <div class="container">
        <h2
          class="fw-bold text-center mb-5 text-uppercase text-white border-bottom pb-3"
          style="max-width: 250px; margin: 0 auto"
        >
          ABOUT ME
        </h2>
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="p-4 border-0 rounded shadow-sm bg-navy-light text-white">
              <h4 class="fw-bold text-gold mb-3">
                Mahasiswa Pendidikan Informatika
              </h4>
              <p class="fs-5 lh-base text-white-50 mb-0">
                Hallo! Saya adalah mahasiswa pendidikan informatika semester 4.<br />
                Nama : DINI RAHMAWATI <br />
                Umur : 21 tahun <br />
                Tempat/Tanggal lahir: Ketangge, 23/11/2005 <br />
                Kuliah di : UNIVERSITAS HAMZANWADI PANCOR <br />
                Mahasiswa angkatan : 2024 <br />
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="hobi" class="bg-navy border-top border-bottom border-secondary">
      <div class="container">
        <h2 class="fw-bold text-center mb-5 text-uppercase text-white">
          HOBI SAYA
        </h2>
        <div class="row g-4">
          <div class="col-md-6 col-lg-3">
            <div class="p-4 hobi-card rounded shadow-sm h-100">
              <h5 class="fw-bold text-gold mb-2">📖 Membaca Novel</h5>
              <p class="mb-0 text-white-50 small">
                Suka membaca novel dari berbagai macam genre untuk mengisi waktu.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="p-4 hobi-card rounded shadow-sm h-100">
              <h5 class="fw-bold text-gold mb-2">🎵 K-Pop Enthusiast</h5>
              <p class="mb-0 text-white-50 small">
                Suka K-Pop & ngestan beberapa idol group papan atas seperti "BTS".
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="p-4 hobi-card rounded shadow-sm h-100">
              <h5 class="fw-bold text-gold mb-2">🌟 Belajar Hal Baru</h5>
              <p class="mb-0 text-white-50 small">
                Selalu tertarik mempelajari tantangan baru yang belum pernah dilakukan sebelumnya.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="p-4 hobi-card rounded shadow-sm h-100">
              <h5 class="fw-bold text-gold mb-2">🎬 Nonton Drama</h5>
              <p class="mb-0 text-white-50 small">
                Gemar menonton Drama Korea (Drakor) dan Drama China (Dracin) untuk menyegarkan pikiran.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="karya" class="bg-navy border-top border-bottom border-secondary">
      <div class="container">
        <h2 class="fw-bold text-center mb-5 text-uppercase text-white">
          KARYA SAYA
        </h2>
        <div class="row g-4 justify-content-center">
          <div class="col-md-4 col-lg-4">
            <div class="card h-100 shadow-sm border-0 bg-navy-light text-white text-center overflow-hidden">
              <img
                src="gambar1.jpg"
                class="img-cover-panjang"
                alt="Proyek 1"
              />
              <div class="card-body p-4">
                <h5 class="card-title fw-bold text-gold mb-0">Karya 1</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="card h-100 shadow-sm border-0 bg-navy-light text-white text-center overflow-hidden">
              <img
                src="gambar2.jpg"
                class="img-cover-panjang"
                alt="Proyek 2"
              />
              <div class="card-body p-4">
                <h5 class="card-title fw-bold text-gold mb-0">Karya 2</h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-4">
            <div class="card h-100 shadow-sm border-0 bg-navy-light text-white text-center overflow-hidden">
              <img
                src="gambar3.jpg"
                class="img-cover-panjang"
                alt="Proyek 3"
              />
              <div class="card-body p-4">
                <h5 class="card-title fw-bold text-gold mb-0">Karya 3</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="contact" class="bg-navy border-top border-bottom border-secondary text-white">
      <div class="container">
        <h2 class="fw-bold text-center mb-5 text-uppercase text-white">
          SOSIAL MEDIA
        </h2>
        <div class="row text-center g-4 justify-content-center mb-5">
          <?php 
          $sosmed_query = mysqli_query($koneksi, "SELECT * FROM tbl_sosmed ORDER BY idsosmed DESC");
          if ($sosmed_query && mysqli_num_rows($sosmed_query) > 0) {
            while ($sosmed = mysqli_fetch_assoc($sosmed_query)) {
          ?>
              <div class="col-md-4 col-lg-3">
                <div class="p-4 rounded shadow-sm border-0 sosmed-card h-100 d-flex flex-column justify-content-between">
                  <div>
                    <h5 class="fw-bold text-gold mb-3"><?php echo htmlspecialchars($sosmed['platform']); ?></h5>
                    <p class="mb-0">
                      <a
                        href="<?php echo htmlspecialchars($sosmed['link']); ?>"
                        target="_blank"
                        class="text-decoration-none text-white fw-semibold"
                        ><?php echo htmlspecialchars($sosmed['username']); ?></a
                      >
                    </p>
                  </div>
                  <div class="mt-3 pt-2 border-top border-secondary text-center">
                    <a href="index.php?action=edit_sosmed&id=<?php echo $sosmed['idsosmed']; ?>#form-sosmed" class="btn btn-warning btn-sm py-0 px-2 me-1">Edit</a>
                    <a href="index.php?hapus_sosmed=<?php echo $sosmed['idsosmed']; ?>" class="btn btn-danger btn-sm py-0 px-2" onclick="return confirm('Yakin hapus akun sosmed ini?')">Hapus</a>
                  </div>
                </div>
              </div>
          <?php 
            }
          } else {
            echo '<div class="col-12 text-center text-white-50"><p>Belum ada data sosial media tersimpan.</p></div>';
          }
          ?>
        </div>
        <div id="form-sosmed" class="mt-4">
          <?php
          if (isset($_GET['action']) && $_GET['action'] == 'edit_sosmed') {
            $idsosmed = $_GET['id'];
            $res = mysqli_query($koneksi, "SELECT * FROM tbl_sosmed WHERE idsosmed=$idsosmed");
            if ($res && mysqli_num_rows($res) > 0) {
              $data_sosmed = mysqli_fetch_assoc($res);
            }
          ?>
            <div class="card card-custom text-white mx-auto shadow-lg rounded-4" style="max-width: 600px;">
              <div class="card-body p-4">
                <h3 class="h5 text-center mb-3 text-gold">Edit Sosial Media</h3>
                <form method="POST" action="index.php#contact">
                  <input type="hidden" name="idsosmed" value="<?php echo $data_sosmed['idsosmed']; ?>">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label text-white-50">Nama Platform</label>
                      <input type="text" name="platform" class="form-control input-custom" value="<?php echo htmlspecialchars($data_sosmed['platform']); ?>" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label text-white-50">Username / Display</label>
                      <input type="text" name="username" class="form-control input-custom" value="<?php echo htmlspecialchars($data_sosmed['username']); ?>" required>
                    </div>
                    <div class="col-12">
                      <label class="form-label text-white-50">Link Profil (URL)</label>
                      <input type="url" name="link" class="form-control input-custom" value="<?php echo htmlspecialchars($data_sosmed['link']); ?>" required>
                    </div>
                  </div>
                  <button type="submit" name="update_sosmed" class="btn btn-gold w-100 mt-3 py-2 fw-semibold">Update Sosmed</button>
                  <a href="index.php#contact" class="btn btn-outline-secondary w-100 btn-sm mt-2">Batal</a>
                </form>
              </div>
            </div>

          <?php } else { ?>
            <div class="card card-custom text-white mx-auto shadow-lg rounded-4" style="max-width: 700px;">
              <div class="card-body p-4">
                <h3 class="h5 mb-3 text-gold text-center">Tambah Sosial Media Baru</h3>
                <form method="POST" action="index.php#contact">
                  <div class="row g-3">
                    <div class="col-md-6">
                      <label class="form-label text-white-50">Nama Platform</label>
                      <input type="text" name="platform" class="form-control input-custom" placeholder="Contoh: Instagram, TikTok" required>
                    </div>
                    <div class="col-md-6">
                      <label class="form-label text-white-50">Username / Teks Link</label>
                      <input type="text" name="username" class="form-control input-custom" placeholder="@username" required>
                    </div>
                    <div class="col-12">
                      <label class="form-label text-white-50">Link Profil (URL)</label>
                      <input type="url" name="link" class="form-control input-custom" placeholder="https://..." required>
                    </div>
                  </div>
                  <button type="submit" name="tambah_sosmed" class="btn btn-gold mt-3 py-2 px-4 fw-semibold w-100">Simpan Sosmed</button>
                </form>
              </div>
            </div>

          <?php } ?>
        </div>

      </div>
    </section>
    <footer class="bg-navy text-white-50 text-center py-4 border-top border-secondary">
      <div class="container">
        <p class="mb-0 small">&copy; 2026 dinira. All rights reserved.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>