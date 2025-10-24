<?php
require_once __DIR__ . '/../../config/Database.php';

class User {
    private $conn;
    private $table = "users";

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function all() {
        $stmt = $this->conn->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data, $file) {
        $photo = null;
        if (!empty($file['name'])) {
            $filename = time() . '_' . basename($file['name']);
            $path = __DIR__ . '/../../public/uploads/' . $filename;
            move_uploaded_file($file['tmp_name'], $path);
            $photo = $filename;
        }

        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, email, photo) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['email'], $photo]);
    }

    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $data, $file = null) {
        $photo = null;

        if (!empty($file['name'])) {
            $filename = time() . '_' . basename($file['name']);
            $path = __DIR__ . '/../../public/uploads/' . $filename;

            if (!file_exists(dirname($path))) {
                mkdir(dirname($path), 0777, true);
            }

            move_uploaded_file($file['tmp_name'], $path);
            $photo = $filename;
        }

        if ($photo) {
            $query = "UPDATE {$this->table} SET name = :name, email = :email, photo = :photo WHERE id = :id";
        } else {
            $query = "UPDATE {$this->table} SET name = :name, email = :email WHERE id = :id";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':id', $id);

        if ($photo) {
            $stmt->bindParam(':photo', $photo);
        }

        return $stmt->execute();
    }

    public function delete($id) {
        $user = $this->getById($id);

        if (!empty($user['photo'])) {
            $filePath = __DIR__ . '/../../public/uploads/' . $user['photo'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
