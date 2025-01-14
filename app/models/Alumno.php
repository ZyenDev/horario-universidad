<?php
require_once '../app/core/Database.php';

class Alumno {
    protected static $table = 'alumno';

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
    public static function create($fk_trayecto, $fk_persona) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (fk_trayecto, fk_persona) VALUES (:fk_trayecto, :fk_persona)");

        $data = [
            'fk_trayecto' => $fk_trayecto,
            'fk_persona' => $fk_persona
        ];

        $stmt->execute($data);
    }

    // Método para actualizar un registro específico por su ID.
    public static function update($id, $fk_trayecto, $fk_persona) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE " . static::$table . " SET
                               fk_trayecto = :fk_trayecto,
                               fk_persona = :fk_persona,
                               updated_at = CURRENT_TIMESTAMP
                               WHERE id = :id");

        $data = [
            'id' => $id,
            'fk_trayecto' => $fk_trayecto,
            'fk_persona' => $fk_persona
        ];

        $stmt->execute($data);
    }

    // Método para eliminar un registro específico por su ID.
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    // Método para obtener todos los alumnos de un trayecto específico.
    public static function allByTrayecto($trayectoId) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM " . static::$table . " WHERE fk_trayecto = :trayectoId");
        $stmt->execute(['trayectoId' => $trayectoId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
