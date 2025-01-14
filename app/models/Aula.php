<?php
require_once '../app/core/Database.php';

class Aula {
    protected static $table = 'aula';  // Especificar la tabla asociada

    // Obtener todas las aulas
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT * FROM " . static::$table);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Buscar un aula por su id
    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un aula
    public static function create($codigo, $fk_tipo_aula) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (codigo, fk_tipo_aula) VALUES (:codigo, :fk_tipo_aula)");
        $data = [
            'codigo' => $codigo,
            'fk_tipo_aula' => $fk_tipo_aula
        ];
        $stmt->execute($data);
    }

    // Actualizar aula por id
    public static function update($id, $codigo, $fk_tipo_aula) {
        $db = Database::getInstance();
        $stmt = $db->prepare("
            UPDATE " . static::$table . " 
            SET codigo = :codigo, 
                fk_tipo_aula = :fk_tipo_aula, 
                updated_at = CURRENT_TIMESTAMP 
            WHERE id = :id
        ");
        $data = [
            'id' => $id,
            'codigo' => $codigo,
            'fk_tipo_aula' => $fk_tipo_aula
        ];
        $stmt->execute($data);
    }

    // Eliminar un aula por su id
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
