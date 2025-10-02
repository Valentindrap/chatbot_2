<?php include("src/php/check_session.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gaucho AI - Panel de Control</title>
  <link rel="icon" href="src/img/logo.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="src/css/panel.css">

</head>
<body>
  <div class="container">
    <!-- Botón logout -->
    <div class="logout">
      <a href="src/php/login.controller.php?operacion=logout">
        <i class="fas fa-sign-out-alt"></i>
        <span>Cerrar sesión</span>
      </a>
    </div>


    <header>
      <h1>Panel de Control GauchoAI</h1>
      <p>Gestiona todos los aspectos del sistema de inteligencia artificial desde un solo lugar</p>
    </header>

    <!-- Categoría -->
    <h2><i class="fas fa-folder"></i> Categorías</h2>
    <div class="menu">
      <a href="src/php/formAltaCategoria.php">
        <i class="fas fa-plus-circle"></i>
        <span>Alta Categoría</span>
      </a>

      <a href="src/php/listarCategoria.php">
        <i class="fas fa-list"></i>
        <span>Listar Categorías</span>
      </a>
    </div>

    <!-- Usuario -->
    <h2><i class="fas fa-users"></i> Usuarios</h2>
    <div class="menu">
      <a href="src/php/formAltaUsuario.php">
        <i class="fas fa-user-plus"></i>
        <span>Alta Usuario</span>
      </a>

      <a href="src/php/listarUsuario.php">
        <i class="fas fa-users-cog"></i>
        <span>Listar Usuarios</span>
      </a>
    </div>

    <!-- Rol -->
    <h2><i class="fas fa-user-tag"></i> Roles</h2>
    <div class="menu">
      <a href="src/php/formAltaRol.php">
        <i class="fas fa-plus-square"></i>
        <span>Alta Rol</span>
      </a>

      <a href="src/php/listarRol.php">
        <i class="fas fa-list-alt"></i>
        <span>Listar Roles</span>
      </a>
    </div>

    <!-- Pregunta -->
    <h2><i class="fas fa-question-circle"></i> Preguntas</h2>
    <div class="menu">
      <a href="src/php/formAltaPregunta.php">
        <i class="fas fa-plus"></i>
        <span>Alta Pregunta</span>
      </a>

      <a href="src/php/listarPregunta.php">
        <i class="fas fa-tasks"></i>
        <span>Listar Preguntas</span>
      </a>
    </div>

    <!-- Respuesta -->
    <h2><i class="fas fa-comment-dots"></i> Respuestas</h2>
    <div class="menu">
      <a href="src/php/formAltaRespuesta.php">
        <i class="fas fa-plus"></i>
        <span>Alta Respuesta</span>
      </a>

      <a href="src/php/listarRespuesta.php">
        <i class="fas fa-list-ul"></i>
        <span>Listar Respuestas</span>
      </a>
    </div>
  </div>

  <script>
    // Efecto de aparición escalonada para los elementos del menú
    document.addEventListener('DOMContentLoaded', function() {
      const menuItems = document.querySelectorAll('.menu a');
      
      menuItems.forEach((item, index) => {
        item.style.animation = `fadeIn 0.5s ease ${index * 0.1}s forwards`;
        item.style.opacity = '0';
      });
    });
  </script>
</body>
</html>