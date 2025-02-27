<?php
require_once '../app/core/Database.php';

class Materia {
    protected static $table = 'materias';  // Especificar la tabla asociada

    // Obtener todas las materias
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT nombre FROM " . static::$table);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar una materia por su id
    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT nombre FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear una nueva materia
    public static function create($nombre) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (nombre) VALUES (:nombre)");
        $data = [
            'nombre' => $nombre
        ];

        $stmt->execute($data);
    }

    // Actualizar una materia por su id
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

    // Eliminar una materia por su id
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
