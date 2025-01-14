<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Trayecto.php';

use App\Core\Controller;
use App\Models\Trayecto;

class TrayectoController extends Controller {
    // Método para listar todos los trayectos
    public function index() {
        $trayectos = Trayecto::all();
        $this->render('trayecto/index', ['trayectos' => $trayectos]);
    }

    // Método para mostrar el formulario de creación de un trayecto
    public function create() {
        $this->render('trayecto/crear');
    }

    // Método para almacenar un nuevo trayecto
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/trayecto');
        }

        $data = $this->validateTrayectoData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos inválidos');
            $this->redirect('/trayecto/crear');
        }

        try {
            Trayecto::create($data['codigo'], $data['periodo']);
            $this->setFlash('success', 'Trayecto creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el trayecto: ' . $e->getMessage());
        }

        $this->redirect('/trayecto');
    }

    // Método para mostrar el formulario de edición de un trayecto
    public function edit($id) {
        $trayecto = Trayecto::find($id);
        if (!$trayecto) {
            $this->setFlash('error', 'Trayecto no encontrado');
            $this->redirect('/trayecto');
        }
        $this->render('trayecto/editar', ['trayecto' => $trayecto]);
    }

    // Método para actualizar un trayecto
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/trayecto');
        }

        $data = $this->validateTrayectoData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos inválidos');
            $this->redirect("/trayecto/editar/$id");
        }

        try {
            Trayecto::update($id, $data['codigo'], $data['periodo']);
            $this->setFlash('success', 'Trayecto actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el trayecto: ' . $e->getMessage());
        }

        $this->redirect('/trayecto');
    }

    // Método para eliminar un trayecto
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/trayecto');
        }

        try {
            Trayecto::delete($id);
            $this->setFlash('success', 'Trayecto eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el trayecto: ' . $e->getMessage());
        }

        $this->redirect('/trayecto');
    }

    // Método para validar los datos del trayecto
    private function validateTrayectoData($data, $isUpdate = false) {
        $validatedData = [];

        // Validar código
        if (!empty($data['codigo']) && is_string($data['codigo']) && strlen($data['codigo']) > 0) {
            $validatedData['codigo'] = filter_var($data['codigo'], FILTER_SANITIZE_STRING);
        }

        // Validar periodo
        if (!empty($data['periodo']) && is_string($data['periodo']) && strlen($data['periodo']) > 0) {
            $validatedData['periodo'] = filter_var($data['periodo'], FILTER_SANITIZE_STRING);
        }

        if (empty($validatedData['codigo']) || empty($validatedData['periodo'])) {
            return [];
        }

        return $validatedData;
    }
}
