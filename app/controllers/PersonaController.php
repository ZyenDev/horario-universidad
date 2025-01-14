<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Persona.php';

use App\Core\Controller;
use App\Models\Persona;

class PersonaController extends Controller {
    // Método para listar todos los registros
    public function index() {
        $personas = Persona::all();
        $this->render('persona/index', ['personas' => $personas]);
    }

    // Método para mostrar el formulario de creación
    public function create() {
        $this->render('persona/crear');
    }

    // Método para almacenar un nuevo registro
    public function store() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/persona');
        }

        $data = $this->validatePersonaData($_POST);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de persona inválidos');
            $this->redirect('/persona/crear');
        }

        try {
            Persona::create(
                $data['primer_nombre'], $data['segundo_nombre'],
                $data['primer_apellido'], $data['segundo_apellido'],
                $data['cedula'], $data['sexo'],
                $data['numero_telefono'], $data['correo']
            );
            $this->setFlash('success', 'Persona creada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al crear la persona: ' . $e->getMessage());
        }

        $this->redirect('/persona');
    }

    // Método para mostrar el formulario de edición
    public function edit($id) {
        $persona = Persona::find($id);
        if (!$persona) {
            $this->setFlash('error', 'Persona no encontrada');
            $this->redirect('/persona');
        }
        $this->render('persona/editar', ['persona' => $persona]);
    }

    // Método para actualizar un registro existente
    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/persona');
        }

        $data = $this->validatePersonaData($_POST, true);
        if (empty($data)) {
            $this->setFlash('error', 'Datos de persona inválidos');
            $this->redirect("/persona/editar/$id");
        }

        try {
            Persona::update(
                $id,
                $data['primer_nombre'], $data['segundo_nombre'],
                $data['primer_apellido'], $data['segundo_apellido'],
                $data['cedula'], $data['sexo'],
                $data['numero_telefono'], $data['correo']
            );
            $this->setFlash('success', 'Persona actualizada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al actualizar la persona: ' . $e->getMessage());
        }

        $this->redirect('/persona');
    }

    // Método para eliminar un registro
    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $this->redirect('/persona');
        }

        try {
            Persona::delete($id);
            $this->setFlash('success', 'Persona eliminada exitosamente');
        } catch (\Exception $e) {
            $this->setFlash('error', 'Error al eliminar la persona: ' . $e->getMessage());
        }

        $this->redirect('/persona');
    }

    // Método para validar los datos de entrada
    private function validatePersonaData($data, $isUpdate = false) {
        $validatedData = [];

        // Validar primer nombre
        if (!empty($data['primer_nombre'])) {
            $validatedData['primer_nombre'] = filter_var($data['primer_nombre'], FILTER_SANITIZE_STRING);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar segundo nombre
        if (!empty($data['segundo_nombre'])) {
            $validatedData['segundo_nombre'] = filter_var($data['segundo_nombre'], FILTER_SANITIZE_STRING);
        }

        // Validar primer apellido
        if (!empty($data['primer_apellido'])) {
            $validatedData['primer_apellido'] = filter_var($data['primer_apellido'], FILTER_SANITIZE_STRING);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar segundo apellido
        if (!empty($data['segundo_apellido'])) {
            $validatedData['segundo_apellido'] = filter_var($data['segundo_apellido'], FILTER_SANITIZE_STRING);
        }

        // Validar cédula
        if (!empty($data['cedula']) && filter_var($data['cedula'], FILTER_VALIDATE_INT)) {
            $validatedData['cedula'] = filter_var($data['cedula'], FILTER_SANITIZE_NUMBER_INT);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar sexo
        if (!empty($data['sexo'])) {
            $validatedData['sexo'] = filter_var($data['sexo'], FILTER_SANITIZE_STRING);
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar número de teléfono
        if (!empty($data['numero_telefono']) && preg_match('/^[0-9]{10}$/', $data['numero_telefono'])) {
            $validatedData['numero_telefono'] = $data['numero_telefono'];
        } elseif (!$isUpdate) {
            return [];
        }

        // Validar correo
        if (!empty($data['correo']) && filter_var($data['correo'], FILTER_VALIDATE_EMAIL)) {
            $validatedData['correo'] = filter_var($data['correo'], FILTER_SANITIZE_EMAIL);
        } elseif (!$isUpdate) {
            return [];
        }

        return $validatedData;
    }
}