<?php
namespace App\Controllers;

use App\Config\Controller;
use Coordinador;

class CoordinadorController extends Controller {
    // Método para listar todos los registros
    public function index() {
        $coordinadores = Coordinador::all();
        $this->render('coordinador/', ['coordinadores' => $coordinadores]);
    }

    // Método para mostrar el formulario de creación
    public function create() {
        $this->render('coordinador/crear');
    }

    // Método para almacenar un nuevo registro
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador');
        }

        $data = $this->validateCoordinadorData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de coordinador inválidos');
            $this->redirect('/coordinador/crear');
        }

        try {
            Coordinador::create($data['fk_usuario']);
            $this->setFlash('success', 'Coordinador creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el coordinador: ' . $e->getMessage());
        }

        $this->redirect('/coordinador');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $coordinador = Coordinador::find($id);
        if (!$coordinador) {
            $this->setFlash('error', 'Coordinador no encontrado');
            $this->redirect('/coordinador');
        }
        $this->render('coordinador/editar', ['coordinador' => $coordinador]);
    }

    // Método para actualizar un registro existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador');
        }

        $data = $this->validateCoordinadorData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de coordinador inválidos');
            $this->redirect("/coordinador/editar/$id");
        }

        try {
            Coordinador::update($id, $data['fk_usuario']);
            $this->setFlash('success', 'Coordinador actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el coordinador: ' . $e->getMessage());
        }

        $this->redirect('/coordinador');
    }

    // Método para eliminar un registro
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador');
        }

        try {
            Coordinador::delete($id);
            $this->setFlash('success', 'Coordinador eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el coordinador: ' . $e->getMessage());
        }

        $this->redirect('/coordinador');
    }

    // Método para validar los datos de entrada
    private function validateCoordinadorData($data, $isUpdate = false) {
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
