<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengguna</title>
</head>
<body>
    <h2>Detail Pengguna</h2>

    <?php if (!empty($user)): ?>
        <img src="public/uploads/<?= htmlspecialchars($user['photo']); ?>" 
             width="120" style="border-radius:50%;"><br><br>

        <b>Nama:</b> <?= htmlspecialchars($user['name']); ?><br>
        <b>Email:</b> <?= htmlspecialchars($user['email']); ?><br>
        <b>Dibuat pada:</b> <?= htmlspecialchars($user['created_at'] ?? '-'); ?><br><br>

        <a href="index.php">← Kembali ke daftar pengguna</a> |
        <a href="index.php?action=edit&id=<?= $user['id']; ?>">Edit</a>
    <?php else: ?>
        <p>Data pengguna tidak ditemukan.</p>
        <a href="index.php">Kembali</a>
    <?php endif; ?>
</body>
</html>
