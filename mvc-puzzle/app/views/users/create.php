<style>
    form {
        margin-top: 20px;
    }
    input[type="text"], input[type="email"] {
        margin-bottom: 10px;
        width: 300px;
        padding: 5px;
    }
    button {
        padding: 5px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
</style>

<h2>Tambah Pengguna</h2>
<form method="POST" action="?action=store" enctype="multipart/form-data">
    Nama: <input type="text" name="name"><br>
    Email: <input type="email" name="email"><br>
    Foto: <input type="file" name="photo"><br>
    <button type="submit">Simpan</button>
</form>