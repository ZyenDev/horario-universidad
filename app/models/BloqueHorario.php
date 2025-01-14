<?php
require_once '../app/core/Database.php';

class BloqueHorario {
    protected static $table = 'bloque_horario';

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
    public static function create($fk_trayecto, $fk_aula, $fk_profesor, $fk_materia, $hora) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (fk_trayecto, fk_aula, fk_profesor, fk_materia, hora) 
                               VALUES (:fk_trayecto, :fk_aula, :fk_profesor, :fk_materia, :hora)");

        $data = [
            'fk_trayecto' => $fk_trayecto,
            'fk_aula' => $fk_aula,
            'fk_profesor' => $fk_profesor,
            'fk_materia' => $fk_materia,
            'hora' => $hora
        ];

        $stmt->execute($data);
    }

    // Método para actualizar un registro específico por su ID.
    public static function update($id, $fk_trayecto, $fk_aula, $fk_profesor, $fk_materia, $hora) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE " . static::$table . " SET
                               fk_trayecto = :fk_trayecto,
                               fk_aula = :fk_aula,
                               fk_profesor = :fk_profesor,
                               fk_materia = :fk_materia,
                               hora = :hora,
                               updated_at = CURRENT_TIMESTAMP
                               WHERE id = :id");

        $data = [
            'id' => $id,
            'fk_trayecto' => $fk_trayecto,
            'fk_aula' => $fk_aula,
            'fk_profesor' => $fk_profesor,
            'fk_materia' => $fk_materia,
            'hora' => $hora
        ];

        $stmt->execute($data);
    }

    // Método para eliminar un registro específico por su ID.
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    // Método para obtener todos los registros asociados a un trayecto específico.
    public static function allByTrayecto($fk_trayecto) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM " . static::$table . " WHERE fk_trayecto = :fk_trayecto");
        $stmt->execute(['fk_trayecto' => $fk_trayecto]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
