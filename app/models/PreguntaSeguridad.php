<?php
require_once '../app/core/Database.php';

class PreguntaSeguridad {
    protected static $table = 'pregunta_seguridad';

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
    public static function create($respuesta, $fk_tipo_pregunta_seguridad) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (respuesta, fk_tipo_pregunta_seguridad) 
                               VALUES (:respuesta, :fk_tipo_pregunta_seguridad)");
        
        $data = [
            'respuesta' => $respuesta,
            'fk_tipo_pregunta_seguridad' => $fk_tipo_pregunta_seguridad
        ];
        
        $stmt->execute($data);
    }

    // Método para actualizar un registro específico por su ID.
    public static function update($id, $respuesta, $fk_tipo_pregunta_seguridad) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE " . static::$table . " SET
                               respuesta = :respuesta,
                               fk_tipo_pregunta_seguridad = :fk_tipo_pregunta_seguridad,
                               updated_at = CURRENT_TIMESTAMP
                               WHERE id = :id");
        
        $data = [
            'id' => $id,
            'respuesta' => $respuesta,
            'fk_tipo_pregunta_seguridad' => $fk_tipo_pregunta_seguridad
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
