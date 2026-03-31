#  Portfolio Website (Dynamic Version) 

Website Portofolio ini telah dikembangkan dari versi statis menjadi **Dinamis**. Proyek ini merupakan representasi profesional mahasiswa **Sistem Informasi Universitas Mulawarman** yang kini terintegrasi dengan database untuk pengelolaan konten yang lebih efisien.

---

##  Teknologi & Tools
* **PHP 8.x** - Mesin utama untuk pengolahan data server-side.
* **MySQL** - Database relasional untuk menyimpan data profil dan skills.
* **Vue JS 3** - Library JavaScript untuk manajemen data reaktif di sisi client.
* **Bootstrap 5.3** - Framework CSS untuk layouting responsif dan komponen UI.
* **CSS3** - Custom styling untuk animasi transisi dan efek visual.

---

##  Pembaruan Struktur & Fitur Dinamis

### 1. Database Integration (`portobase`)
> **Fitur:** Sinkronisasi data antara server database dengan tampilan interface.

* **Penjelasan:** Data tidak lagi diketik manual di HTML. Menggunakan file `koneksi.php`, website terhubung ke database MySQL bernama `portobase`. 
* **Mekanisme:** Seluruh informasi profil dan keahlian ditarik menggunakan query SQL sehingga perubahan di database akan langsung tercermin di website secara otomatis.

### 2. Manajemen Keahlian (CRUD Skills)
> **Fitur:** Menambah dan menghapus data keahlian secara *real-time*.

* **Penjelasan:** Terdapat halaman khusus `tambah_skill.php` yang memungkinkan pengguna menginput nama skill dan persentase baru. 
* **Logika:** Data tersebut diproses oleh skrip PHP untuk dimasukkan ke tabel `skills`. Di halaman utama, tersedia tombol **Hapus** yang memicu `aksi_hapus_skill.php` untuk menghapus data berdasarkan ID unik.

### 3. Dinamisasi Sertifikat & Organisasi
> **Fitur:** Galeri sertifikat yang ditarik berdasarkan path gambar di database.

* **Penjelasan:** Gambar sertifikat kini dikelola melalui tabel `sertifikat`. Sistem memanggil file gambar dari folder `images/` berdasarkan string nama file yang tersimpan di database (contoh: `photo2.png`). 
* **Keuntungan:** Memudahkan penambahan sertifikat baru tanpa perlu menyentuh baris kode HTML sama sekali.

---


##  Struktur Folder Proyek

├── index.php             
├── koneksi.php          
├── style.css             
├── portobase.sql        
├── tambah_skill.php       
├── aksi_hapus_skill.php   
└── images/               
    ├── photo1.jpg        
    └── photo2.png        
