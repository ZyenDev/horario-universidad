<?php
require_once '../app/core/Database.php';

class Usuario {
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT * FROM usuarios");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO usuarios (name, email, role) VALUES (:name, :email, :role)");
        $stmt->execute($data);
    }

    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $data) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE usuarios SET name = :name, email = :email, role = :role WHERE id = :id");
        $data['id'] = $id;
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM usuarios WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
    
    protected static $table = 'usuarios';

    public static function allByRole($role) {
        $db = Database::getInstance();
        $query = "SELECT * FROM " . static::$table . " WHERE role = :role";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}