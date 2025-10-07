<?php
// /chatbot_2/src/login.php
session_start();
$errorMsg = '';
if (isset($_GET['error'])) {
  $map = [
    'missing' => 'Completa todos los campos.',
    'email'   => 'El correo no es válido.',
    'cred'    => '❌ Credenciales incorrectas.',
    'server'  => 'Error interno del servidor.',
  ];
  $errorMsg = $map[$_GET['error']] ?? 'Ocurrió un error.';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Gaucho AI</title>

  <!-- ajusta si cambia tu base -->
  <link rel="icon" href="/chatbot_2/src/img/logo.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
/* ======= Estilos (tu CSS) ======= */
:root{--primary-color:#6b5b95;--primary-dark:#5a4a7d;--secondary-color:#8a4af3;--accent-color:#b794f6;--light-text:#6c757d;--dark-text:#212529;--bg-gradient:linear-gradient(135deg,#f5f7fa 0%,#c3cfe2 100%);--card-bg:rgba(255,255,255,.95);--shadow-sm:0 1px 3px rgba(0,0,0,.12);--shadow-md:0 4px 6px rgba(0,0,0,.1);--shadow-lg:0 10px 25px rgba(0,0,0,.1);--radius-sm:8px;--radius-md:12px;--radius-lg:20px;--transition:all .3s ease}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Outfit',sans-serif;background:var(--bg-gradient);background-attachment:fixed;color:var(--dark-text);display:flex;justify-content:center;align-items:center;min-height:100vh;padding:1rem;transition:var(--transition)}
.login-container{width:100%;max-width:420px;animation:fadeIn .8s ease}
.login-header{text-align:center;margin-bottom:2rem}
.login-header h1{font-size:2.2rem;font-weight:700;background:linear-gradient(to right,var(--primary-color),var(--secondary-color));-webkit-background-clip:text;background-clip:text;color:transparent;margin-bottom:.5rem}
.login-header p{font-size:1rem;color:var(--light-text)}
.login-box{background:var(--card-bg);padding:2rem;border-radius:var(--radius-lg);box-shadow:var(--shadow-lg);border:1px solid rgba(0,0,0,.05);backdrop-filter:blur(10px);-webkit-backdrop-filter:blur(10px)}
.input-group{margin-bottom:1.2rem;position:relative}
.input-group i{position:absolute;left:1rem;top:50%;transform:translateY(-50%);color:var(--primary-color);z-index:1}
.input-group input{width:100%;padding:.875rem 1rem .875rem 2.8rem;border:1px solid rgba(0,0,0,.1);border-radius:var(--radius-md);font-size:1rem;transition:var(--transition);background:rgba(255,255,255,.8);font-family:'Outfit',sans-serif}
.input-group input:focus{outline:none;border-color:var(--secondary-color);box-shadow:0 0 0 3px rgba(138,74,243,.2);background:#fff}
button[type="submit"]{width:100%;padding:.875rem;background:linear-gradient(135deg,var(--primary-color),var(--secondary-color));border:none;color:#fff;font-weight:600;border-radius:var(--radius-md);cursor:pointer;transition:var(--transition);font-family:'Outfit',sans-serif;font-size:1rem;box-shadow:var(--shadow-sm);margin-top:.5rem;display:flex;align-items:center;justify-content:center;gap:8px}
button[type="submit"]:hover{background:linear-gradient(135deg,var(--primary-dark),var(--primary-color));transform:translateY(-2px);box-shadow:var(--shadow-md)}
.back-btn{width:100%;padding:.875rem;background:#6c757d;border:none;color:#fff;font-weight:600;border-radius:var(--radius-md);cursor:pointer;transition:var(--transition);font-family:'Outfit',sans-serif;font-size:1rem;box-shadow:var(--shadow-sm);margin-top:1rem;text-decoration:none;display:flex;align-items:center;justify-content:center;gap:8px}
.back-btn:hover{background:#5a6268;transform:translateY(-2px);box-shadow:var(--shadow-md)}
.glow-effect{position:relative}
.glow-effect::after{content:'';position:absolute;inset:0;border-radius:inherit;box-shadow:0 0 15px rgba(138,74,243,.4);opacity:0;transition:opacity .3s ease;z-index:-1}
.glow-effect:hover::after{opacity:1}
@keyframes fadeIn{from{opacity:0;transform:translateY(-20px)}to{opacity:1;transform:translateY(0)}}
.stars-container{position:fixed;inset:0;overflow:hidden;z-index:-1;pointer-events:none}
.star{position:absolute;width:2px;height:2px;border-radius:50%;animation:moveStar linear infinite, twinkle 2s ease-in-out infinite alternate;opacity:.8;background:rgba(138,74,243,.5);box-shadow:0 0 5px rgba(138,74,243,.3)}
@keyframes moveStar{from{transform:translateY(0)}to{transform:translateY(100vh)}}
@keyframes twinkle{0%{opacity:.3}100%{opacity:1}}
body.dark{--bg-gradient:linear-gradient(135deg,#1a1a40,#24243e);--card-bg:rgba(26,26,46,.95);--dark-text:#f0f0f0;--light-text:#a0a0c0}
body.dark .input-group input{background:rgba(45,45,77,.8);border-color:rgba(255,255,255,.1);color:var(--dark-text)}
body.dark .input-group input:focus{background:rgba(45,45,77,1)}
body.dark .star{background:rgba(255,255,255,.8);box-shadow:0 0 5px rgba(255,255,255,.5)}
@media (max-width:480px){.login-container{max-width:100%}.login-box{padding:1.5rem}.login-header h1{font-size:1.8rem}.login-header p{font-size:.9rem}}
/* Mensaje de error */
.alert{background:#f8d7da;color:#721c24;padding:.8rem 1rem;border-radius:8px;margin-bottom:1rem;font-size:.95rem;border:1px solid #f5c6cb}
  </style>
</head>
<body>
  <!-- Fondo estrellado -->
  <div class="stars-container" id="stars-container"></div>

  <div class="login-container">
    <div class="login-header">
      <h1>VegeBot777</h1>
      <p>Inicia sesión para acceder al panel de administración</p>
    </div>

    <div class="login-box">
      <?php if ($errorMsg): ?>
        <div class="alert"><?php echo htmlspecialchars($errorMsg); ?></div>
      <?php endif; ?>

      <!-- Usa controller en singular -->
      <form method="POST" action="/chatbot_2/src/php/controller/login.controller.php">
        <input type="hidden" name="operacion" value="login">
        <div class="input-group">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" placeholder="Correo electrónico" required>
        </div>
        <div class="input-group">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="glow-effect">
          <i class="fas fa-sign-in-alt"></i> Ingresar
        </button>
      </form>

      <a href="/chatbot_2/src/index.php" class="back-btn glow-effect">
        <i class="fas fa-arrow-left"></i> Volver a Inicio
      </a>
    </div>
  </div>

  <script>
    // estrellas
    const starsContainer = document.getElementById('stars-container');
    for (let i=0;i<50;i++){
      const s=document.createElement('div');
      s.className='star';
      s.style.left=Math.random()*100+'%';
      s.style.top=Math.random()*100+'%';
      s.style.animationDuration=(10+Math.random()*20)+'s';
      s.style.animationDelay=(Math.random()*5)+'s';
      starsContainer.appendChild(s);
    }
    // modo oscuro guardado (opcional)
    const savedTheme = localStorage.getItem('chat-theme');
    if (savedTheme === 'dark') {
      document.body.classList.add('dark');
      document.querySelectorAll('.star').forEach(star=>{
        star.style.background='rgba(255,255,255,.8)';
        star.style.boxShadow='0 0 5px rgba(255,255,255,.5)';
      });
    }
  </script>
</body>
</html>
