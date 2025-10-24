<h2>Daftar Pengguna</h2>
<style>
    h2 {
        margin-bottom: 10px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    table, th, td {
        border: 1px solid #ccc;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #f4f4f4;
    }
    a {
        text-decoration: none;
        color: #0066cc;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
<a href="?action=create">Tambah Pengguna</a>
<table border="1" cellpadding="6">
<tr><th>Foto</th><th>Nama</th><th>Email</th><th>Aksi</th></tr>
<?php foreach ($users as $user): ?>
<tr>
<td><img src="public/uploads/<?= $user['photo'] ?>" width="60"></td>
<td><?= htmlspecialchars($user['name']) ?></td>
<td><?= htmlspecialchars($user['email']) ?></td>
<td>
    <a href="?action=detail&id=<?= $user['id'] ?>">Detail</a> |
    <a href="?action=edit&id=<?= htmlspecialchars($user['id']) ?>">Edit</a> |
    <a href="?action=delete&id=<?= $user['id'] ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
</td>
</tr>
<?php endforeach; ?>
</table>