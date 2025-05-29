<?php

class Database{
    
    private $nombre = "chatbot_2";
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $conexion;
    
    public function __construct($nombre, $servidor, $usuario, $clave, $conexion){
        
        $this->nombre = $nombre;
        $this->servidor = $servidor;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->conexion = $conexion;
    }

    public function getConection(){
    }

    public function execute(){
    }

    public function query(){
    }
        