<?php
// Sertakan koneksi
require 'koneksi.php';

// Hapus data jika terdapat parameter id
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM rentals WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    header("Location: tampildata.php"); // Redirect kembali ke tampildata.php
    exit;
}

// Ambil data dari tabel rentals
$stmt = $pdo->query("SELECT * FROM rentals");
$rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penyewaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        section {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid black;
        }
        th {
            background-color: #74f7;
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #74f7;
            border-radius: 5px;
            padding: 5px 10px;

        }
        a:hover {
            color: black;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        
        @media print{
            button,
            th:last-child,
            td:last-child{
                display: none;
            }
        body{
            margin:0;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th{
            background-color: #74f7;
            color: white;
        }
    }
    </style>
    <script>
    function cetaklaporan(){
        window.print();
    }
    </script>
</head>

<body>
    <section>
        <h2>Daftar Penyewaan</h2>

        <button onclick="cetaklaporan()"
        style="margin-button: 20px; padding: 10px 20px; background-color: #74f7; color: white; border: none; border-radius: 5px; cursor: pointer; font-family: Arial, sans-serif;">Cetak Laporan</button>
        <table>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php if (!empty($rentals)): ?>
                <?php foreach ($rentals as $rental): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($rental['name']); ?></td>
                        <td><?php echo htmlspecialchars($rental['email']); ?></td>
                        <td class="actions">
                            <a href="edit.php?id=<?php echo $rental['id']; ?>">Edit</a>
                            <a href="tampildata.php?id=<?php echo $rental['id']; ?>"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">Tidak ada data penyewaan.</td>
                </tr>
            <?php endif; ?>
        </table>
    </section>
</body>

</html>
