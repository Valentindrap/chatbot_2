<?php 
// Definimos constantes para los parámetros de conexión a la base de datos.
define("SERVIDOR","localhost"); // El nombre del servidor o la dirección IP donde se aloja la base de datos.
define("USUARIO","root"); // El nombre de usuario para acceder a la base de datos.
define("PASSWORD",""); // La contraseña del usuario para la base de datos.
define("DB","chatbot_2"); // El nombre de la base de datos con la que se va a trabajar.

    try{
        
        $pdo = new PDO("mysql:host=" . SERVIDOR . ";dbname=" . DB . ";charset=utf8", USUARIO, PASSWORD);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    }   catch(PDOException $e){
        
        echo "Error de conexion: " . $e->getMessage();
    }
?>