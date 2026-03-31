<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_skill = $_POST["nama_skill"];
    $persentase = $_POST["persentase"];

    $sql = "INSERT INTO skills (nama_skill, persentase) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nama_skill, $persentase);

    $stmt->execute();
    $stmt->close();
    $conn->close();
    
    header('Location: index.php');
    exit;
}
?>