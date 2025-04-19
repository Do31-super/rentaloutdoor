<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=rpl_database", 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = 1; // ID pengguna
    $nama = 'Nama Baru';
    $email = 'emailbaru@example.com';

    if (empty($nama))
        throw new Exception("Nama tidak boleh kosong.");

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email AND id != :id");
    $stmt->execute([':email' => $email, ':id' => $id]);
    if ($stmt->fetchColumn())
        throw new Exception("Email sudah digunakan.");

    $stmt = $pdo->prepare("UPDATE users SET nama = :nama, email = :email WHERE id = :id");
    if ($stmt->execute([':nama' => $nama, ':email' => $email, ':id' => $id])) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Gagal memperbarui data.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>