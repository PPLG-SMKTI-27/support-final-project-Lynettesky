<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h2 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        img {
            border-radius: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        a {
            text-decoration: none;
            color: #0066cc;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Edit Data Pengguna</h2>

    <form method="POST" enctype="multipart/form-data" action="">
        <label>Nama:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']); ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>" required><br><br>

        <label>Foto Saat Ini:</label><br>
        <?php if (!empty($user['photo'])): ?>
            <img src="public/uploads/<?= htmlspecialchars($user['photo']); ?>" width="120" alt="Foto Pengguna"><br><br>
        <?php else: ?>
            <p><em>Tidak ada foto.</em></p><br>
        <?php endif; ?>

        <label>Ganti Foto:</label><br>
        <input type="file" name="photo"><br><br>

        <button type="submit">Simpan Perubahan</button>
    </form>

    <br>
    <a href="index.php">← Kembali</a>
</body>
</html>

