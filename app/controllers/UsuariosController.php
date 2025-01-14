<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Usuario.php';

use App\Core\Controller;
use App\Models\Usuario;

class UsuarioController extends Controller {
    public function index() {
        $usuarios = Usuario::all();
        $this->render('usuarios/index', ['usuarios' => $usuarios]);
    }

    public function create() {
        $this->render('usuarios/crear');
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/usuarios');
        }

        $data = $this->validateUserData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de usuario inválidos');
            $this->redirect('/usuarios/crear');
        }

        try {
            Usuario::create($data['usuario'], $data['contrasena'], $data['fk_persona'], $data['fk_rol']);
            $this->setFlash('success', 'Usuario creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el usuario: ' . $e->getMessage());
        }

        $this->redirect('/usuarios');
    }

    public function edit($id) {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            $this->setFlash('error', 'Usuario no encontrado');
            $this->redirect('/usuarios');
        }
        $this->render('usuarios/editar', ['usuario' => $usuario]);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/usuarios');
        }

        $data = $this->validateUserData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de usuario inválidos');
            $this->redirect("/usuarios/editar/$id");
        }

        try {
            Usuario::update($id, $data);
            $this->setFlash('success', 'Usuario actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el usuario: ' . $e->getMessage());
        }

        $this->redirect('/usuarios');
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/usuarios');
        }

        try {
            Usuario::delete($id);
            $this->setFlash('success', 'Usuario eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el usuario: ' . $e->getMessage());
        }

        $this->redirect('/usuarios');
    }

    private function validateUserData($data, $isUpdate = false) {
        $validatedData = [];

        if (!$isUpdate) {
            if (empty($data['usuario']) || !filter_var($data['usuario'], FILTER_VALIDATE_EMAIL)) {
                return [];
            }
            $validatedData['usuario'] = filter_var($data['usuario'], FILTER_SANITIZE_EMAIL);

            if (empty($data['contrasena']) || strlen($data['contrasena']) < 8) {
                return [];
            }
            $validatedData['contrasena'] = $data['contrasena'];
        }

        if (!$isUpdate || !empty($data['fk_persona'])) {
            if (empty($data['fk_persona']) || !filter_var($data['fk_persona'], FILTER_VALIDATE_INT)) {
                return [];
            }
            $validatedData['fk_persona'] = filter_var($data['fk_persona'], FILTER_SANITIZE_NUMBER_INT);
        }

        if (!$isUpdate || !empty($data['fk_rol'])) {
            if (empty($data['fk_rol']) || !filter_var($data['fk_rol'], FILTER_VALIDATE_INT)) {
                return [];
            }
            $validatedData['fk_rol'] = filter_var($data['fk_rol'], FILTER_SANITIZE_NUMBER_INT);
        }

        return $validatedData;
    }
}