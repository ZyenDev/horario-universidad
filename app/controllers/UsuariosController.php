<?php
require_once '../app/core/Controller.php';
require_once '../app/models/Usuario.php';

use App\Core\Controller;

class UserController extends Controller {
    public function index() {
        $usuarios = Usuario::all();
        $this->render('usuarios/index', ['usuarios' => $usuarios]);
    }

    public function create() {
        $this->render('usuarios/crear');
    }

    public function store() {
        $data = $_POST;
        Usuario::create($data);
        header("Location: /usuarios");
    }

    public function edit() {
        $id = $_GET['id'];
        $usuario = Usuario::find($id);
        $this->render('usuarios/editar', ['usuario' => $usuario]);
    }

    public function update() {
        $id = $_POST['id'];
        $data = $_POST;
        Usuario::update($id, $data);
        header("Location: /usuarios");
    }

    public function delete() {
        $id = $_GET['id'];
        Usuario::delete($id);
        header("Location: /usuarios");
    }
}