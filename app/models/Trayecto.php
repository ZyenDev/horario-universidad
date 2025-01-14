<?php
require_once '../app/core/Database.php';

class Trayecto {
    protected static $table = 'trayecto';

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
    public static function create($codigo, $periodo) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (codigo, periodo) VALUES (:codigo, :periodo)");

        $data = [
            'codigo' => $codigo,
            'periodo' => $periodo
        ];

        $stmt->execute($data);
    }

    // Método para actualizar un registro específico por su ID.
    public static function update($id, $codigo, $periodo) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE " . static::$table . " SET
                               codigo = :codigo,
                               periodo = :periodo,
                               updated_at = CURRENT_TIMESTAMP
                               WHERE id = :id");

        $data = [
            'id' => $id,
            'codigo' => $codigo,
            'periodo' => $periodo
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
