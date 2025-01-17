<?php
namespace App\Controllers;

use Alumno;
use App\Config\Controller;

class AlumnoController extends Controller {

    public function index() {
        $alumnos = Alumno::all();
        $this->render('coordinador/alumnos/', ['alumnos' => $alumnos]);
    }

    public function crear() {
        $this->render('coordinador/alumnos/crear');
    }

    public function guardar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/alumnos');
        }

        $data = $this->validateAlumnoData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos del alumno inválidos');
            $this->redirect('/coordinador/alumnos/crear');
        }

        try {
            Alumno::create($data['fk_trayecto'], $data['fk_persona']);
            $this->setFlash('success', 'Alumno creado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear el alumno: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/alumnos');
    }

    public function edit($id) {
        $alumno = Alumno::find($id);
        if (!$alumno) {
            $this->setFlash('error', 'Alumno no encontrado');
            $this->redirect('/coordinador/alumnos');
        }
        $this->render('coordinador/alumnos/editar', ['alumno' => $alumno]);
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/alumnos');
        }

        $data = $this->validateAlumnoData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos del alumno inválidos');
            $this->redirect("/coordinador/alumnos/editar/$id");
        }

        try {
            Alumno::update($id, $data['fk_trayecto'], $data['fk_persona']);
            $this->setFlash('success', 'Alumno actualizado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar el alumno: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/alumnos');
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/coordinador/alumnos');
        }

        try {
            Alumno::delete($id);
            $this->setFlash('success', 'Alumno eliminado exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar el alumno: ' . $e->getMessage());
        }

        $this->redirect('/coordinador/alumnos');
    }

    private function validateAlumnoData($data) {
        $validatedData = [];

        if (!empty($data['fk_trayecto']) && is_numeric($data['fk_trayecto'])) {
            $validatedData['fk_trayecto'] = (int)$data['fk_trayecto'];
        } else {
            return [];
        }

        if (!empty($data['fk_persona']) && is_numeric($data['fk_persona'])) {
            $validatedData['fk_persona'] = (int)$data['fk_persona'];
        } else {
            return [];
        }

        return $validatedData;
    }
}

