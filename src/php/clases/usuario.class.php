<?php
include_once("database.class.php");

class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol_id;
    private $conexion;

    public function __construct($id = null, $nombre = null, $email = null, $password = null, $rol_id = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol_id = $rol_id;
        $this->conexion = database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO `usuarios` (`nombre`, `email`, `password`, `rol_id`) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->nombre, $this->email, $this->password, $this->rol_id]);
    }

    public function actualizar() {
        if ($this->password === null) {
            // No actualizar password, solo otros campos
            $sql = "UPDATE usuarios SET nombre=?, email=?, rol_id=? WHERE id=?";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([$this->nombre, $this->email, $this->rol_id, $this->id]);
        } else {
            // Actualizar password también
            $sql = "UPDATE usuarios SET nombre=?, email=?, password=?, rol_id=? WHERE id=?";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([$this->nombre, $this->email, $this->password, $this->rol_id, $this->id]);
        }
    }


    public function eliminar() {
        $sql = "DELETE FROM usuarios WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public static function obtenerPorId($id) {
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios WHERE id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Usuario($resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], $resultado['rol_id']);
        }
        return null;
    }

    public static function obtenerPorEmail($email) {
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios WHERE email=?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$email]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Usuario($resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['password'], $resultado['rol_id']);
        }
        return null;
    }

    public static function verificarLogin($email, $passwordIngresada) {
        $usuario = self::obtenerPorEmail($email);
        if ($usuario && password_verify($passwordIngresada, $usuario->getPassword())) {
            return $usuario;
        }
        return null;
    }

    public static function obtenerTodas() {
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM usuarios";
        $stmt = $conexion->query($sql);
        $usuarios = [];

        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuarios[] = new Usuario($fila['id'], $fila['nombre'], $fila['email'], $fila['password'], $fila['rol_id']);
        }

        return $usuarios;
    }

    // Getters
    public function getId() {
        return $this->id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getRolId() {
        return $this->rol_id;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    public function setRolId($rol_id) {
        $this->rol_id = $rol_id;
    }
}
?>
