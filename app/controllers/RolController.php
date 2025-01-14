<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Rol.php';

use App\Core\Controller;
use App\Models\Rol;

class RolController extends Controller {
    // Método para listar todos los registros
    public function index() {
        $roles = Rol::all();
        $this->render('rol/index', ['roles' => $roles]);
    }

    // Método para mostrar el formulario de creación
    public function create() {
        $this->render('rol/crear');
    }

    // Método para almacenar un nuevo registro
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/rol');
        }

        $data = $this->validateRolData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Nombre de rol inválido');
            $this->redirect('/rol/crear');
        }

        try {
            Rol::create($data['nombre']);
            $this->setFlash('success', 'Rol creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el rol: ' . $e->getMessage());
        }

        $this->redirect('/rol');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $rol = Rol::find($id);
        if (!$rol) {
            $this->setFlash('error', 'Rol no encontrado');
            $this->redirect('/rol');
        }
        $this->render('rol/editar', ['rol' => $rol]);
    }

    // Método para actualizar un registro existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/rol');
        }

        $data = $this->validateRolData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Nombre de rol inválido');
            $this->redirect("/rol/editar/$id");
        }

        try {
            Rol::update($id, $data['nombre']);
            $this->setFlash('success', 'Rol actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el rol: ' . $e->getMessage());
        }

        $this->redirect('/rol');
    }

    // Método para eliminar un registro
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/rol');
        }

        try {
            Rol::delete($id);
            $this->setFlash('success', 'Rol eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el rol: ' . $e->getMessage());
        }

        $this->redirect('/rol');
    }

    // Método para validar los datos de entrada
    private function validateRolData($data, $isUpdate = false) {
        $validatedData = [];

        // Validar nombre
        if (!empty($data['nombre']) && is_string($data['nombre']) && strlen($data['nombre']) > 0) {
            $validatedData['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
        } elseif (!$isUpdate) {
            return [];
        }

        return $validatedData;
    }
}
