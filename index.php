<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
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

      h1,
      h2,
      h3,
      h4,
      h5 {
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
  width: 70%; /* Gambar akan mengambil 80% dari lebar kartu (pas, tidak kepenuhan/kekecilan) */
  aspect-ratio: 2 / 3;
  object-fit: cover;
  margin: 20px auto 0 auto; /* Memposisikan di tengah */
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

    <!-- HOME -->
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

    <!-- ABOUT ME -->
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

    <!-- HOBI -->
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
      
      <!-- Kolom Proyek 1 -->
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
      
      <!-- Kolom Proyek 2 -->
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

      <!-- Kolom Proyek 3 -->
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
        <div class="row text-center g-4 justify-content-center">
          <div class="col-md-4 col-lg-3">
            <div class="p-4 rounded shadow-sm border-0 sosmed-card h-100">
              <h5 class="fw-bold text-gold mb-3">Instagram</h5>
              <p class="mb-0">
                <a
                  href="https://instagram.com/bungbengbong3"
                  target="_blank"
                  class="text-decoration-none text-white fw-semibold"
                  >@bungbengbong3</a
                >
              </p>
            </div>
          </div>
          <div class="col-md-4 col-lg-3">
            <div class="p-4 rounded shadow-sm border-0 sosmed-card h-100">
              <h5 class="fw-bold text-gold mb-3">YouTube</h5>
              <p class="mb-0">
                <a
                  href="https://youtube.com/@drw1306"
                  target="_blank"
                  class="text-decoration-none text-white fw-semibold"
                  >@drw1306</a
                >
              </p>
            </div>
          </div>
          <div class="col-md-4 col-lg-3">
            <div class="p-4 rounded shadow-sm border-0 sosmed-card h-100">
              <h5 class="fw-bold text-gold mb-3">GitHub</h5>
              <p class="mb-0">
                <a
                  href="https://github.com/dinirahmawati231105-create"
                  target="_blank"
                  class="text-decoration-none text-white fw-semibold"
                  >dinirahmawati231105</a
                >
              </p>
            </div>
          </div>
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