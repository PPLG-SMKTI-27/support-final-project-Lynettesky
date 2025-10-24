<?php
require_once __DIR__ . '/../models/User.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

    public function index() {
        $users = $this->model->all();
        $content = __DIR__ . '/../views/users/index.php';
        include __DIR__ . '/../views/layout.php';
    }

    public function create() {
        $content = __DIR__ . '/../views/users/create.php';
        include __DIR__ . '/../views/layout.php';
    }

    public function store() {
        $this->model->create($_POST, $_FILES['photo']);
        header("Location: index.php");
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header("Location: index.php");
        exit;
    }

    public function edit($id) {
        $id = $_GET['id'];
        $user = $this->model->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email']
            ];

            // Jika ada file baru diupload
            if (!empty($_FILES['photo']['name'])) {
                $file = $_FILES['photo'];
            } else {
                $file = null;
            }

            $this->model->update($id, $data, $file);
            header("Location: index.php");
        } else {
            include __DIR__ . '/../views/users/edit.php';
        }
    }

    public function detail($id) {
        $id = $_GET['id'];
        $user = $this->model->getById($id);
        include __DIR__ . '/../views/users/detail.php';
        
    }
}
?>