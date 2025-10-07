<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VegeBot777 - Chatbot Inteligente</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="icon" href="../img/mascota-chatbot.png">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>
    <div class="app-container">
        <!-- Header -->
        <header class="app-header">
            <a href="../../login.php" class="login-button">
                <span class="icon-login"></span>
                Iniciar Sesión
            </a>
            <h1>VegeBot777</h1>
            <p class="subtitle">Tu asistente inteligente de informática</p>
        </header>

        <!-- Navigation -->


        <!-- Main Content -->
        <main class="main-content">
            <!-- Bot Info Panel -->
            <aside class="bot-info-panel">
                <div class="bot-avatar">
                    <img src="../img/mascota-chatbot.png" alt="VegeBot777" id="bot-avatar">
                </div>
                
                <h2 class="bot-name">VegeBot777</h2>
                <p class="bot-description">
                    Especialista en informática con conocimientos profundos en programación, 
                    desarrollo web, bases de datos y tecnologías emergentes.
                </p>

                <div class="bot-stats">
                    <div class="stat-item">
                        <span class="stat-value">1.2K+</span>
                        <span class="stat-label">Consultas</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">98%</span>
                        <span class="stat-label">Precisión</span>
                    </div>
                </div>

                <div class="bot-status">
                    <span class="status-dot"></span>
                    En línea y listo para ayudarte
                </div>
            </aside>

            <!-- Chat Panel -->
            <section class="chat-panel">
                <div class="chat-header">
                    <div class="chat-header-avatar">
                        <span class="icon-github"></span>
                    </div>
                    <div>
                        <div class="chat-title">Chat con VegeBot777</div>
                        <div class="chat-subtitle">Pregúntame sobre informática</div>
                    </div>
                </div>

                <div class="chat-messages" id="chat-messages">
                    <!-- Mensaje inicial del bot -->
                    <div class="message bot">
                        <div class="message-avatar">
                            <span class="icon-robot"></span>
                        </div>
                        <div class="message-content">
                            <p class="message-text">
                                ¡Hola! 👋 Soy VegeBot777, tu asistente especializado en informática. 
                                ¿En qué puedo ayudarte hoy?
                            </p>
                            <div class="message-time" id="bot-time"></div>
                        </div>
                    </div>
                </div>

                <div class="chat-input-area">
                    <form method="POST" id="chat-form">
                        <div class="input-container">
                            <input 
                                type="text" 
                                id="chat-input" 
                                name="mensaje" 
                                class="chat-input" 
                                placeholder="Escribe tu pregunta sobre informática..." 
                                required 
                                autocomplete="off"
                            >
                            <button type="submit" class="send-button" id="send-button">
                                <span class="icon-send"></span>
                            </button>
                        </div>
                    </form>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="app-footer">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="../img/mascota-chatbot.png" alt="Logo">
                </div>
                <div class="footer-info">
                    <p><strong>Integrantes:</strong> Valentín Drapanti - Agustín Casado</p>
                    <p>&copy; 2024 Grupo N°1 - 7I Programación III</p>
                    <p>Sistema de Gestión de Consultas Inteligente</p>
                </div>
            </div>
        </footer>
    </div>

    <script>
    // Función para obtener hora actual
    function getCurrentTime() {
        return new Date().toLocaleTimeString('es-ES', { 
            hour: '2-digit', 
            minute: '2-digit' 
        });
    }

    // Establecer hora inicial del bot
    document.getElementById('bot-time').textContent = getCurrentTime();

    // Función para añadir mensaje del usuario
    function addUserMessage(message) {
        const chatMessages = document.getElementById('chat-messages');
        const messageDiv = document.createElement('div');
        messageDiv.className = 'message user';
        messageDiv.innerHTML = `
            <div class="message-avatar">
                <span class="icon-user"></span>
            </div>
            <div class="message-content">
                <p class="message-text">${message}</p>
                <div class="message-time">${getCurrentTime()}</div>
            </div>
        `;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Función para añadir mensaje del bot
    function addBotMessage(message) {
        const chatMessages = document.getElementById('chat-messages');
        const messageDiv = document.createElement('div');
        messageDiv.className = 'message bot';
        messageDiv.innerHTML = `
            <div class="message-avatar">
                <span class="icon-robot"></span>
            </div>
            <div class="message-content">
                <p class="message-text">${message}</p>
                <div class="message-time">${getCurrentTime()}</div>
            </div>
        `;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Función para mostrar indicador de escritura
    function showTypingIndicator() {
        const chatMessages = document.getElementById('chat-messages');
        const typingDiv = document.createElement('div');
        typingDiv.className = 'message bot';
        typingDiv.id = 'typing-indicator';
        typingDiv.innerHTML = `
            <div class="message-avatar">
                <span class="icon-robot"></span>
            </div>
            <div class="typing-indicator">
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
                <span class="typing-dot"></span>
            </div>
        `;
        chatMessages.appendChild(typingDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Función para remover indicador de escritura
    function removeTypingIndicator() {
        const typingIndicator = document.getElementById('typing-indicator');
        if (typingIndicator) {
            typingIndicator.remove();
        }
    }

    // Mostrar mensaje de advertencia si se intenta enviar mientras está deshabilitado
    function showWarning() {
        const warning = document.createElement('div');
        warning.className = 'warning-popup';
        warning.textContent = '⏳ Espera a que el bot termine de responder...';

        document.body.appendChild(warning);

        setTimeout(() => {
            warning.remove();
        }, 2000);
    }

    // Listener del formulario
    document.getElementById('chat-form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const input = document.getElementById('chat-input');
        const sendButton = document.getElementById('send-button');
        const message = input.value.trim();
        
        if (message === '') return;

        // Bloquear input y botón
        input.disabled = true;
        sendButton.disabled = true;

        addUserMessage(message);
        input.value = '';

        showTypingIndicator();

        setTimeout(() => {
            $.ajax({
                url: 'Controller/controlador.php',
                type: 'POST',
                data: { text: message },
                success: function(result) {
                    removeTypingIndicator();
                    addBotMessage(result);
                    input.disabled = false;
                    sendButton.disabled = false;
                    input.focus();
                },
                error: function() {
                    removeTypingIndicator();
                    addBotMessage('Lo siento, ha ocurrido un error. Por favor, inténtalo de nuevo.');
                    input.disabled = false;
                    sendButton.disabled = false;
                    input.focus();
                }
            });
        }, 800);
    });

    // Prevenir Enter si está deshabilitado
    document.getElementById('chat-input').addEventListener('keydown', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            if (this.disabled) {
                e.preventDefault();
                showWarning();
            } else {
                e.preventDefault();
                document.getElementById('chat-form').dispatchEvent(new Event('submit'));
            }
        }
    });

    // Avatar animado aleatoriamente
    setInterval(() => {
        const avatar = document.getElementById('bot-avatar');
        if (Math.random() > 0.97) {
            avatar.style.transform = 'scale(1.05) rotate(2deg)';
            setTimeout(() => {
                avatar.style.transform = 'scale(1) rotate(0deg)';
            }, 300);
        }
    }, 1000);
</script>

</body>
</html>