<?php
require_once '../app/core/Database.php';

class TipoAula {
    protected static $table = 'tipo_aula';  // Especificar la tabla asociada

    // Obtener todos los tipos de aula
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT id, nombre, created_at, updated_at FROM " . static::$table);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar un tipo de aula por su id
    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT id, nombre, created_at, updated_at FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo tipo de aula
    public static function create($nombre) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (nombre) VALUES (:nombre)");
        $stmt->execute(['nombre' => $nombre]);
    }

    // Actualizar un tipo de aula por su id
    public static function update($id, $nombre) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            UPDATE " . static::$table . " 
            SET nombre = :nombre, updated_at = CURRENT_TIMESTAMP 
            WHERE id = :id
        ");
        $data = [
            'id' => $id,
            'nombre' => $nombre
        ];
        $stmt->execute($data);
    }

    // Eliminar un tipo de aula por su id
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
