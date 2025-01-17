<?php
namespace App\Controllers;

use App\Config\Controller;
use Profesor;

class ProfesorController extends Controller {
    // Método para listar todos los registros
    public function index() {
        $profesores = Profesor::all();
        $this->render('coordinador/profesor/', ['profesores' => $profesores]);
    }

    // Método para mostrar el formulario de creación
    public function crear() {
        $this->render('coordinador/profesor/crear');
    }

    // Método para almacenar un nuevo registro
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/profesor');
        }

        $data = $this->validateProfesorData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de profesor inválidos');
            $this->redirect('/coordinador/profesor/crear');
        }

        try {
            Profesor::create($data['fk_usuario']);
            $this->setFlash('success', 'Profesor creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el profesor: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/profesor');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $profesor = Profesor::find($id);
        if (!$profesor) {
            $this->setFlash('error', 'Profesor no encontrado');
            $this->redirect('/coordinador/profesor');
        }
        $this->render('coordinador/profesor/editar', ['profesor' => $profesor]);
    }

    // Método para actualizar un registro existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/profesor');
        }

        $data = $this->validateProfesorData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de profesor inválidos');
            $this->redirect("/coordinador/profesor/editar/$id");
        }

        try {
            Profesor::update($id, $data['fk_usuario']);
            $this->setFlash('success', 'Profesor actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el profesor: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/profesor');
    }

    // Método para eliminar un registro
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/profesor');
        }

        try {
            Profesor::delete($id);
            $this->setFlash('success', 'Profesor eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el profesor: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/profesor');
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

