<?php
require_once '../app/core/Controller.php';
require_once '../app/models/Salon.php';

use App\Core\Controller;

class SalonController extends Controller {
    public function index() {
        $salones = Salon::all();
        $this->render('salones/index', ['salones' => $salones]);
    }

    public function create() {
        $this->render('salones/crear');
    }

    public function store() {
        $data = [
            'name' => $_POST['name'],
            'capacidad' => $_POST['capacidad']
        ];
        Salon::create($data);
        header("Location: /salones");
    }

    public function edit($id) {
        $salon = Salon::find($id);
        $this->render('salones/editar', ['salon' => $salon]);
    }

    public function update($id) {
        $data = [
            'name' => $_POST['name'],
            'capacidad' => $_POST['capacidad']
        ];
        Salon::update($id, $data);
        header("Location: /salones");
    }

    public function delete($id) {
        Salon::delete($id);
        header("Location: /salones");
    }
}