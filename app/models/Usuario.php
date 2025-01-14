<?php
require_once '../app/core/Database.php';

class Usuario {
    protected static $table = 'usuario';

    public static function all() {
        $db = Database::getInstance();
        $query = $db->query("SELECT * FROM " . static::$table);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function create($usuario, $contrasena, $fk_persona, $fk_rol) {
        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO " . static::$table . " (usuario, contrasena, fk_persona, fk_rol) VALUES (:usuario, :contrasena, :fk_persona, :fk_rol)");
        
        // Hashear la contraseña usando SHA256
        $contrasena_hasheada = hash('sha256', $contrasena);
        
        $data = [
            'usuario' => $usuario,
            'contrasena' => $contrasena_hasheada,
            'fk_persona' => $fk_persona,
            'fk_rol' => $fk_rol
        ];
        
        $stmt->execute($data);
    }

    public static function find($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function update($id, $usuario, $contrasena = null, $fk_persona, $fk_rol) {
        $db = Database::getInstance();
        
        // Si se proporciona una nueva contraseña, se debe hashear
        if ($contrasena) {
            $contrasena = hash('sha256', $contrasena);
            $stmt = $db->prepare("
                UPDATE " . static::$table . " 
                SET usuario = :usuario, contrasena = :contrasena, fk_persona = :fk_persona, fk_rol = :fk_rol, updated_at = CURRENT_TIMESTAMP 
                WHERE id = :id
            ");
            $data = [
                'id' => $id,
                'usuario' => $usuario,
                'contrasena' => $contrasena,
                'fk_persona' => $fk_persona,
                'fk_rol' => $fk_rol
            ];
        } else {
            // Si no se proporciona una nueva contraseña, solo actualiza los demas campos
            $stmt = $db->prepare("
                UPDATE " . static::$table . " 
                SET usuario = :usuario, fk_persona = :fk_persona, fk_rol = :fk_rol, updated_at = CURRENT_TIMESTAMP 
                WHERE id = :id
            ");
            $data = [
                'id' => $id,
                'usuario' => $usuario,
                'fk_persona' => $fk_persona,
                'fk_rol' => $fk_rol
            ];
        }
        
        $stmt->execute($data);
    }

    public static function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM " . static::$table . " WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
    
    public static function allByRole($rol) {
        $db = Database::getInstance();
        $query = "SELECT * FROM " . static::$table . " WHERE fk_rol = :rol";
        $stmt = $db->prepare($query);
        $stmt->execute(['rol' => $rol]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}