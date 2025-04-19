<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM rentals WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    $rental = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $stmt = $pdo->prepare("UPDATE rentals SET name = :name, email = :email WHERE id = :id");
    $stmt->execute(['name' => $name, 'email' => $email, 'id' => $_GET['id']]);
    header("Location: tampildata.php"); // Mengarahkan ke tampildata.php
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <style>
        /* Gaya untuk seluruh halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Gaya untuk form container */
        form {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        /* Gaya untuk input teks */
        input[type="text"],
        input[type="email"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid black;
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        /* Efek hover dan fokus pada input */
        input[type="text"]:focus,
        input[type="email"]:focus {
            border-color: #74f7;
            outline: none;
        }

        /* Gaya untuk tombol */
        button[type="submit"] {
            padding: 10px;
            background-color: #74f7;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        /* Efek hover dan klik pada tombol */
        button[type="submit"]:hover {
            background-color: whitesmoke;
        }
        button[type="submit"]:active {
            transform: scale(0.97);
        }
    </style>
</head>

<body>
    <form method="POST">
        <input type="text" name="name" value="<?php echo htmlspecialchars($rental['name']); ?>" required placeholder="Nama">
        <input type="email" name="email" value="<?php echo htmlspecialchars($rental['email']); ?>" required placeholder="Email">
        <button type="submit">Update</button>
    </form>
</body>

</html>
