<?php
require_once '../app/core/Controller.php';
require_once '../app/models/Planificacion.php';
require_once '../app/models/Materia.php';
require_once '../app/models/Salon.php';

use App\Core\Controller;

class PlanificacionController extends Controller {
    public function index() {
        $planificacion = Planificacion::all();
        $this->render('planificacion/index', ['planificacion' => $planificacion]);
    }

    public function create() {
        $materias = Materia::all();
        $salones = Salon::all();
        $this->render('planificacion/crear', ['materias' => $materias, 'salones' => $salones]);
    }

    public function store() {
        $data = $_POST;
        Planificacion::create($data);
        header("Location: /planificacion");
    }

    public function export() {
        $planificacion = Planificacion::all();
    
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="planificacion.csv"');
    
        $output = fopen('php://output', 'w');
        fputcsv($output, ['Materia', 'Salon', 'Día', 'Hora de Inicio', 'Hora de Fin']);
    
        foreach ($planificacion as $row) {
            fputcsv($output, [
                $row['materia'],
                $row['salon'],
                $row['day'],
                $row['time_start'],
                $row['time_end']
            ]);
        }
    
        fclose($output);
    }
}