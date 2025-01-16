<?php
namespace App\Controllers;

require_once '../Core/Controller.php';
require_once '../Models/Materia.php';

use App\Core\Controller;
use App\Models\Materia;

class MateriaController extends Controller {
    // Método para listar todas las materias
    public function index() {
        $materias = Materia::all();
        $this->render('coordinador/materia/index', ['materias' => $materias]);
    }

    // Método para mostrar el formulario de creación
    public function crear() {
        $this->render('coordinador/materia/crear');
    }

    // Método para almacenar una nueva materia
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/materia');
        }

        $data = $this->validateMateriaData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de la materia inválidos');
            $this->redirect('/coordinador/materia/crear');
        }

        try {
            Materia::create($data['nombre']);
            $this->setFlash('success', 'Materia creada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear la materia: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/materia');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $materia = Materia::find($id);
        if (!$materia) {
            $this->setFlash('error', 'Materia no encontrada');
            $this->redirect('/coordinador/materia');
        }
        $this->render('coordinador/materia/editar', ['materia' => $materia]);
    }

    // Método para actualizar una materia existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/materia');
        }

        $data = $this->validateMateriaData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de la materia inválidos');
            $this->redirect("/coordinador/materia/editar/$id");
        }

        try {
            Materia::update($id, $data['nombre']);
            $this->setFlash('success', 'Materia actualizada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar la materia: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/materia');
    }

    // Método para eliminar una materia
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/materia');
        }

        try {
            Materia::delete($id);
            $this->setFlash('success', 'Materia eliminada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar la materia: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/materia');
    }

    // Método para validar los datos de la materia
    private function validateMateriaData($data) {
        $validatedData = [];

        // Validar nombre
        if (!empty($data['nombre'])) {
            $validatedData['nombre'] = filter_var($data['nombre'], FILTER_SANITIZE_STRING);
        } else {
            return [];
        }

        return $validatedData;
    }
}

