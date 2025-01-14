<?php
require_once '../app/core/Database.php';

class Cronograma {
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT * FROM cronogramas");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO cronogramas (subject, room, day, time) VALUES (:subject, :room, :day, :time)");
        $stmt->execute($data);
    }
}