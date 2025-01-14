<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/PreguntaSeguridad.php';

use App\Core\Controller;
use App\Models\PreguntaSeguridad;

class PreguntaSeguridadController extends Controller {
    // Método para listar todos los registros
    public function index() {
        $preguntas = PreguntaSeguridad::all();
        $this->render('pregunta_seguridad/index', ['preguntas' => $preguntas]);
    }

    // Método para mostrar el formulario de creación
    public function create() {
        $this->render('pregunta_seguridad/crear');
    }

    // Método para almacenar un nuevo registro
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/pregunta_seguridad');
        }

        $data = $this->validatePreguntaSeguridadData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de pregunta de seguridad inválidos');
            $this->redirect('/pregunta_seguridad/crear');
        }

        try {
            PreguntaSeguridad::create($data['respuesta'], $data['fk_tipo_pregunta_seguridad']);
            $this->setFlash('success', 'Pregunta de seguridad creada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear la pregunta de seguridad: ' . $e->getMessage());
        }

        $this->redirect('/pregunta_seguridad');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $pregunta = PreguntaSeguridad::find($id);
        if (!$pregunta) {
            $this->setFlash('error', 'Pregunta de seguridad no encontrada');
            $this->redirect('/pregunta_seguridad');
        }
        $this->render('pregunta_seguridad/editar', ['pregunta' => $pregunta]);
    }

    // Método para actualizar un registro existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/pregunta_seguridad');
        }

        $data = $this->validatePreguntaSeguridadData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de pregunta de seguridad inválidos');
            $this->redirect("/pregunta_seguridad/editar/$id");
        }

        try {
            PreguntaSeguridad::update($id, $data['respuesta'], $data['fk_tipo_pregunta_seguridad']);
            $this->setFlash('success', 'Pregunta de seguridad actualizada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar la pregunta de seguridad: ' . $e->getMessage());
        }

        $this->redirect('/pregunta_seguridad');
    }

    // Método para eliminar un registro
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/pregunta_seguridad');
        }

        try {
            PreguntaSeguridad::delete($id);
            $this->setFlash('success', 'Pregunta de seguridad eliminada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar la pregunta de seguridad: ' . $e->getMessage());
        }

        $this->redirect('/pregunta_seguridad');
    }

    // Método para validar los datos de entrada
    private function validatePreguntaSeguridadData($data, $isUpdate = false) {
        $validatedData = [];

        // Validar respuesta
        if (!empty($data['respuesta'])) {
            $validatedData['respuesta'] = filter_var($data['respuesta'], FILTER_SANITIZE_STRING);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar fk_tipo_pregunta_seguridad
        if (!empty($data['fk_tipo_pregunta_seguridad']) && filter_var($data['fk_tipo_pregunta_seguridad'], FILTER_VALIDATE_INT)) {
            $validatedData['fk_tipo_pregunta_seguridad'] = filter_var($data['fk_tipo_pregunta_seguridad'], FILTER_SANITIZE_NUMBER_INT);
        } elseif (!$isUpdate) {
            return [];
        }

        return $validatedData;
    }
}
