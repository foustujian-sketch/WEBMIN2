<?php
session_start();
require 'koneksi.php';

// 1. Ambil data profil (Hanya 1 data)
$query_profil = mysqli_query($conn, "SELECT * FROM profil LIMIT 1");
$data_profil = mysqli_fetch_assoc($query_profil);

// 2. Ambil data keahlian (Bisa banyak)
$query_skills = mysqli_query($conn, "SELECT * FROM skills");
$list_skills = [];
while($row = mysqli_fetch_assoc($query_skills)) {
    $list_skills[] = $row;
}

// 3. Ambil data sertifikat/organisasi (Bisa banyak)
// Pastikan kamu sudah membuat tabel 'sertifikat' di database portobase
$query_serti = mysqli_query($conn, "SELECT * FROM sertifikat");
$list_serti = [];
while($row = mysqli_fetch_assoc($query_serti)) {
    $list_serti[] = $row;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | <?= htmlspecialchars($data_profil['nama']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div id="app">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">AF-PORTFOLIO</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#certificates">Certificates</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-primary btn-sm ms-lg-3" href="tambah_skill.php">Kelola Data</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header id="home" class="hero-section d-flex align-items-center">
        <div class="container text-center text-white">
            <h1 class="display-2 fw-bold mb-3 fade-in">Selamat Datang</h1>
            <p class="lead mb-4 fade-in-delayed">Halo, Saya {{ profile.name }}. Mahasiswa Sistem Informasi UNMUL.</p>
            
            <div class="social-links mb-4 fade-in-delayed">
                <a href="https://www.linkedin.com/in/abdurrahman-al-farisy-580885328/" target="_blank" class="btn btn-outline-light rounded-circle mx-1"><i class="bi bi-linkedin"></i></a>
                <a href="https://github.com/foustujian-sketch" target="_blank" class="btn btn-outline-light rounded-circle mx-1"><i class="bi bi-github"></i></a>
            </div>
            
            <a href="#about" class="btn btn-primary btn-lg px-5 shadow transition-btn">Jelajahi Profil</a>
        </div>
    </header>

    <section id="about" class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-4 mb-lg-0 text-center">
                    <div class="profile-img-container shadow-lg">
                        <img src="images/photo.jpg" alt="Profile" class="img-fluid rounded">
                    </div>
                </div>
                <div class="col-lg-7 px-lg-5">
                    <h2 class="fw-bold mb-4">Profil Mahasiswa</h2>
                    <p class="text-muted fs-5 mb-4">{{ profile.description }}</p>
                    
                    <h5 class="fw-bold mb-3">Keahlian Akademik & Teknis</h5>
                    <div v-for="skill in skills" :key="skill.id" class="mb-4">
                        <div class="d-flex justify-content-between mb-1">
                            <span class="fw-semibold">{{ skill.nama_skill }}</span>
                            <span class="text-primary">{{ skill.persentase }}%</span>
                        </div>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-dark" :style="{ width: skill.persentase + '%' }"></div>
                        </div>
                        <div class="mt-2">
                            <a :href="'aksi_hapus_skill.php?id=' + skill.id" class="btn btn-sm btn-danger py-0" onclick="return confirm('Hapus skill ini?')">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="certificates" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Pengalaman Organisasi & Sertifikat</h2>
            <div class="row justify-content-center">
                <div v-for="serti in certificates" :key="serti.id" class="col-md-4 mb-4">
                    <div class="card border-0 shadow-sm certificate-card h-100">
                        <img :src="'images/' + serti.gambar" class="card-img-top" :alt="serti.nama_organisasi">
                        <div class="card-body p-4 text-center">
                            <h5 class="card-title fw-bold">{{ serti.jabatan_atau_serti }}</h5>
                            <p class="card-text text-muted">{{ serti.nama_organisasi }}</p>
                            <hr>
                            <p class="small text-secondary">{{ serti.deskripsi }}</p>
                        </div>
                    </div>
                </div>
                <p v-if="certificates.length === 0" class="text-center text-muted">Belum ada data pengalaman organisasi.</p>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-5">
        <div class="container text-center">
            <h4 class="fw-bold mb-3">Mari Terhubung</h4>
            <div class="mb-4">
                <a href="https://www.linkedin.com/in/abdurrahman-al-farisy-580885328/" target="_blank" class="text-white mx-2 fs-3"><i class="bi bi-linkedin"></i></a>
                <a href="https://github.com/foustujian-sketch" target="_blank" class="text-white mx-2 fs-3"><i class="bi bi-github"></i></a>
            </div>
            <p class="text-secondary small">&copy; 2026 {{ profile.name }}. All rights reserved.</p>
        </div>
    </footer>
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const { createApp } = Vue;
    createApp({
        data() {
            return {
                profile: {
                    name: "<?= htmlspecialchars($data_profil['nama']) ?>",
                    description: "<?= htmlspecialchars($data_profil['deskripsi']) ?>"
                },
                skills: <?= json_encode($list_skills) ?>,
                certificates: <?= json_encode($list_serti) ?>
            }
        }
    }).mount('#app');
</script>
</body>
</html>