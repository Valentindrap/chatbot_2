<?php
session_start();
require_once("./clases/database.class.php"); // asegúrate de que la ruta es correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Obtener conexión
        $db = Database::getInstance()->getConnection();

        // Buscar usuario
        $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            // Verificar contraseña
            if (password_verify($password, $usuario['password'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['rol_id'] = $usuario['rol_id'];

                header("Location: ../../entrada.php"); // lleva al menú principal
                exit();
            } else {
                echo "❌ Contraseña incorrecta";
            }
        } else {
            echo "❌ Usuario no encontrado";
        }
    } catch (PDOException $e) {
        echo "Error en login: " . $e->getMessage();
    }
}
?>
