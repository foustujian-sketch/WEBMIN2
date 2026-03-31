<!DOCTYPE html>
<html>
<head>
    <title>Tambah Skill</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Keahlian Baru</h1>
        <form method="post" action="aksi_tambah_skill.php">
            <div class="mb-3">
                <label class="form-label">Nama Skill</label>
                <input type="text" class="form-control" name="nama_skill" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Persentase (1-100)</label>
                <input type="number" class="form-control" name="persentase" min="1" max="100" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Skill</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>