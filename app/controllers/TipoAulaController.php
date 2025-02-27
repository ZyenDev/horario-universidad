<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/TipoAula.php';

use App\Core\Controller;
use App\Models\TipoAula;

class TipoAulaController extends Controller {
    // Método para listar todos los tipos de aula
    public function index() {
        $tiposAula = TipoAula::all();
        $this->render('tipo_aula/index', ['tiposAula' => $tiposAula]);
    }

    // Método para mostrar el formulario de creación de un tipo de aula
    public function create() {
        $this->render('tipo_aula/crear');
    }

    // Método para almacenar un nuevo tipo de aula
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/tipo_aula');
        }

        $data = $this->validateTipoAulaData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Nombre de tipo de aula inválido');
            $this->redirect('/tipo_aula/crear');
        }

        try {
            TipoAula::create($data['nombre']);
            $this->setFlash('success', 'Tipo de aula creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el tipo de aula: ' . $e->getMessage());
        }

        $this->redirect('/tipo_aula');
    }

    // Método para mostrar el formulario de edición de un tipo de aula
    public function edit($id) {
        $tipoAula = TipoAula::find($id);
        if (!$tipoAula) {
            $this->setFlash('error', 'Tipo de aula no encontrado');
            $this->redirect('/tipo_aula');
        }
        $this->render('tipo_aula/editar', ['tipoAula' => $tipoAula]);
    }

    // Método para actualizar un tipo de aula
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/tipo_aula');
        }

        $data = $this->validateTipoAulaData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Nombre de tipo de aula inválido');
            $this->redirect("/tipo_aula/editar/$id");
        }

        try {
            TipoAula::update($id, $data['nombre']);
            $this->setFlash('success', 'Tipo de aula actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el tipo de aula: ' . $e->getMessage());
        }

        $this->redirect('/tipo_aula');
    }

    // Método para eliminar un tipo de aula
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/tipo_aula');
        }

        try {
            TipoAula::delete($id);
            $this->setFlash('success', 'Tipo de aula eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el tipo de aula: ' . $e->getMessage());
        }

        $this->redirect('/tipo_aula');
    }

    // Método para validar los datos de entrada para el tipo de aula
    private function validateTipoAulaData($data, $isUpdate = false) {
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
