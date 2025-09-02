<?php
session_start();
session_unset();    // limpia variables de sesión
session_destroy();  // destruye sesión

header("Location: ../../login.html"); // redirige al login
exit();
?>
