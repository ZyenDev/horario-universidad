<?php
require_once '../app/core/Database.php';

class Persona {
    protected static $table = 'persona';

    // Metodo para obtener todos los registros de la tabla asociada
    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT * FROM " . static::$table);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Encontrar un registro especifico por su id
    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo registro en la tabla asociada
    public static function create($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $cedula, $sexo, $numero_telefono, $correo) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, cedula, sexo, numero_telefono, correo) 
                               VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :cedula, :sexo, :numero_telefono, :correo)");
        
        $data = [
            'primer_nombre' => $primer_nombre,
            'segundo_nombre' => $segundo_nombre,
            'primer_apellido' => $primer_apellido,
            'segundo_apellido' => $segundo_apellido,
            'cedula' => $cedula,
            'sexo' => $sexo,
            'numero_telefono' => $numero_telefono,
            'correo' => $correo
        ];
        
        $stmt->execute($data);
    }

    // Actualizar un registro especifico por su id
    public static function update($id, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $cedula, $sexo, $numero_telefono, $correo) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE " . static::$table . " SET
                               primer_nombre = :primer_nombre,
                               segundo_nombre = :segundo_nombre,
                               primer_apellido = :primer_apellido,
                               segundo_apellido = :segundo_apellido,
                               cedula = :cedula,
                               sexo = :sexo,
                               numero_telefono = :numero_telefono,
                               correo = :correo,
                               updated_at = CURRENT_TIMESTAMP
                               WHERE id = :id");
        
        $data = [
            'id' => $id,
            'primer_nombre' => $primer_nombre,
            'segundo_nombre' => $segundo_nombre,
            'primer_apellido' => $primer_apellido,
            'segundo_apellido' => $segundo_apellido,
            'cedula' => $cedula,
            'sexo' => $sexo,
            'numero_telefono' => $numero_telefono,
            'correo' => $correo
        ];
        
        $stmt->execute($data);
    }

    // Eliminar un registro especifico por su id
    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}
