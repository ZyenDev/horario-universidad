<?php
namespace App\Controllers;

use App\Config\Controller;
use Usuario;

class UsuarioController extends Controller {
    public function index() {
        $usuarios = Usuario::all();
        $this->render('coordinador/usuarios/', ['usuarios' => $usuarios]);
    }

    public function crear() {
        $this->render('coordinador/usuarios/crear');
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/usuarios');
        }

        $data = $this->validateUserData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de usuario inválidos');
            $this->redirect('/coordinador/usuarios/crear');
        }

        try {
            Usuario::create($data['usuario'], $data['contrasena'], $data['fk_persona'], $data['fk_rol']);
            $this->setFlash('success', 'Usuario creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el usuario: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/usuarios');
    }

    public function edit($id) {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            $this->setFlash('error', 'Usuario no encontrado');
            $this->redirect('/coordinador/usuarios');
        }
        $this->render('coordinador/usuarios/editar', ['usuario' => $usuario]);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/usuarios');
        }
    
        $data = $this->validateUserData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de usuario inválidos');
            $this->redirect("/coordinador/usuarios/editar/$id");
        }
    
        try {
            // Extract the necessary fields from $data
            $usuario = $data['usuario'] ?? null;
            $contrasena = $data['contrasena'] ?? null;
            $fk_persona = $data['fk_persona'] ?? null;
            $fk_rol = $data['fk_rol'] ?? null;
    
            // Call the update method with all required arguments
            Usuario::update($id, $usuario, $contrasena, $fk_persona, $fk_rol);
            $this->setFlash('success', 'Usuario actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el usuario: ' . $e->getMessage());
        }
    
        $this->redirect('/coordinador/usuarios');
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/usuarios');
        }

        try {
            Usuario::delete($id);
            $this->setFlash('success', 'Usuario eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el usuario: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/usuarios');
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

