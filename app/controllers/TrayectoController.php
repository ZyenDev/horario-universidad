<?php
namespace App\Controllers;

use App\Config\Controller;
use Trayecto;

class TrayectoController extends Controller {
    // Método para listar todos los trayectos
    public function index() {
        $trayectos = Trayecto::all();
        $this->render('coordinador/trayecto/', ['trayectos' => $trayectos]);
    }

    // Método para mostrar el formulario de creación de un trayecto
    public function crear() {
        $this->render('coordinador/trayecto/crear');
    }

    // Método para almacenar un nuevo trayecto
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/trayecto');
        }

        $data = $this->validateTrayectoData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos inválidos');
            $this->redirect('/coordinador/trayecto/crear');
        }

        try {
            Trayecto::create($data['codigo'], $data['periodo']);
            $this->setFlash('success', 'Trayecto creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el trayecto: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/trayecto');
    }

    // Método para mostrar el formulario de edición de un trayecto
    public function edit($id) {
        $trayecto = Trayecto::find($id);
        if (!$trayecto) {
            $this->setFlash('error', 'Trayecto no encontrado');
            $this->redirect('/coordinador/trayecto');
        }
        $this->render('coordinador/trayecto/editar', ['trayecto' => $trayecto]);
    }

    // Método para actualizar un trayecto
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/trayecto');
        }

        $data = $this->validateTrayectoData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos inválidos');
            $this->redirect("/coordinador/trayecto/editar/$id");
        }

        try {
            Trayecto::update($id, $data['codigo'], $data['periodo']);
            $this->setFlash('success', 'Trayecto actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el trayecto: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/trayecto');
    }

    // Método para eliminar un trayecto
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/trayecto');
        }

        try {
            Trayecto::delete($id);
            $this->setFlash('success', 'Trayecto eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el trayecto: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/trayecto');
    }

    // Método para validar los datos del trayecto
    private function validateTrayectoData($data, $isUpdate = false) {
        $validatedData = [];

        // Validar código
        if (!empty($data['codigo']) && is_string($data['codigo']) && strlen($data['codigo']) > 0) {
            $validatedData['codigo'] = filter_var($data['codigo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        // Validar periodo
        if (!empty($data['periodo']) && is_string($data['periodo']) && strlen($data['periodo']) > 0) {
            $validatedData['periodo'] = filter_var($data['periodo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }

        if (empty($validatedData['codigo']) || empty($validatedData['periodo'])) {
            return [];
        }

        return $validatedData;
    }
}

