<?php
include "database.class.php";

class Usuario{
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $rol;
    private $conexion;

    public function __construct($id, $nombre, $email, $password, $rol, $conexion){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
        $this->conexion = $conexion;
    }
    
    public function guardar(){
        
    }
    public function obtenerTodas(){
        
    }
    public function obtenerPorId(){
        
    }
    public function obtenerPorEmail(){

    }
    public function verificarLogin(){

    }
}