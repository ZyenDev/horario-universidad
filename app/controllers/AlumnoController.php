<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Alumno.php';

use App\Core\Controller;
use App\Models\Alumno;

class AlumnoController extends Controller {
    // Método para listar todos los alumnos
    public function index() {
        $alumnos = Alumno::all();
        $this->render('alumno/index', ['alumnos' => $alumnos]);
    }

    // Método para mostrar el formulario de creación
    public function create() {
        $this->render('alumno/crear');
    }

    // Método para almacenar un nuevo alumno
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/alumno');
        }

        $data = $this->validateAlumnoData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos del alumno inválidos');
            $this->redirect('/alumno/crear');
        }

        try {
            Alumno::create($data['fk_trayecto'], $data['fk_persona']);
            $this->setFlash('success', 'Alumno creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el alumno: ' . $e->getMessage());
        }

        $this->redirect('/alumno');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            $this->setFlash('error', 'Alumno no encontrado');
            $this->redirect('/alumno');
        }
        $this->render('alumno/editar', ['alumno' => $alumno]);
    }

    // Método para actualizar un alumno existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/alumno');
        }

        $data = $this->validateAlumnoData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos del alumno inválidos');
            $this->redirect("/alumno/editar/$id");
        }

        try {
            Alumno::update($id, $data['fk_trayecto'], $data['fk_persona']);
            $this->setFlash('success', 'Alumno actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el alumno: ' . $e->getMessage());
        }

        $this->redirect('/alumno');
    }

    // Método para eliminar un alumno
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/alumno');
        }

        try {
            Alumno::delete($id);
            $this->setFlash('success', 'Alumno eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el alumno: ' . $e->getMessage());
        }

        $this->redirect('/alumno');
    }

    // Método para validar los datos del alumno
    private function validateAlumnoData($data) {
        $validatedData = [];

        // Validar fk_trayecto
        if (!empty($data['fk_trayecto']) && is_numeric($data['fk_trayecto'])) {
            $validatedData['fk_trayecto'] = (int)$data['fk_trayecto'];
        } else {
            return [];
        }

        // Validar fk_persona
        if (!empty($data['fk_persona']) && is_numeric($data['fk_persona'])) {
            $validatedData['fk_persona'] = (int)$data['fk_persona'];
        } else {
            return [];
        }

        return $validatedData;
    }
}
