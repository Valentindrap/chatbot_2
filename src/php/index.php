<?php
// Incluir las clases necesarias
require_once('clases/Chatbot.class.php');

$chatbot = new Chatbot();  // Crear una instancia de la clase Chatbot

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $texto_usuario = $_POST["text"];
    $respuesta_bot = $chatbot->responder($texto_usuario);  // Obtener la respuesta del chatbot

    // Guardar la conversación
    $chatbot->guardarConversacion($texto_usuario, $respuesta_bot);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Consultas VegeBot777</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/chat.css">
    <link rel="icon" href="../img/mascota-chatbot.png">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <header>
        <h1>Bienvenido al Sistema de Gestión de Consultas</h1>
        <p>Chatbot VegeBot777</p>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
        </ul>
    </nav>

    <main>
        <section>
            <h2>Conoce a nuestro Chatbot</h2>
            <p>Chatbot "VegeBot777" sabe mucho sobre la informática</p>
            <img src="../img/mascota-chatbot.png" alt="Imagen del chatbot" style="width: 200px; height: 200px;">
        </section>

        <div class="wrapper">
            <div class="title">Chatea con VegeBot777</div>

            <div class="form">
                <div class="bot-inbox inbox">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="msg-header">
                        <p>Hola, ¿cómo puedo ayudarte hoy?</p>
                    </div>
                </div>
            </div>

            <div class="typing-field">
                <div class="input-data">
                    <form method="POST" action="index.php">
                        <input id="data" type="text" name="text" placeholder="Escribe algo aquí..." required>
                        <button type="submit" id="send-btn">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div>
            <img src="../img/logo.png" style="width: 100px; height: 100px;">
        </div>
        <div>
            <p>Integrantes: Valentín Drapanti - Agustín Casado</p>
            <p>&copy; Grupo N°1</p>
            <p>7I - Programación III</p>
        </div>
    </footer>
</body>
<script>
    $(document).ready(function() {
        // Mostrar la respuesta en el chat
        $('#send-btn').on('click', function() {
            var valor = $('#data').val();
            var msg = '<div class="user-inbox inbox"> <div class="msg-header"><p class="TextoEnviado">'+valor+'</p></div></div>';
            $(".form").append(msg);
            $('#data').val('');

            // Enviar mensaje al servidor
            $.ajax({
                url: 'index.php',
                type: 'POST',
                data: { text: valor },
                success: function(response) {
                    var respuesta = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + response + '</p></div></div>';
                    $(".form").append(respuesta);
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        });
    });
</script>
</html>
