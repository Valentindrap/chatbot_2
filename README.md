"""
🤖 chatbot_2

Chatbot construido en PHP+MySQL que permite gestionar roles, preguntas y respuestas a través de un sistema CRUD (Crear, Leer, Actualizar, Eliminar).

🔧 Autores
- Agustín Casado
- Valentín Drapanti

🧩 Estructura del proyecto

/chatbot_2
│
├── clases/
│   ├── database.class.php      # Conexión Singleton a la base de datos
│   ├── rol.class.php           # CRUD de Roles (id, nombre)
│   ├── pregunta.class.php      # CRUD de Preguntas (id, pregunta, categoria_id)
│   └── respuesta.class.php     # CRUD de Respuestas (id, respuesta, pregunta_id)
│
├── controller/
│   ├── rol.controller.php
│   ├── pregunta.controller.php
│   └── respuesta.controller.php
│
├── formAltaRol.php
├── formEditarRol.php
├── listarRol.php
│
├── formAltaPregunta.php
├── formEditarPregunta.php
├── listarPregunta.php
│
├── formAltaRespuesta.php
├── formEditarRespuesta.php
└── listarRespuesta.php

✅ Funcionalidades

Roles
- CRUD completo para administrar roles (id + nombre).
- Formularios de alta, edición y listado con eliminación.

Preguntas
- CRUD completo para administrar preguntas (id + descripción + categoría).
- Formularios y listado estilo similar al módulo de Roles.

Respuestas
- CRUD completo para administrar respuestas (id + texto + pregunta relacionada).
- Formularios y listado con acción de eliminar.

⚙️ Requisitos

- PHP 7+
- Extensión PDO habilitada
- Servidor MySQL
- Base de datos con tablas:
  
  CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL
  );

  CREATE TABLE preguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pregunta TEXT NOT NULL,
    categoria_id INT NOT NULL
  );

  CREATE TABLE respuestas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    respuesta TEXT NOT NULL,
    pregunta_id INT NOT NULL
  );

- Configurar conexión en database.class.php

🚀 Instalación y uso

1. Clonar el repositorio.
2. Configurar el archivo database.class.php con credenciales MySQL.
3. Crear las tablas en la base de datos.
4. Acceder con el navegador a:
   - /formAltaRol.php para agregar roles.
   - /listarRol.php para editar/eliminar roles.
   - De igual modo para preguntas y respuestas: formAltaX, formEditarX, listarX.

🛠️ Customización y extensiones

- Puedes mejorar los formularios con estilos, validación JS o integración con frameworks como Bootstrap.
- Agregar vistas que muestren datos relacionados (por ejemplo, texto de categoría o pregunta en lugar del ID).
- Integrar login y permisos para controlar el acceso a cada CRUD.

📄 Licencia

Este proyecto es de uso libre para fines personales o educativos.
"""

with open("README_chatbot_2.txt", "w", encoding="utf-8") as file:
    file.write(readme_text)

print("Archivo README_chatbot_2.txt generado correctamente.")
