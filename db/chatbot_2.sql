-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2025 a las 23:49:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatbot_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Hardware'),
(2, 'Software'),
(3, 'Sistemas Operativos'),
(4, 'Seguridad'),
(5, 'Conectividad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversaciones`
--

CREATE TABLE `conversaciones` (
  `id` int(11) NOT NULL,
  `pregunta_usuario` varchar(500) NOT NULL,
  `respuesta_bot` varchar(500) NOT NULL,
  `fecha_hora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conversaciones`
--

INSERT INTO `conversaciones` (`id`, `pregunta_usuario`, `respuesta_bot`, `fecha_hora`) VALUES
(1, '¿Qué es la computación en la nube?', 'La computación en la nube es un modelo que ofrece recursos de cómputo, almacenamiento y redes a través de internet bajo demanda.', '2025-08-12 23:37:12'),
(2, 'soy yahir', 'Lo siento, no entiendo tu pregunta. ¿Podés reformularla?', '2025-08-12 23:38:32'),
(3, 'soy yahir ', 'Lo siento, no entiendo tu pregunta. ¿Podés reformularla?', '2025-08-12 23:39:05'),
(4, 'soy yahir', 'Mogolico de mierda, andate a la concha de tu amdre ', '2025-08-12 23:39:33'),
(5, 'valen', 'Amazon S3 es almacenamiento de objetos escalable y duradero.', '2025-08-12 23:47:50'),
(6, 'valen', 'Amazon S3 es almacenamiento de objetos escalable y duradero.', '2025-08-12 23:47:55'),
(7, 'valen', 'Amazon S3 es almacenamiento de objetos escalable y duradero.', '2025-08-12 23:47:56'),
(8, 'fran', 'Fran, tu código es una mezcla tóxica de memory leaks y errores fatales.', '2025-08-12 23:47:58'),
(9, 'benja', 'Benja, tus bugs se reproducen más rápido que un virus informático.', '2025-08-12 23:48:01'),
(10, 'soy valen', 'Valen, tu torpeza está grabada en la EEPROM de la vergüenza.', '2025-08-12 23:48:14'),
(11, 'soy yahir', 'Mogolico de mierda, andate a la concha de tu amdre ', '2025-08-12 23:48:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(500) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `pregunta`, `categoria_id`) VALUES
(1, '¿Qué es la computación en la nube?', 1),
(2, '¿Cuáles son los principales modelos de servicio en la nube?', 1),
(3, '¿Qué es una máquina virtual y cómo funciona?', 1),
(4, '¿Qué ventajas ofrece el escalado automático en la nube?', 1),
(5, '¿Qué diferencias hay entre IaaS, PaaS y SaaS?', 1),
(6, '¿Cómo se facturan típicamente los servicios en la nube?', 1),
(7, '¿Qué es un contenedor (Docker) y para qué sirve?', 1),
(8, '¿Qué es Kubernetes y cómo orquesta contenedores?', 1),
(9, '¿Qué es un balanceador de carga en entornos cloud?', 1),
(10, '¿Cómo garantizar la alta disponibilidad en la nube?', 1),
(11, '¿Qué es un firewall perimetral?', 2),
(12, '¿Cuál es la diferencia entre antivirus y antimalware?', 2),
(13, '¿Qué es un ataque de phishing?', 2),
(14, '¿Qué es un sistema de detección de intrusos (IDS)?', 2),
(15, '¿Cómo funciona la autenticación multifactor (MFA)?', 2),
(16, '¿Qué es un ataque DDoS y cómo mitigarlo?', 2),
(17, '¿Qué es la criptografía asimétrica?', 2),
(18, '¿Qué es un certificado SSL/TLS y por qué es importante?', 2),
(19, '¿Qué son las políticas de seguridad de la información?', 2),
(20, '¿Cómo definirías el principio de privilegio mínimo?', 2),
(21, '¿Qué es el aprendizaje supervisado en IA?', 3),
(22, '¿Qué es el aprendizaje no supervisado?', 3),
(23, '¿Qué es una red neuronal artificial?', 3),
(24, '¿Para qué sirve el procesamiento del lenguaje natural (NLP)?', 3),
(25, '¿Qué es el aprendizaje profundo (Deep Learning)?', 3),
(26, '¿Qué es un modelo generativo de IA?', 3),
(27, '¿Qué diferencias hay entre CNN y RNN?', 3),
(28, '¿Qué es el overfitting y cómo evitarlo?', 3),
(29, '¿Qué es un conjunto de datos de entrenamiento?', 3),
(30, '¿Cómo evalúas el rendimiento de un modelo de IA?', 3),
(31, '¿Qué es un repositorio de código (Git)?', 4),
(32, '¿Qué diferencias hay entre Git y SVN?', 4),
(33, '¿Qué es un pull request y cómo se usa?', 4),
(34, '¿Qué es la integración continua (CI)?', 4),
(35, '¿Qué es la entrega continua (CD)?', 4),
(36, '¿Qué es un entorno de staging?', 4),
(37, '¿Para qué sirven los tests unitarios?', 4),
(38, '¿Qué es TDD (Test-Driven Development)?', 4),
(39, '¿Qué es un microservicio?', 4),
(40, '¿Cuáles son los beneficios de la arquitectura hexagonal?', 4),
(41, '¿Qué es una dirección IP?', 5),
(42, '¿Qué es el modelo OSI?', 5),
(43, '¿Para qué sirve el protocolo TCP?', 5),
(44, '¿Para qué sirve el protocolo UDP?', 5),
(45, '¿Qué es una VPN y cuándo se usa?', 5),
(46, '¿Qué es NAT (Network Address Translation)?', 5),
(47, '¿Qué es DHCP y cómo asigna direcciones?', 5),
(48, '¿Qué es DNS y cómo traduce nombres?', 5),
(49, '¿Qué es el protocolo HTTP/HTTPS?', 5),
(50, '¿Qué es el protocolo SSH y cómo funciona?', 5),
(51, '¿Qué es Kubernetes Ingress?', 1),
(52, '¿Qué es Serverless y sus ventajas?', 1),
(53, '¿Qué es una VPC (Virtual Private Cloud)?', 1),
(54, '¿Qué es la latencia en la nube?', 1),
(55, '¿Qué son regions y zones en un proveedor cloud?', 1),
(56, '¿Cómo funciona el almacenamiento en bloques vs. objetos?', 1),
(57, '¿Qué es un endpoint privado en la nube?', 1),
(58, '¿Para qué sirve Amazon S3 (o equivalente)?', 1),
(59, '¿Cómo funciona el versionado de objetos en la nube?', 1),
(60, '¿Qué es un snapshot de disco?', 1),
(61, '¿Qué es un honeypot en seguridad?', 2),
(62, '¿Qué es un rootkit y cómo detectarlo?', 2),
(63, '¿Qué es la ingeniería social?', 2),
(64, '¿Qué es OAuth 2.0?', 2),
(65, '¿Qué es un ataque Man-in-the-Middle?', 2),
(66, '¿Qué es ransomware?', 2),
(67, '¿Qué es el estándar PCI DSS?', 2),
(68, '¿Qué es la mala configuración en la nube y sus riesgos?', 2),
(69, '¿Qué es el hardening de sistemas?', 2),
(70, '¿Qué es el cifrado en reposo vs. en tránsito?', 2),
(71, '¿Qué es un perceptrón?', 3),
(72, '¿Qué es la regresión lineal en ML?', 3),
(73, '¿Qué es la máquina de vectores de soporte (SVM)?', 3),
(74, '¿Qué es el clustering k-means?', 3),
(75, '¿Qué es la validación cruzada (cross-validation)?', 3),
(76, '¿Qué es un autoencoder?', 3),
(77, '¿Qué es la atención (attention) en redes neuronales?', 3),
(78, '¿Qué es BERT y para qué se usa?', 3),
(79, '¿Qué es GAN (Generative Adversarial Network)?', 3),
(80, '¿Qué es transfer learning en IA?', 3),
(81, '¿Qué es un commit en Git?', 4),
(82, '¿Qué es branching y por qué usarlo?', 4),
(83, '¿Qué es un merge conflict?', 4),
(84, '¿Qué es Docker Compose?', 4),
(85, '¿Qué es Infrastructure as Code (IaC)?', 4),
(86, '¿Qué es Terraform?', 4),
(87, '¿Qué es un script de despliegue?', 4),
(88, '¿Qué es un rollback de despliegue?', 4),
(89, '¿Qué es pair programming?', 4),
(90, '¿Qué es un endpoint REST?', 4),
(91, '¿Qué es un switch de red?', 5),
(92, '¿Qué es una topología de red estrella?', 5),
(93, '¿Qué es QoS (Quality of Service)?', 5),
(94, '¿Qué es PoE (Power over Ethernet)?', 5),
(95, '¿Qué es un proxy reverso?', 5),
(96, '¿Qué es BGP (Border Gateway Protocol)?', 5),
(97, '¿Qué es IPv6 y por qué se creó?', 5),
(98, '¿Qué es SNMP y para qué se usa?', 5),
(99, '¿Qué es MPLS?', 5),
(100, '¿Qué es un IDS vs IPS?', 5),
(101, 'soy yahir ', 1),
(102, 'Valen', 4),
(103, 'Hola soy Valen', 4),
(104, 'Nombre Valen', 4),
(105, 'Soy Valen', 4),
(106, 'Mi nombre Valen', 4),
(107, 'Yahir', 4),
(108, 'Hola soy Yahir', 4),
(109, 'Nombre Yahir', 4),
(110, 'Soy Yahir', 4),
(111, 'Mi nombre Yahir', 4),
(112, 'Fran', 4),
(113, 'Hola soy Fran', 4),
(114, 'Nombre Fran', 4),
(115, 'Soy Fran', 4),
(116, 'Mi nombre Fran', 4),
(117, 'Mati', 4),
(118, 'Hola soy Mati', 4),
(119, 'Nombre Mati', 4),
(120, 'Soy Mati', 4),
(121, 'Mi nombre Mati', 4),
(122, 'Jose', 4),
(123, 'Hola soy Jose', 4),
(124, 'Nombre Jose', 4),
(125, 'Soy Jose', 4),
(126, 'Mi nombre Jose', 4),
(127, 'Benja', 4),
(128, 'Hola soy Benja', 4),
(129, 'Nombre Benja', 4),
(130, 'Soy Benja', 4),
(131, 'Mi nombre Benja', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `respuesta` varchar(500) NOT NULL,
  `pregunta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`id`, `respuesta`, `pregunta_id`) VALUES
(1, 'La computación en la nube es un modelo que ofrece recursos de cómputo, almacenamiento y redes a través de internet bajo demanda.', 1),
(2, 'Los principales modelos son IaaS (Infraestructura), PaaS (Plataforma) y SaaS (Software).', 2),
(3, 'Una máquina virtual es una emulación de un sistema informático aislado que corre sobre hardware físico o cloud.', 3),
(4, 'El escalado automático ajusta automáticamente recursos según demanda, mejorando disponibilidad y coste.', 4),
(5, 'IaaS provee infraestructura, PaaS plataforma para desarrollar, y SaaS aplicaciones listas para usar.', 5),
(6, 'Se facturan por uso: CPU, memoria, almacenamiento, ancho de banda y llamadas API, normalmente por hora o GB.', 6),
(7, 'Un contenedor empaqueta una aplicación y sus dependencias para que se ejecute de forma consistente en cualquier entorno.', 7),
(8, 'Kubernetes es un orquestador de contenedores que automatiza despliegue, escalado y gestión de aplicaciones contenedorizadas.', 8),
(9, 'Un balanceador de carga distribuye peticiones entrantes entre varios servidores para optimizar rendimiento y disponibilidad.', 9),
(10, 'Alta disponibilidad se logra con réplicas en distintas zonas, balanceo, clusters y failover automático.', 10),
(11, 'Un firewall perimetral filtra paquetes entre redes externas e internas según reglas predefinidas.', 11),
(12, 'Antivirus busca y elimina malware en archivos, mientras antimalware incluye defensa contra más vectores como spyware y ransomware.', 12),
(13, 'El phishing es un ataque de ingeniería social que intenta robar credenciales o información sensible mediante correos falsos.', 13),
(14, 'Un IDS monitorea tráfico en busca de actividad sospechosa y alerta al administrador.', 14),
(15, 'MFA requiere al menos dos factores de autenticación: algo que sabes, algo que tienes o algo que eres.', 15),
(16, 'Un DDoS inunda un servicio con tráfico; se mitiga con filtrado, rate-limiting y servicios especializados.', 16),
(17, 'La criptografía asimétrica usa clave pública y privada para cifrar y descifrar datos de forma segura.', 17),
(18, 'SSL/TLS es un protocolo que cifra la comunicación entre cliente y servidor para proteger la privacidad.', 18),
(19, 'Son reglas y controles que garantizan la confidencialidad, integridad y disponibilidad de la información.', 19),
(20, 'El principio de privilegio mínimo otorga al usuario sólo los permisos estrictamente necesarios.', 20),
(21, 'Es un método donde el modelo aprende de datos etiquetados para predecir resultados basados en ejemplos conocidos.', 21),
(22, 'Aprendizaje no supervisado encuentra patrones en datos sin etiquetas, como clustering y reducción dimensional.', 22),
(23, 'Es un sistema inspirado en el cerebro humano formado por capas de nodos que procesan y transmiten información.', 23),
(24, 'NLP permite a las máquinas entender, generar y procesar lenguaje humano de forma útil.', 24),
(25, 'Deep Learning emplea redes neuronales profundas con muchas capas para aprender representaciones complejas.', 25),
(26, 'Un modelo generativo crea nuevos datos similares a los de entrenamiento, como GANs y VAEs.', 26),
(27, 'CNNs son buenas en datos espaciales (imágenes); RNNs en secuencias (texto, series temporales).', 27),
(28, 'Overfitting ocurre cuando el modelo memoriza en lugar de generalizar; se evita con regularización y más datos.', 28),
(29, 'Es el conjunto de ejemplos usados para entrenar un modelo y ajustar sus parámetros internos.', 29),
(30, 'Se evalúa con métricas como precisión, recall, F1 y AUC sobre un conjunto de prueba separado.', 30),
(31, 'Git es un sistema de control de versiones distribuido para gestionar el historial de cambios de código.', 31),
(32, 'SVN es centralizado; Git es distribuido, más flexible y rápido para operaciones locales.', 32),
(33, 'Un pull request propone cambios de código para revisión antes de integrarlos al repositorio principal.', 33),
(34, 'CI integra automáticamente cambios al repositorio tras cada commit y ejecuta tests para detectar errores rápido.', 34),
(35, 'CD extiende CI automatizando el despliegue de builds en entornos de producción o preproducción.', 35),
(36, 'Staging es un entorno que replica producción para pruebas finales antes del despliegue en vivo.', 36),
(37, 'Los tests unitarios validan pequeñas unidades de código aisladamente para detectar fallos temprano.', 37),
(38, 'TDD es una práctica donde se escriben tests antes del código, guiando el diseño de la aplicación.', 38),
(39, 'Un microservicio es un componente pequeño e independiente que cumple una única función en la aplicación.', 39),
(40, 'La arquitectura hexagonal aísla la lógica de negocio de I/O y facilita pruebas y mantenimiento.', 40),
(41, 'Una dirección IP identifica un dispositivo en una red para enviar y recibir datos.', 41),
(42, 'El modelo OSI divide la comunicación en siete capas para estandarizar protocolos.', 42),
(43, 'TCP garantiza la entrega fiable de datos a través de conexión orientada.', 43),
(44, 'UDP es sin conexión y no garantiza entrega, ideal para streaming donde la velocidad importa.', 44),
(45, 'Una VPN crea un túnel cifrado entre dos puntos a través de internet.', 45),
(46, 'NAT traduce direcciones privadas a una pública para que varios dispositivos usen una sola IP.', 46),
(47, 'DHCP asigna IPs dinámicamente a dispositivos que se conectan a la red.', 47),
(48, 'DNS traduce nombres de dominio legibles a direcciones IP numéricas.', 48),
(49, 'HTTP es sin cifrar; HTTPS añade capa SSL/TLS para proteger la información.', 49),
(50, 'SSH es un protocolo seguro para acceder y ejecutar comandos en servidores remotos.', 50),
(51, 'Ingress en Kubernetes gestiona el acceso externo a servicios dentro del clúster.', 51),
(52, 'Serverless ejecuta funciones bajo demanda sin aprovisionar servidores, pagando solo por ejecución.', 52),
(53, 'Una VPC es una red privada virtual en la nube aislada del resto del proveedor.', 53),
(54, 'La latencia en cloud es el retraso entre petición y respuesta, depende de distancia y carga.', 54),
(55, 'Regions son zonas geográficas; zones subdividen regiones para alta disponibilidad.', 55),
(56, 'Almacenamiento en bloques trata datos como discos duros; en objetos como archivos con metadatos.', 56),
(57, 'Un endpoint privado conecta servicios cloud sin pasar por la internet pública.', 57),
(58, 'Amazon S3 es almacenamiento de objetos escalable y duradero.', 58),
(59, 'El versionado de objetos conserva múltiples versiones de un mismo archivo.', 59),
(60, 'Un snapshot es una copia puntual de un volumen de disco.', 60),
(61, 'Un honeypot atrae atacantes para estudiar sus técnicas sin comprometer sistemas reales.', 61),
(62, 'Un rootkit oculta procesos y archivos maliciosos; se detecta con análisis de integridad.', 62),
(63, 'Ingeniería social explota la confianza humana para obtener credenciales o acceso.', 63),
(64, 'OAuth 2.0 es un protocolo de autorización que permite acceso limitado a recursos sin compartir credenciales.', 64),
(65, 'Un ataque Man-in-the-Middle intercepta y puede alterar la comunicación entre dos partes.', 65),
(66, 'Ransomware cifra archivos y pide rescate para liberarlos.', 66),
(67, 'PCI DSS es un estándar de seguridad para proteger datos de tarjetas de pago.', 67),
(68, 'La mala configuración en la nube expone recursos y datos; se mitiga con auditorías y políticas.', 68),
(69, 'Hardening consiste en reducir la superficie de ataque quitando servicios y configurando seguridades.', 69),
(70, 'Cifrado en reposo protege datos almacenados; en tránsito protege datos en movimiento.', 70),
(71, 'Un perceptrón es la unidad básica de una red neuronal, con función de activación simple.', 71),
(72, 'Regresión lineal ajusta una línea a datos para predecir valores continuos.', 72),
(73, 'SVM encuentra el hiperplano que maximiza la separación entre clases.', 73),
(74, 'K-means agrupa puntos según cercanía a centroides definidos iterativamente.', 74),
(75, 'Cross-validation partitiona datos en pliegues para validar el modelo en varios subconjuntos.', 75),
(76, 'Un autoencoder aprende a copiar sus entradas en sus salidas usando un cuello de botella.', 76),
(77, 'Attention permite a un modelo enfocar distintas partes de la entrada según relevancia.', 77),
(78, 'BERT es un modelo de lenguaje bidireccional para tareas de NLP.', 78),
(79, 'GAN enfrenta dos redes (generador y discriminador) para crear datos realistas.', 79),
(80, 'Transfer learning reutiliza un modelo preentrenado en una nueva tarea con pocos datos.', 80),
(81, 'Un commit guarda un estado del repositorio con mensaje descriptivo.', 81),
(82, 'Branching crea líneas de desarrollo independientes para nuevas features o fixes.', 82),
(83, 'Un merge conflict ocurre cuando dos ramas modifican la misma parte de un archivo.', 83),
(84, 'Docker Compose define y levanta múltiples contenedores con un solo archivo YAML.', 84),
(85, 'IaC permite definir infraestructura mediante código, mejorando reproducibilidad.', 85),
(86, 'Terraform es una herramienta IaC que gestiona proveedores cloud con archivos de configuración.', 86),
(87, 'Un script de despliegue automatiza pasos para poner una aplicación en producción.', 87),
(88, 'Rollback revierte una aplicación a una versión anterior tras detectar errores.', 88),
(89, 'Pair programming implica dos desarrolladores trabajando juntos en el mismo código.', 89),
(90, 'Un endpoint REST expone recursos vía HTTP usando verbos (GET, POST, PUT, DELETE).', 90),
(91, 'Un switch de red conecta dispositivos dentro de la misma red local.', 91),
(92, 'Topología estrella conecta todos los nodos a un punto central (hub o switch).', 92),
(93, 'QoS prioriza tráfico de red crítico para asegurar su calidad de servicio.', 93),
(94, 'PoE suministra energía eléctrica sobre cable Ethernet.', 94),
(95, 'Un proxy reverso recibe solicitudes externas y las reenvía a servidores internos.', 95),
(96, 'BGP es el protocolo que enruta tráfico entre grandes redes (autonomous systems).', 96),
(97, 'IPv6 amplía el espacio de direcciones IP a 128 bits para cubrir la demanda futura.', 97),
(98, 'SNMP monitorea y administra dispositivos de red mediante agentes y comunidad.', 98),
(99, 'MPLS etiqueta paquetes para enrutar tráfico según políticas y niveles de servicio.', 99),
(100, 'Un IDS detecta intrusiones y alerta; un IPS además puede bloquearlas automáticamente.', 100),
(101, 'Mogolico de mierda, andate a la concha de tu amdre ', 101),
(102, 'Valen, tu nivel de incompetencia supera al de un antivirus desactualizado.', 102),
(103, 'Valen, tu torpeza está grabada en la EEPROM de la vergüenza.', 103),
(104, 'Valen, eres la razón por la que Skype y Zoom se estrellan.', 104),
(105, 'Valen, tu talento tecnológico cabe en menos bits que un pixel.', 105),
(106, 'Valen, tu “hola” suena a pantallazo azul permanente.', 106),
(107, 'Yahir, tu conocimiento técnico es una versión beta sin parche.', 107),
(108, 'Yahir, desarmas todo lo que tocas como un gusano informático letal.', 108),
(109, 'Yahir, tu capacidad de romper dispositivos está en modo administrador.', 109),
(110, 'Yahir, tus configuraciones son un manual de caos y destrucción.', 110),
(111, 'Yahir, eres el error crítico que provoca el colapso de todo sistema.', 111),
(112, 'Fran, tu código es una mezcla tóxica de memory leaks y errores fatales.', 112),
(113, 'Fran, eres la definición viva de un segmentation fault.', 113),
(114, 'Fran, tu aportación a la informática es un pantallazo azul en bucle.', 114),
(115, 'Fran, tu lógica causa deadlocks más rápido que un reloj oxidado.', 115),
(116, 'Fran, tu nombre es sinónimo de build fallido y deploy catastrófico.', 116),
(117, 'Mati, provocas más bluescreens que Windows XP en su mejor época.', 117),
(118, 'Mati, tu toque es fatal como un cable de corriente pelado.', 118),
(119, 'Mati, tu legado de fallos en producción es digno de un museo de errores.', 119),
(120, 'Mati, ni un kernel panic evoca tanta desesperación como tu simple saludo.', 120),
(121, 'Mati, tu torpeza digital es tan grande que generas logs infinitos.', 121),
(122, 'Jose, tus merge conflicts son más épicos que guerras mundiales.', 122),
(123, 'Jose, tu repositorio parece un vertedero de commits basura.', 123),
(124, 'Jose, provocas fallos masivos como un exploit sin control.', 124),
(125, 'Jose, tu nombre causa pánico en cualquier pipeline de CI/CD.', 125),
(126, 'Jose, eres el código malicioso disfrazado de desarrollador.', 126),
(127, 'Benja, tus bugs se reproducen más rápido que un virus informático.', 127),
(128, 'Benja, tu presencia en el servidor es una sentencia de muerte.', 128),
(129, 'Benja, incluso el antivirus se rinde ante tu desastre binario.', 129),
(130, 'Benja, eres el agujero de seguridad que nadie supo parchear.', 130),
(131, 'Benja, tu nombre evoca un crash sin posible recuperación.', 131);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `preguntas_ibfk_1` (`categoria_id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `respuestas_ibfk_1` (`pregunta_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `usuarios_ibfk_1` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `conversaciones`
--
ALTER TABLE `conversaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
