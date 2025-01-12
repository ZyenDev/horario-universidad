<?php
require_once '../app/core/Database.php';

class Salon {
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT * FROM salones");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM salones WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO salones (name, capacity) 
                              VALUES (:name, :capacity)");
        $stmt->execute($data);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE salones SET name = :name, capacity = :capacity 
                              WHERE id = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM salones WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}