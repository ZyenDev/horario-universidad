<?php
require_once '../app/core/Controller.php';
require_once '../app/models/Subject.php';
require_once '../app/models/Usuario.php';

use App\Core\Controller;

class MateriaController extends Controller {
    public function index() {
        $materias = Materia::all();
        $this->render('materias/index', ['materias' => $materias]);
    }

    public function create() {
        $profesores = Usuario::allByRole('profesor');
        $estudiantes = Usuario::allByRole('estudiante');
        $this->render('materias/crear', ['profesores' => $profesores, 'estudiantes' => $estudiantes]);
    }

    public function store() {
        $data = [
            'name' => $_POST['name'],
            'profesor_id' => $_POST['profesor_id']
        ];
        $materiaId = Materia::create($data);

        if (!empty($_POST['estudiantes'])) {
            Materia::assignStudents($materiaId, $_POST['estudiantes']);
        }

        header("Location: /materias");
    }

    public function edit($id) {
        $materia = Materia::find($id);
        $this->render('materias/editar', ['materia' => $materia]);
    }

    public function update($id) {
        $data = [
            'name' => $_POST['name'],
            'profesor_id' => $_POST['profesor_id']
        ];
        Salon::update($id, $data);
        header("Location: /materias");
    }

    public function delete($id) {
        Materia::delete($id);
        header("Location: /materias");
    }
}