<?php
include "database.class.php";

class Conversacion{
    private $id;
    private $preguntaUsuario;
    private $respuestaBot;
    private $fechayhora;
    private $conexion;

    public function __construct($id, $preguntaUsuario, $respuestaBot, $fechayhora, $conexion){
        $this->id = $id;
        $this->preguntaUsuario = $preguntaUsuario;
        $this->respuestaBot = $respuestaBot;
        $this->fechayhora = $fechayhora;
        $this->conexion = $conexion;
    }
    
    public function guardar(){
        
    }
    public function obtenerTodas(){
        
    }
    public function obtenerPorId(){
        
    }
}