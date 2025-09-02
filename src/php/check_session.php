<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../login.html");
    exit();
}

// Verificar rol (ej: 1 = admin)
if ($_SESSION['rol_id'] != 1) {
    echo "❌ Acceso denegado. No eres administrador.";
    exit();
}
?>
