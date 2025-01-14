<?php
require_once '../app/core/Database.php';

class Planificacion {
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT p.*, s.name as subject, r.name as room 
                             FROM planificacion p
                             JOIN materias s ON p.materia_id = s.id
                             JOIN salones r ON p.salon_id = r.id");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO planificacion (materia_id, salon_id, day, time_start, time_end) 
                              VALUES (:materia_id, :salon_id, :day, :time_start, :time_end)");
        $stmt->execute($data);
    }
}