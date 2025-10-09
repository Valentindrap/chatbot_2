<?php
include_once("database.class.php");

class Usuario {
    // ===== Atributos privados =====
    private $id;        // Identificador único del usuario
    private $nombre;    // Nombre del usuario
    private $email;     // Email del usuario
    private $password;  // Contraseña (se almacena en hash)
    private $rol_id;    // ID del rol asociado al usuario
    private $conexion;  // Conexión a la base de datos (PDO)

    // ===== Constructor =====
    public function __construct($id = null, $nombre = null, $email = null, $password = null, $rol_id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol_id = $rol_id;

        // Conexión obtenida mediante Singleton
        $this->conexion = Database::getInstance()->getConnection();
    }

    // ===== Crear / Guardar =====
    // Inserta un nuevo usuario en la BD (password se guarda hasheado)
    public function guardar() {
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->email, $hash, $this->rol_id]);
    }

    // ===== Actualizar =====
    // Si password es null, no lo cambia. Si se pasa, lo re-hashea.
    public function actualizar() {
        if ($this->password === null) {
            $sql = "UPDATE usuarios SET nombre=?, email=?, rol_id=? WHERE id=?";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([$this->nombre, $this->email, $this->rol_id, $this->id]);
        } else {
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nombre=?, email=?, password=?, rol_id=? WHERE id=?";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([$this->nombre, $this->email, $hash, $this->rol_id, $this->id]);
        }
    }

    // ===== Eliminar =====
    // Borra un usuario de la base de datos
    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    // ===== Leer =====
    // Busca un usuario por ID
    public static function obtenerPorId($id) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Usuario(
                $resultado['id'],
                $resultado['nombre'],
                $resultado['email'],
                $resultado['password'],
                $resultado['rol_id']
            );
        }
        return null;
    }

    // Busca un usuario por email
    public static function obtenerPorEmail($email) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios WHERE email=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Usuario(
                $resultado['id'],
                $resultado['nombre'],
                $resultado['email'],
                $resultado['password'],
                $resultado['rol_id']
            );
        }
        return null;
    }

    // Verifica credenciales de login (password_verify)
    public static function verificarLogin($email, $passwordIngresada) {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT id, nombre, email, password, rol_id FROM usuarios WHERE email=? LIMIT 1";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) return null;

        // Se quitan posibles espacios extra (si password estaba en CHAR en la DB)
        $hash = rtrim($row['password']);

        // Se valida la contraseña
        if (password_verify($passwordIngresada, $hash)) {
            return new Usuario($row['id'], $row['nombre'], $row['email'], $row['password'], $row['rol_id']);
        }
        return null;
    }

    // Obtiene todos los usuarios (como array de objetos Usuario)
    public static function obtenerTodas() {
        $conexion = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios";
        $stmt = $conexion->query($sql);
        $usuarios = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario(
                $fila['id'],
                $fila['nombre'],
                $fila['email'],
                $fila['password'],
                $fila['rol_id']
            );
        }
        return $usuarios;
    }

    // ===== Getters =====
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getRolId() { return $this->rol_id; }

    // ===== Setters =====
    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = $password; }
    public function setRolId($rol_id) { $this->rol_id = $rol_id; }
}
?>
