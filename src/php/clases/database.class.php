<?php
// Verifica que la clase no exista previamente
if (!class_exists('Database')) {

    class Database {
        // ===== Atributo estático =====
        private static $instancia = null;  // Instancia única de la clase (patrón Singleton)

        // ===== Atributos de conexión =====
        private $nombre = "chatbot_2";     // Nombre de la base de datos
        private $servidor = "localhost";   // Servidor donde corre MySQL
        private $usuario = "root";         // Usuario de la base de datos
        private $clave   = "";             // Contraseña del usuario
        private $conexion;                 // Objeto PDO para la conexión

        // ===== Constructor privado =====
        // Se ejecuta solo desde getInstance, no se puede instanciar con "new"
        private function __construct() {
            try {
                // Cadena DSN con los datos de conexión
                $dsn = "mysql:host={$this->servidor};dbname={$this->nombre};charset=utf8";

                // Se crea la conexión PDO
                $this->conexion = new PDO($dsn, $this->usuario, $this->clave);

                // Modo de errores de PDO -> Excepciones
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                // Si falla la conexión, se detiene el script mostrando el error
                die("Error de conexión: " . $e->getMessage());
            }
        }

        // ===== Método Singleton =====
        // Devuelve la única instancia de la clase Database
        public static function getInstance() {
            if (!self::$instancia) {
                self::$instancia = new Database();
            }
            return self::$instancia;
        }

        // ===== Obtener conexión =====
        // Retorna el objeto PDO para ejecutar consultas
        public function getConnection() {
            return $this->conexion;
        }
    }

}
?>
