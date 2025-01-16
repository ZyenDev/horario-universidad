<?php
namespace App\Controllers;

require_once '../Core/Controller.php';
require_once '../Models/TipoPreguntaSeguridad.php';

use App\Core\Controller;
use App\Models\TipoPreguntaSeguridad;

class TipoPreguntaSeguridadController extends Controller {
    // Método para listar todos los tipos de pregunta de seguridad
    public function index() {
        $tiposPreguntaSeguridad = TipoPreguntaSeguridad::all();
        $this->render('coordinador/tipo_pregunta_seguridad/index', ['tiposPreguntaSeguridad' => $tiposPreguntaSeguridad]);
    }

    // Método para mostrar el formulario de creación de un tipo de pregunta de seguridad
    public function crear() {
        $this->render('coordinador/tipo_pregunta_seguridad/crear');
    }

    // Método para almacenar un nuevo tipo de pregunta de seguridad
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/tipo_pregunta_seguridad');
        }

        $data = $this->validateTipoPreguntaSeguridadData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Nombre de tipo de pregunta de seguridad inválido');
            $this->redirect('/coordinador/tipo_pregunta_seguridad/crear');
        }

        try {
            TipoPreguntaSeguridad::create($data['nombre']);
            $this->setFlash('success', 'Tipo de pregunta de seguridad creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el tipo de pregunta de seguridad: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/tipo_pregunta_seguridad');
    }

    // Método para mostrar el formulario de edición de un tipo de pregunta de seguridad
    public function edit($id) {
        $tipoPreguntaSeguridad = TipoPreguntaSeguridad::find($id);
        if (!$tipoPreguntaSeguridad) {
            $this->setFlash('error', 'Tipo de pregunta de seguridad no encontrado');
            $this->redirect('/coordinador/tipo_pregunta_seguridad');
        }
        $this->render('coordinador/tipo_pregunta_seguridad/editar', ['tipoPreguntaSeguridad' => $tipoPreguntaSeguridad]);
    }

    // Método para actualizar un tipo de pregunta de seguridad
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/tipo_pregunta_seguridad');
        }

        $data = $this->validateTipoPreguntaSeguridadData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Nombre de tipo de pregunta de seguridad inválido');
            $this->redirect("/coordinador/tipo_pregunta_seguridad/editar/$id");
        }

        try {
            TipoPreguntaSeguridad::update($id, $data['nombre']);
            $this->setFlash('success', 'Tipo de pregunta de seguridad actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el tipo de pregunta de seguridad: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/tipo_pregunta_seguridad');
    }

    // Método para eliminar un tipo de pregunta de seguridad
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/tipo_pregunta_seguridad');
        }

        try {
            TipoPreguntaSeguridad::delete($id);
            $this->setFlash('success', 'Tipo de pregunta de seguridad eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el tipo de pregunta de seguridad: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/tipo_pregunta_seguridad');
    }

    // Método para validar los datos de entrada para el tipo de pregunta de seguridad
    private function validateTipoPreguntaSeguridadData($data, $isUpdate = false) {
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

