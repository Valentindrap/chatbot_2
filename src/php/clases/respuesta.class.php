<?php
include "database.class.php";

class Respuesta {
    private $id;
    private $respuesta;
    private $pregunta_id;
    private $conexion;

    public function __construct($id = null, $respuesta = null, $pregunta_id = null) {
        $this->id = $id;
        $this->respuesta = $respuesta;
        $this->pregunta_id = $pregunta_id;
        $this->conexion = database::getInstance()->getConnection();
    }

    public function guardar() {
        $sql = "INSERT INTO respuestas (respuesta, pregunta_id) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id]);
    }

    public function actualizar() {
        $sql = "UPDATE respuestas SET respuesta = ?, pregunta_id = ? WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->respuesta, $this->pregunta_id, $this->id]);
    }

    public function eliminar() {
        $sql = "DELETE FROM respuestas WHERE id = ?";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->id]);
    }

    public static function obtenerPorId($id) {
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuestas WHERE id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($resultado) {
            return new Respuesta($resultado['id'], $resultado['respuesta'], $resultado['pregunta_id']);
        }
        return null;
    }

    public static function obtenerTodas() {
        $conexion = database::getInstance()->getConnection();
        $sql = "SELECT * FROM respuestas";
        $stmt = $conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getID() {
        return $this->id;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }

    public function getPreguntaID() {
        return $this->pregunta_id;
    }

    public function setID($id) {
        $this->id = $id;
    }

    public function setRespuesta($respuesta) {
        $this->respuesta = $respuesta;
    }

    public function setPreguntaID($pregunta_id) {
        $this->pregunta_id = $pregunta_id;
    }
}
?>
