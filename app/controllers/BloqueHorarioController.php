<?php
namespace App\Controllers;

require_once '../Core/Controller.php';
require_once '../Models/BloqueHorario.php';

use App\Core\Controller;
use App\Models\BloqueHorario;

class BloqueHorarioController extends Controller {
    // Método para listar todos los registros
    public function index() {
        $bloques = BloqueHorario::all();
        $this->render('coordinador/bloque_horario/index', ['bloques' => $bloques]);
    }

    // Método para mostrar el formulario de creación
    public function crear() {
        $this->render('coordinador/bloque_horario/crear');
    }

    // Método para almacenar un nuevo registro
    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/bloque_horario');
        }

        $data = $this->validateBloqueHorarioData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de bloque horario inválidos');
            $this->redirect('/coordinador/bloque_horario/crear');
        }

        try {
            BloqueHorario::create(
                $data['fk_trayecto'], $data['fk_aula'],
                $data['fk_profesor'], $data['fk_materia'],
                $data['hora']
            );
            $this->setFlash('success', 'Bloque horario creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el bloque horario: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/bloque_horario');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $bloque = BloqueHorario::find($id);
        if (!$bloque) {
            $this->setFlash('error', 'Bloque horario no encontrado');
            $this->redirect('/coordinador/bloque_horario');
        }
        $this->render('coordinador/bloque_horario/editar', ['bloque' => $bloque]);
    }

    // Método para actualizar un registro existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/bloque_horario');
        }

        $data = $this->validateBloqueHorarioData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de bloque horario inválidos');
            $this->redirect("/coordinador/bloque_horario/editar/$id");
        }

        try {
            BloqueHorario::update(
                $id,
                $data['fk_trayecto'], $data['fk_aula'],
                $data['fk_profesor'], $data['fk_materia'],
                $data['hora']
            );
            $this->setFlash('success', 'Bloque horario actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el bloque horario: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/bloque_horario');
    }

    // Método para eliminar un registro
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/bloque_horario');
        }

        try {
            BloqueHorario::delete($id);
            $this->setFlash('success', 'Bloque horario eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el bloque horario: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/bloque_horario');
    }

    // Método para validar los datos de entrada
    private function validateBloqueHorarioData($data, $isUpdate = false) {
        $validatedData = [];

        // Validar fk_trayecto
        if (!empty($data['fk_trayecto']) && filter_var($data['fk_trayecto'], FILTER_VALIDATE_INT)) {
            $validatedData['fk_trayecto'] = filter_var($data['fk_trayecto'], FILTER_SANITIZE_NUMBER_INT);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar fk_aula
        if (!empty($data['fk_aula']) && filter_var($data['fk_aula'], FILTER_VALIDATE_INT)) {
            $validatedData['fk_aula'] = filter_var($data['fk_aula'], FILTER_SANITIZE_NUMBER_INT);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar fk_profesor
        if (!empty($data['fk_profesor']) && filter_var($data['fk_profesor'], FILTER_VALIDATE_INT)) {
            $validatedData['fk_profesor'] = filter_var($data['fk_profesor'], FILTER_SANITIZE_NUMBER_INT);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar fk_materia
        if (!empty($data['fk_materia']) && filter_var($data['fk_materia'], FILTER_VALIDATE_INT)) {
            $validatedData['fk_materia'] = filter_var($data['fk_materia'], FILTER_SANITIZE_NUMBER_INT);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar hora
        if (!empty($data['hora']) && preg_match('/^([01]?[0-9]|2[0-3]):([0-5][0-9])$/', $data['hora'])) {
            $validatedData['hora'] = filter_var($data['hora'], FILTER_SANITIZE_STRING);
        } elseif (!$isUpdate) {
            return [];
        }

        return $validatedData;
    }
}

