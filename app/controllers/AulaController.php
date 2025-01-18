<?php
namespace App\Controllers;

use App\Config\Controller;
use Aula;

class AulaController extends Controller {
    // Método para listar todas las aulas
    public function index() {
        $aulas = Aula::all();
        $this->render('coordinador/aula/', ['aulas' => $aulas]);
    }

    // Método para mostrar el formulario de creación
    public function crear() {
        $this->render('coordinador/aula/crear');
    }

    // Método para almacenar un nuevo aula
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/aula');
        }

        $data = $this->validateAulaData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos del aula inválidos');
            $this->redirect('/coordinador/aula/crear');
        }

        try {
            Aula::create($data['codigo'], $data['fk_tipo_aula']);
            $this->setFlash('success', 'Aula creada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el aula: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/aula');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $aula = Aula::find($id);
        if (!$aula) {
            $this->setFlash('error', 'Aula no encontrada');
            $this->redirect('/coordinador/aula');
        }
        $this->render('coordinador/aula/editar', ['aula' => $aula]);
    }

    // Método para actualizar un aula existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/aula');
        }

        $data = $this->validateAulaData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos del aula inválidos');
            $this->redirect("/coordinador/aula/editar/$id");
        }

        try {
            Aula::update($id, $data['codigo'], $data['fk_tipo_aula']);
            $this->setFlash('success', 'Aula actualizada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el aula: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/aula');
    }

    // Método para eliminar un aula
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/aula');
        }

        try {
            Aula::delete($id);
            $this->setFlash('success', 'Aula eliminada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el aula: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/aula');
    }

    // Método para validar los datos del aula
    private function validateAulaData($data, $isUpdate = false) {
        $validatedData = [];

        // Validar código
        if (!empty($data['codigo'])) {
            $validatedData['codigo'] = filter_var($data['codigo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar tipo de aula
        if (!empty($data['fk_tipo_aula']) && filter_var($data['fk_tipo_aula'], FILTER_VALIDATE_INT)) {
            $validatedData['fk_tipo_aula'] = filter_var($data['fk_tipo_aula'], FILTER_SANITIZE_NUMBER_INT);
        } elseif (!$isUpdate) {
            return [];
        }

        return $validatedData;
    }
}

