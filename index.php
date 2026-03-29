<?php
// index.php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Elvin Ruiz Santoni — Tu Aliado de Seguros</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="style.css"/>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
<nav id="navbar">
  <div class="nav-logo">
    <img src="" alt="">
  </div>
  <ul class="nav-links">
    <li><a href="#iul">¿Qué es IUL?</a></li>
    <li><a href="#about">Sobre Elvin</a></li>
    <li><a href="#testimonios">Testimonios</a></li>
    <li><a href="#contacto" class="nav-cta">Agenda tu Cita</a></li>
  </ul>
  <div class="hamburger" onclick="toggleMenu()">
    <span></span><span></span><span></span>
  </div>
</nav>

<!-- HERO -->
<section id="hero">
  <div class="hero-bg-glow"></div>
  <div class="hero-lines"></div>
  <div class="hero-inner">
    <div class="hero-text">
      <div class="hero-badge"><span>Seguro de Vida Universal Indexado</span></div>
      <h1>Protege tu familia.<br/>Construye tu <em>legado</em>.</h1>
      <p>Soy Elvin Ruiz Santoni, asesor independiente de seguros IUL. Te ayudo a asegurar el futuro financiero de tu familia con estrategias personalizadas, sin riesgos en el mercado.</p>
      <div class="hero-actions">
        <a href="#contacto" class="btn-primary">
          <span>📅</span> Agenda tu consulta gratis
        </a>
        <a href="#iul" class="btn-secondary">¿Qué es un IUL?</a>
      </div>
      <div class="hero-stats">
        <div class="stat-item">
          <div class="stat-num">10+</div>
          <div class="stat-label">Años de experiencia</div>
        </div>
        <div class="stat-item">
          <div class="stat-num">250+</div>
          <div class="stat-label">Familias protegidas</div>
        </div>
        <div class="stat-item">
          <div class="stat-num">100%</div>
          <div class="stat-label">Independiente</div>
        </div>
      </div>
    </div>
    <div class="hero-photo">
      <div class="hero-photo-frame">
        <img src="" alt="">
        <div class="hero-card-badge">
          <div class="hcb-label">Calificación</div>
          <div class="hcb-value">Top Asesor 2024</div>
          <div class="hcb-stars">★★★★★</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="iul">
  <div class="section-inner">
    <div class="section-eyebrow"><span>El Producto</span></div>
    <h2 class="section-title reveal">¿Qué es el Seguro de<br/>Vida Universal Indexado?</h2>
    <p class="section-sub reveal">El IUL (Indexed Universal Life) es mucho más que un seguro de vida. Es una herramienta financiera que protege a tu familia <em>y</em> hace crecer tu dinero, vinculado al mercado pero sin exponerlo a sus pérdidas.</p>

    <div class="iul-grid">
      <div class="iul-card reveal">
        <div class="iul-icon">🛡️</div>
        <h3>Protección de Vida</h3>
        <p>Beneficio por fallecimiento que garantiza el bienestar económico de tu familia en cualquier circunstancia, libre de impuestos.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon">📈</div>
        <h3>Crecimiento Indexado</h3>
        <p>Tu valor en efectivo crece vinculado a índices como el S&P 500, con un piso del 0% — nunca pierdes cuando el mercado baja.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon">💰</div>
        <h3>Acceso a tu Dinero</h3>
        <p>Puedes acceder al valor acumulado mediante préstamos libres de impuestos para retiro, emergencias o educación de tus hijos.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon">🏦</div>
        <h3>Retiro Tax-Free</h3>
        <p>Genera un ingreso complementario en la jubilación sin que el gobierno se lleve una parte. Tu esfuerzo, tu dinero, tu legado.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon">⚖️</div>
        <h3>Flexibilidad Total</h3>
        <p>Ajusta las primas y el beneficio según tu situación. El IUL se adapta a los cambios de tu vida, no al revés.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon">🌐</div>
        <h3>Múltiples Compañías</h3>
        <p>Como asesor independiente, tengo acceso a los mejores productos del mercado para encontrar el que más te conviene a ti.</p>
      </div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section id="about">
  <div class="section-inner">
    <div class="about-grid">
      <div class="about-img-wrap reveal">
        <div class="about-gold-accent"></div>
        <div class="about-gold-accent-br"></div>
        <img src="" alt="">
      </div>
      <div class="about-text">
        <div class="section-eyebrow" style="margin-bottom:16px;"><span style="color:var(--gold);">Tu Aliado</span></div>
        <h2 class="section-title reveal">Conoce a<br/>Elvin Ruiz Santoni</h2>
        <p class="reveal">Soy un asesor financiero independiente especializado en seguros de vida IUL, con más de 15 años ayudando a familias puertorriqueñas a construir un futuro financiero sólido.</p>
        <p class="reveal">Mi filosofía es simple: <strong style="color:var(--gold-light);">tu aliado</strong>, no un vendedor. Analizo tu situación particular, te educo sobre tus opciones y juntos diseñamos una estrategia que realmente funcione para ti y los tuyos.</p>
        <p class="reveal">Como agente independiente, trabajo con múltiples aseguradoras líderes, lo que me permite ofrecerte siempre el mejor producto al mejor precio — sin compromisos con ninguna compañía.</p>
        <div class="about-pillars reveal">
          <div class="pillar">
            <div class="pillar-icon">🔦</div>
            <div class="pillar-title">Guía experta</div>
            <div class="pillar-desc">Explico lo complejo de forma simple y transparente.</div>
          </div>
          <div class="pillar">
            <div class="pillar-icon">🤝</div>
            <div class="pillar-title">Relación a largo plazo</div>
            <div class="pillar-desc">Estoy contigo antes, durante y después de la póliza.</div>
          </div>
          <div class="pillar">
            <div class="pillar-icon">⚖️</div>
            <div class="pillar-title">100% Independiente</div>
            <div class="pillar-desc">Mi lealtad es contigo, no con ninguna aseguradora.</div>
          </div>
          <div class="pillar">
            <div class="pillar-icon">🏆</div>
            <div class="pillar-title">Resultados probados</div>
            <div class="pillar-desc">Más de 500 familias protegidas y satisfechas.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIOS -->
<section id="testimonios">
  <div class="section-inner">
    <div class="section-eyebrow"><span>Testimonios</span></div>
    <h2 class="section-title reveal">Lo que dicen<br/>mis clientes</h2>

    <div class="testimonios-slider">
      <div class="testimonios-track" id="track">
        <!-- tarjetas de testimonios (igual que tu HTML original) -->
      </div>
    </div>
    <div class="slider-controls">
      <button class="slider-btn" onclick="slide(-1)">&#8592;</button>
      <div class="slider-dots" id="dots"></div>
      <button class="slider-btn" onclick="slide(1)">&#8594;</button>
    </div>
  </div>
</section>

<!-- CONTACTO -->
<section id="contacto">
  <div class="section-inner">
    <div class="contact-grid">
      <div class="contact-info">
        <div class="section-eyebrow" style="margin-bottom:16px;"><span style="color:var(--gold);">Contacto</span></div>
        <h2 class="section-title reveal" style="color:white;">¿Listo para proteger<br/>a tu familia?</h2>
        <p class="reveal">La consulta inicial es completamente gratuita y sin compromisos. Conversamos, analizo tu situación y te presento opciones reales adaptadas a ti.</p>

        <div class="contact-items">
          <a href="https://wa.me/17877851818" target="_blank" class="contact-item reveal">
            <div class="ci-icon">📱</div>
            <div class="ci-text">+1 (787) 785-1818</div>
          </a>
          <a href="mailto:elvin@ruizsantoni.com" class="contact-item reveal">
            <div class="ci-icon">✉️</div>
            <div class="ci-text">elvin@ruizsantoni.com</div>
          </a>
        </div>

        <div class="social-links reveal">
          <!-- tus iconos sociales -->
        </div>
      </div>

      <!-- FORMULARIO FUNCIONAL -->
      <div class="contact-form-wrap reveal">
        <div id="formContent">
          <div class="form-title">Solicita tu consulta gratuita</div>
          <div class="form-subtitle">Sin costo · Sin compromiso · Respuesta en 24 horas</div>

          <!-- Formulario apunta a send.php -->
          <form method="POST" action="send.php">
            <div class="form-row">
              <div class="form-group">
                <label>Nombre</label>
                <input type="text" id="fname" name="fname" placeholder="Tu nombre" required/>
              </div>
              <div class="form-group">
                <label>Apellido</label>
                <input type="text" id="lname" name="lname" placeholder="Tu apellido" required/>
              </div>
            </div>
            <div class="form-group">
              <label>Teléfono / WhatsApp</label>
              <input type="tel" id="phone" name="phone" placeholder="+1 (787) 000-0000" required/>
            </div>
            <div class="form-group">
              <label>Correo Electrónico</label>
              <input type="email" id="email" name="email" placeholder="tu@email.com" required/>
            </div>
            <div class="form-group">
              <label>¿Qué te interesa?</label>
              <select id="interest" name="interest">
                <option value="">Selecciona una opción...</option>
                <option>Protección familiar con IUL</option>
                <option>Plan de retiro tax-free</option>
                <option>Acumulación de riqueza</option>
                <option>Proteger el negocio familiar</option>
                <option>Solo quiero más información</option>
              </select>
            </div>
            <div class="form-group">
              <label>Mensaje (opcional)</label>
              <textarea id="message" name="message" placeholder="Cuéntame sobre tu situación o pregunta..."></textarea>
            </div>
            <button type="submit" class="btn-submit">
              <span>📅</span> Solicitar mi consulta gratis
            </button>
          </form>

          <?php
          if(isset($_SESSION['status'])) {
              echo '<div class="form-success reveal">' . $_SESSION['status'] . '</div>';
              unset($_SESSION['status']);
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="footer-logo">
    <img src="" alt="">
  </div>
  <div class="footer-copy">
    © <span id="year"></span> <span>Elvin Ruiz Santoni</span> — Tu Aliado de Seguros. Todos los derechos reservados.
  </div>
  <div class="footer-links">
    <a href="#hero">Inicio</a>
    <a href="#iul">IUL</a>
    <a href="#about">Sobre mí</a>
    <a href="#contacto">Contacto</a>
  </div>
</footer>

<a href="https://wa.me/17877851818" target="_blank" class="wa-float" title="WhatsApp">
  <!-- icono WA -->
</a>

<script type="module" src="app.js"></script>
<script>
  // Set current year in footer
  document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>