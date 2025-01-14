<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Profesor.php';

use App\Core\Controller;
use App\Models\Profesor;

class ProfesorController extends Controller {
    // Método para listar todos los registros
    public function index() {
        $profesores = Profesor::all();
        $this->render('profesor/index', ['profesores' => $profesores]);
    }

    // Método para mostrar el formulario de creación
    public function create() {
        $this->render('profesor/crear');
    }

    // Método para almacenar un nuevo registro
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/profesor');
        }

        $data = $this->validateProfesorData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de profesor inválidos');
            $this->redirect('/profesor/crear');
        }

        try {
            Profesor::create($data['fk_usuario']);
            $this->setFlash('success', 'Profesor creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el profesor: ' . $e->getMessage());
        }

        $this->redirect('/profesor');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $profesor = Profesor::find($id);
        if (!$profesor) {
            $this->setFlash('error', 'Profesor no encontrado');
            $this->redirect('/profesor');
        }
        $this->render('profesor/editar', ['profesor' => $profesor]);
    }

    // Método para actualizar un registro existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/profesor');
        }

        $data = $this->validateProfesorData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de profesor inválidos');
            $this->redirect("/profesor/editar/$id");
        }

        try {
            Profesor::update($id, $data['fk_usuario']);
            $this->setFlash('success', 'Profesor actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el profesor: ' . $e->getMessage());
        }

        $this->redirect('/profesor');
    }

    // Método para eliminar un registro
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/profesor');
        }

        try {
            Profesor::delete($id);
            $this->setFlash('success', 'Profesor eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el profesor: ' . $e->getMessage());
        }

        $this->redirect('/profesor');
    }

    // Método para validar los datos de entrada
    private function validateProfesorData($data, $isUpdate = false) {
        $validatedData = [];

        // Validar fk_usuario
        if (!empty($data['fk_usuario']) && filter_var($data['fk_usuario'], FILTER_VALIDATE_INT)) {
            $validatedData['fk_usuario'] = filter_var($data['fk_usuario'], FILTER_SANITIZE_NUMBER_INT);
        } elseif (!$isUpdate) {
            return [];
        }

        return $validatedData;
    }
}
