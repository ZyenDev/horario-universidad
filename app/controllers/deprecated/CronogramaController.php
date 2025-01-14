<?php
require_once '../app/core/Controller.php';
require_once '../app/models/Schedule.php';

use App\Core\Controller;

class ScheduleController extends Controller {
    public function index() {
        $cronograma = Cronograma::all();
        $this->render('cronograma/index', ['cronograma' => $cronograma]);
    }

    public function create() {
        $this->render('cronograma/crear');
    }

    public function store() {
        $data = $_POST;
        Cronograma::create($data);
        header("Location: /cronograma");
    }
}