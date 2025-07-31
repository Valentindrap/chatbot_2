<?php
include "database.class.php";

class Conversacion{
    private $id;
    private $preguntaUsuario;
    private $respuestaBot;
    private $fechayhora;
    private $conexion;

    public function __construct($id = null, $preguntaUsuario = null, $respuestaBot = null, $fechayhora = null){
        $this->id = $id;
        $this->preguntaUsuario = $preguntaUsuario;
        $this->respuestaBot = $respuestaBot;
        $this->fechayhora = $fechayhora;
        $this->conexion = database::getInstance()->getConnection();
    }

    // Guardar una nueva conversación
    public function guardar(){
        $sql = "INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->preguntaUsuario, $this->respuestaBot, $this->fechayhora]);
    }

    // Obtener todas las conversaciones
    public function obtenerTodas(){
        $sql = "SELECT * FROM conversaciones";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una conversación por su ID
    public function obtenerPorId($id){
        $sql = "SELECT * FROM conversaciones WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Conversacion($resultado['id'], $resultado['pregunta_usuario'], $resultado['respuesta_bot'], $resultado['fecha_hora']);
        }
        return null;
    }

    // Getters y Setters
    public function getId(){
        return $this->id;
    }

    public function getPreguntaUsuario(){
        return $this->preguntaUsuario;
    }

    public function getRespuestaBot(){
        return $this->respuestaBot;
    }

    public function getFechayhora(){
        return $this->fechayhora;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setPreguntaUsuario($preguntaUsuario){
        $this->preguntaUsuario = $preguntaUsuario;
    }

    public function setRespuestaBot($respuestaBot){
        $this->respuestaBot = $respuestaBot;
    }

    public function setFechayhora($fechayhora){
        $this->fechayhora = $fechayhora;
    }
}
?>
<?php
include "database.class.php";

class Conversacion{
    private $id;
    private $preguntaUsuario;
    private $respuestaBot;
    private $fechayhora;
    private $conexion;

    public function __construct($id = null, $preguntaUsuario = null, $respuestaBot = null, $fechayhora = null){
        $this->id = $id;
        $this->preguntaUsuario = $preguntaUsuario;
        $this->respuestaBot = $respuestaBot;
        $this->fechayhora = $fechayhora;
        $this->conexion = database::getInstance()->getConnection();
    }

    // Guardar una nueva conversación
    public function guardar(){
        $sql = "INSERT INTO conversaciones (pregunta_usuario, respuesta_bot, fecha_hora) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([$this->preguntaUsuario, $this->respuestaBot, $this->fechayhora]);
    }

    // Obtener todas las conversaciones
    public function obtenerTodas(){
        $sql = "SELECT * FROM conversaciones";
        $stmt = $this->conexion->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una conversación por su ID
    public function obtenerPorId($id){
        $sql = "SELECT * FROM conversaciones WHERE id=?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([$id]);
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            return new Conversacion($resultado['id'], $resultado['pregunta_usuario'], $resultado['respuesta_bot'], $resultado['fecha_hora']);
        }
        return null;
    }

    // Getters y Setters
    public function getId(){
        return $this->id;
    }

    public function getPreguntaUsuario(){
        return $this->preguntaUsuario;
    }

    public function getRespuestaBot(){
        return $this->respuestaBot;
    }

    public function getFechayhora(){
        return $this->fechayhora;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setPreguntaUsuario($preguntaUsuario){
        $this->preguntaUsuario = $preguntaUsuario;
    }

    public function setRespuestaBot($respuestaBot){
        $this->respuestaBot = $respuestaBot;
    }

    public function setFechayhora($fechayhora){
        $this->fechayhora = $fechayhora;
    }
}
?>
