<?php
require_once '../app/core/Database.php';

class Profesor {
    protected static $table = 'profesor';

    // Método para obtener todos los registros de la tabla asociada.
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT * FROM " . static::$table);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para encontrar un registro específico por su ID.
    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para crear un nuevo registro en la tabla asociada.
    public static function create($fk_usuario) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (fk_usuario) VALUES (:fk_usuario)");

        $data = [
            'fk_usuario' => $fk_usuario
        ];

        $stmt->execute($data);
    }

    // Método para actualizar un registro específico por su ID.
    public static function update($id, $fk_usuario) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE " . static::$table . " SET
                               fk_usuario = :fk_usuario,
                               updated_at = CURRENT_TIMESTAMP
                               WHERE id = :id");

        $data = [
            'id' => $id,
            'fk_usuario' => $fk_usuario
        ];

        $stmt->execute($data);
    }

    // Método para eliminar un registro específico por su ID.
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
