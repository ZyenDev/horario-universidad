<?php
require_once '../app/core/Database.php';

class Materia {
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT s.*, u.name as profesor 
                             FROM materias s 
                             JOIN usuarios u ON s.profesor_id = u.id 
                             WHERE u.role = 'profesor'");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT s.*, u.name as profesor 
                              FROM materias s 
                              JOIN usuarios u ON s.profesor_id = u.id 
                              WHERE s.id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO materias (name, profesor_id) 
                              VALUES (:name, :profesor_id)");
        $stmt->execute($data);
    }

    public static function assignStudents($materiaId, $estudianteIds) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO materia_estudiante (estudiante_id, estudiante_id) 
                              VALUES (:estudiante_id, :estudiante_id)");
        foreach ($estudianteIds as $estudianteId) {
            $stmt->execute(['materia_id' => $materiaId, 'estudiante_id' => $estudianteId]);
        }
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM materias WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}