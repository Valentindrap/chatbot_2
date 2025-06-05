<?php

class Database{
    private static $instancia= null;

    private $nombre = "chatbot_2";
    private $servidor = "localhost";
    private $usuario = "root";
    private $clave = "";
    private $conexion;
    
    private function __construct($nombre, $servidor, $usuario, $clave, $conexion){
        
        try{
            $dsn= "mysql:host={$this->servidor};dbname={$this->nombre};charset=utf8";
            $this->conexion = new PDO($dsn, $this->usuario, $this->clave);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }catch(PDOException $e){
            die("Error de conexion: ". $e ->getMessage());
        }
    }


    public static function getInstance(){
        if(!self::$instancia){
            self::$instancia = new Database();
        }
        return self::$instance;
    }
    
    public function getConnection(){
        return $this->conexion;
    }
}


?>