<?php
// index.php
session_start();
$mostrar_modal = false;
if (isset($_SESSION['status_ok']) && $_SESSION['status_ok'] === true) {
    $mostrar_modal = true;
    $modal_nombre = $_SESSION['modal_nombre'] ?? '';
    unset($_SESSION['status_ok']);
    unset($_SESSION['modal_nombre']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Elvin Ruiz Santoni — Tu Aliado de Seguros</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="icon" type="image/x-icon" href="/assets/logo.png">
<link rel="stylesheet" href="style.css"/>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>

<style>
/* ===================== MODAL ÉXITO ===================== */
.modal-overlay {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.75);
  z-index: 9999;
  align-items: center;
  justify-content: center;
  padding: 20px;
  backdrop-filter: blur(6px);
  -webkit-backdrop-filter: blur(6px);
}
.modal-overlay.active {
  display: flex;
}
.modal-box {
  background: #1B2A4A;
  border: 1px solid rgba(212,175,55,0.3);
  border-radius: 20px;
  padding: 52px 44px 44px;
  max-width: 480px;
  width: 100%;
  text-align: center;
  position: relative;
  animation: modalIn 0.4s cubic-bezier(0.34,1.56,0.64,1) both;
}
@keyframes modalIn {
  from { opacity: 0; transform: scale(0.85) translateY(20px); }
  to   { opacity: 1; transform: scale(1) translateY(0); }
}
.modal-icon-wrap {
  width: 80px;
  height: 80px;
  background: rgba(212,175,55,0.1);
  border: 2px solid rgba(212,175,55,0.35);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 28px;
  animation: iconPulse 2s ease-in-out infinite;
}
@keyframes iconPulse {
  0%,100% { box-shadow: 0 0 0 0 rgba(212,175,55,0.25); }
  50%      { box-shadow: 0 0 0 14px rgba(212,175,55,0); }
}
.modal-icon-wrap i {
  font-size: 36px;
  color: #d4af37;
}
.modal-title {
  font-family: 'Playfair Display', serif;
  font-size: 1.75rem;
  font-weight: 700;
  color: #ffffff;
  margin-bottom: 12px;
  line-height: 1.2;
}
.modal-title em {
  color: #d4af37;
  font-style: normal;
}
.modal-subtitle {
  font-family: 'Lato', sans-serif;
  font-size: 1rem;
  color: rgba(255,255,255,0.6);
  line-height: 1.6;
  margin-bottom: 8px;
}
.modal-divider {
  width: 48px;
  height: 2px;
  background: linear-gradient(90deg, transparent, #d4af37, transparent);
  margin: 20px auto 24px;
}
.modal-detail {
  background: rgba(212,175,55,0.06);
  border: 1px solid rgba(212,175,55,0.15);
  border-radius: 12px;
  padding: 18px 20px;
  margin-bottom: 14px;
  display: flex;
  align-items: flex-start;
  gap: 14px;
  text-align: left;
}
.modal-detail i {
  color: #d4af37;
  font-size: 18px;
  margin-top: 2px;
  flex-shrink: 0;
}
.modal-detail-text {
  font-family: 'Lato', sans-serif;
  font-size: 0.9rem;
  color: rgba(255,255,255,0.65);
  line-height: 1.5;
}
.modal-detail-text strong {
  color: rgba(255,255,255,0.9);
  display: block;
  margin-bottom: 2px;
}
.modal-detail-text a {
  color: #d4af37;
  text-decoration: none;
}
.modal-close-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: linear-gradient(135deg, #d4af37, #b8962e);
  color: #111;
  font-family: 'Lato', sans-serif;
  font-size: 0.95rem;
  font-weight: 700;
  padding: 14px 32px;
  border-radius: 50px;
  border: none;
  cursor: pointer;
  margin-top: 24px;
  transition: opacity 0.2s, transform 0.2s;
}
.modal-close-btn:hover {
  opacity: 0.9;
  transform: translateY(-1px);
}
.modal-close-x {
  position: absolute;
  top: 16px;
  right: 20px;
  background: none;
  border: none;
  color: rgba(255,255,255,0.3);
  font-size: 20px;
  cursor: pointer;
  line-height: 1;
  transition: color 0.2s;
  padding: 4px;
}
.modal-close-x:hover {
  color: rgba(255,255,255,0.7);
}
@media (max-width: 520px) {
  .modal-box { padding: 44px 24px 32px; }
  .modal-title { font-size: 1.45rem; }
}
</style>
</head>
<body>

<?php if ($mostrar_modal): ?>
<div class="modal-overlay active" id="successModal">
  <div class="modal-box">
    <button class="modal-close-x" onclick="cerrarModal()" aria-label="Cerrar">
      <i class="fa-solid fa-xmark"></i>
    </button>
    <div class="modal-icon-wrap">
      <i class="fa-solid fa-check"></i>
    </div>
    <div class="modal-title">¡Mensaje enviado<br/>con <em>éxito</em>!</div>
    <?php if (!empty($modal_nombre)): ?>
    <div class="modal-subtitle">Gracias, <strong style="color:rgba(255,255,255,0.9);"><?php echo htmlspecialchars($modal_nombre); ?></strong>.</div>
    <?php endif; ?>
    <div class="modal-subtitle">Tu solicitud fue recibida correctamente.</div>
    <div class="modal-divider"></div>
    <div class="modal-detail">
      <i class="fa-solid fa-clock"></i>
      <div class="modal-detail-text">
        <strong>Respuesta en menos de 24 horas</strong>
        Elvin revisará tu información y se comunicará contigo pronto por teléfono o correo electrónico.
      </div>
    </div>
    <div class="modal-detail">
      <i class="fa-brands fa-whatsapp"></i>
      <div class="modal-detail-text">
        <strong>¿Necesitas respuesta inmediata?</strong>
        Escríbele directamente por WhatsApp al <a href="https://wa.me/17877851818" target="_blank">+1 (787) 785-1818</a>
      </div>
    </div>
    <button class="modal-close-btn" onclick="cerrarModal()">
      <i class="fa-solid fa-house"></i> Volver al inicio
    </button>
  </div>
</div>
<?php endif; ?>

<nav id="navbar">
  <div class="nav-logo">
    <img src="assets/logo.png" alt="Elvin Ruiz Santoni Logo">
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
      <p>Soy Elvin Ruiz Santoni, asesor independiente de seguros. Te ayudo a asegurar el futuro financiero de tu familia con estrategias personalizadas, sin riesgos en el mercado.</p>
      <div class="hero-actions">
        <a href="#contacto" class="btn-primary">
          <i class="fa-regular fa-calendar"></i> Agenda tu consulta gratis
        </a>
        <a href="#iul" class="btn-secondary">¿Qué es un IUL?</a>
      </div>
      <div class="hero-stats">
        <div class="stat-item">
          <div class="stat-num">25+</div>
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
        <img src="assets/conocemasdeelvin.png" alt="Elvin Ruiz Santoni">
        <div class="hero-card-badge">
          <div class="hcb-label">Calificación</div>
          <div class="hcb-value">Top Asesor 2024</div>
          <div class="hcb-stars">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- IUL -->
<section id="iul">
  <div class="section-inner">
    <div class="section-eyebrow"><span>El Producto</span></div>
    <h2 class="section-title reveal">¿Qué es el Seguro de<br/>Vida Universal Indexado?</h2>
    <p class="section-sub reveal">El IUL (Indexed Universal Life) es mucho más que un seguro de vida. Es una herramienta financiera que protege a tu familia y hace crecer tu dinero, vinculado al mercado pero sin exponerlo a sus pérdidas.</p>

    <div class="iul-grid">
      <div class="iul-card reveal">
        <div class="iul-icon"><i class="fa-solid fa-shield-halved"></i></div>
        <h3>Protección de Vida</h3>
        <p>Beneficio por fallecimiento que garantiza el bienestar económico de tu familia en cualquier circunstancia, libre de impuestos.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon"><i class="fa-solid fa-chart-line"></i></div>
        <h3>Crecimiento Indexado</h3>
        <p>Tu valor en efectivo crece vinculado a índices como el S&P 500, con un piso del 0% — nunca pierdes cuando el mercado baja.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon"><i class="fa-solid fa-money-bill-wave"></i></div>
        <h3>Acceso a tu Dinero</h3>
        <p>Puedes acceder al valor acumulado mediante préstamos libres de impuestos para retiro, emergencias o educación de tus hijos.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon"><i class="fa-solid fa-piggy-bank"></i></div>
        <h3>Retiro Tax-Free</h3>
        <p>Genera un ingreso complementario en la jubilación sin que el gobierno se lleve una parte. Tu esfuerzo, tu dinero, tu legado.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon"><i class="fa-solid fa-sliders"></i></div>
        <h3>Flexibilidad Total</h3>
        <p>Ajusta las primas y el beneficio según tu situación. El IUL se adapta a los cambios de tu vida, no al revés.</p>
      </div>
      <div class="iul-card reveal">
        <div class="iul-icon"><i class="fa-solid fa-building-columns"></i></div>
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
        <img src="assets/hero-photo.png" alt="Conoce mas de elvin ruiz santoni">
      </div>
      <div class="about-text">
        <div class="section-eyebrow" style="margin-bottom:16px;"><span style="color:var(--gold);">Tu Aliado</span></div>
        <h2 class="section-title reveal">Conoce a<br/>Elvin Ruiz Santoni</h2>
        <p class="reveal">Soy un asesor financiero independiente especializado en seguros de vida IUL,
          con más de 25 años ayudando a familias puertorriqueñas a construir un futuro financiero sólido.</p>
        <p class="reveal">Mi filosofía es simple: <strong style="color:var(--gold-light);">tu aliado</strong>, no un vendedor. Analizo tu situación particular, te educo sobre tus opciones y juntos diseñamos una estrategia que realmente funcione para ti y los tuyos.</p>
        <p class="reveal">Como agente independiente, trabajo con múltiples aseguradoras líderes, lo que me permite ofrecerte siempre el mejor producto al mejor precio sin compromisos con ninguna compañía.</p>
        <div class="about-pillars reveal">
          <div class="pillar">
            <div class="pillar-icon"><i class="fa-solid fa-lightbulb"></i></div>
            <div class="pillar-title">Guía experta</div>
            <div class="pillar-desc">Explico lo complejo de forma simple y transparente.</div>
          </div>
          <div class="pillar">
            <div class="pillar-icon"><i class="fa-solid fa-handshake"></i></div>
            <div class="pillar-title">Relación a largo plazo</div>
            <div class="pillar-desc">Estoy contigo antes, durante y después de la póliza.</div>
          </div>
          <div class="pillar">
            <div class="pillar-icon"><i class="fa-solid fa-scale-balanced"></i></div>
            <div class="pillar-title">100% Independiente</div>
            <div class="pillar-desc">Mi lealtad es contigo, no con ninguna aseguradora.</div>
          </div>
          <div class="pillar">
            <div class="pillar-icon"><i class="fa-solid fa-trophy"></i></div>
            <div class="pillar-title">Resultados probados</div>
            <div class="pillar-desc">Más de 250 familias protegidas y satisfechas.</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CAROUSEL ASEGURADORAS -->
<section id="aseguradoras">
  <div class="aseg-label section-eyebrow" style="color: var(--blue); justify-content: center;"><span style="color: var(--gold);">Acceso a las mejores aseguradoras del mercado</span></div>
  <div class="aseg-track-wrap">
    <div class="aseg-track" id="asegTrack">
      <div class="aseg-item"><img src="assets/finfitlogo.png" alt="FinFit"></div>
      <div class="aseg-item"><img src="assets/JohnHancocklogo.svg" alt="John Hancock"></div>
      <div class="aseg-item"><img src="assets/FGlogo.svg" alt="FG"></div>
      <div class="aseg-item"><img src="assets/linconllogo.svg" alt="Lincoln"></div>
      <div class="aseg-item"><img src="assets/triples.png" alt="Triples Logo"></div>
      <div class="aseg-item"><img src="assets/universallogo.png" alt="Universal Logo"></div>
      <div class="aseg-item"><img src="assets/finfitlogo.png" alt="FinFit"></div>
      <div class="aseg-item"><img src="assets/JohnHancocklogo.svg" alt="John Hancock"></div>
      <div class="aseg-item"><img src="assets/FGlogo.svg" alt="FG"></div>
      <div class="aseg-item"><img src="assets/linconllogo.svg" alt="Lincoln"></div>
      <div class="aseg-item"><img src="assets/triples.png" alt="Triples Logo"></div>
      <div class="aseg-item"><img src="assets/universallogo.png" alt="Universal Logo"></div>
    </div>
  </div>
</section>

<!-- BENEFICIOS EN VIDA -->
<section id="vida">
  <div class="section-inner">
    <div class="section-eyebrow"><span>Beneficios en Vida</span></div>
    <h2 class="section-title reveal" style="color:white">Tu seguro trabaja para ti<br/>hoy, no solo cuando fallezcas.</h2>
    <p class="section-sub reveal" style="color: white;">Con tu póliza IUL puedes acceder a tu dinero en vida si lo necesitas. Tu familia no tiene que esperar.</p>

    <div class="vida-grid">
      <div class="vida-card reveal">
        <div class="vida-icon"><i class="fa-solid fa-ribbon"></i></div>
        <h3>Diagnóstico crítico</h3>
        <p>Si te diagnostican <strong>cáncer, infarto o derrame cerebral</strong>, puedes acceder a tu beneficio para cubrir tratamientos y gastos médicos de inmediato.</p>
      </div>
      <div class="vida-card reveal">
        <div class="vida-icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
        <h3>Cuidado personal</h3>
        <p>Si necesitas ayuda para realizar <strong>actividades diarias básicas</strong>, tu póliza puede cubrir cuidado en el hogar o en un centro especializado.</p>
      </div>
      <div class="vida-card reveal">
        <div class="vida-icon"><i class="fa-solid fa-heart-pulse"></i></div>
        <h3>Expectativa de vida limitada</h3>
        <p>Ante un diagnóstico terminal, puedes usar tu beneficio para <strong>proteger a tu familia</strong> y poner tus asuntos en orden con dignidad y tranquilidad.</p>
      </div>
    </div>

    <div class="vida-cta reveal">
      <div class="vida-cta-text">
        <i class="fa-solid fa-circle-exclamation"></i>
        <span>No esperes a morir para que tu seguro te proteja.</span>
      </div>
      <a href="#contacto" class="btn-primary">Quiero saber más <i class="fa-solid fa-arrow-right"></i></a>
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
        <div class="testimonio-card">
          <p class="testimonio-text">Elvin me explicó el IUL de una manera que nunca nadie me había explicado. Ahora tengo protección para mi familia y un plan de retiro sólido. ¡Totalmente recomendado!</p>
          <div class="testimonio-autor">
            <div class="autor-avatar">CR</div>
            <div>
              <div class="autor-name">Carlos R.</div>
              <div class="autor-loc">San Juan, Puerto Rico</div>
              <div class="stars">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="testimonio-card">
          <p class="testimonio-text">Lo que más valoro de Elvin es su honestidad. No trata de vender, trata de educar. Gracias a él entendí cómo proteger a mis hijos y ahorrar para el futuro al mismo tiempo.</p>
          <div class="testimonio-autor">
            <div class="autor-avatar">MG</div>
            <div>
              <div class="autor-name">María G.</div>
              <div class="autor-loc">Bayamón, Puerto Rico</div>
              <div class="stars">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="testimonio-card">
          <p class="testimonio-text">Tenía miedo de los seguros porque no los entendía. Elvin me dedicó tiempo, me explicó paso a paso y hoy tengo tranquilidad financiera que antes no tenía. ¡Un profesional excelente!</p>
          <div class="testimonio-autor">
            <div class="autor-avatar">JM</div>
            <div>
              <div class="autor-name">José M.</div>
              <div class="autor-loc">Caguas, Puerto Rico</div>
              <div class="stars">
                <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
              </div>
            </div>
          </div>
        </div>
        <!--<div class="testimonio-card">-->
        <!--  <p class="testimonio-text">Llevaba años pensando en contratar un seguro de vida pero nunca lo hacía. Elvin me hizo entender que cada día que espero es dinero que pierdo. ¡Ojalá lo hubiera contactado antes!</p>-->
        <!--  <div class="testimonio-autor">-->
        <!--    <div class="autor-avatar">RP</div>-->
        <!--    <div>-->
        <!--      <div class="autor-name">Roberto P.</div>-->
        <!--      <div class="autor-loc">Mayagüez, Puerto Rico</div>-->
        <!--      <div class="stars">-->
        <!--        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
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
            <div class="ci-icon"><i class="fa-solid fa-mobile-screen"></i></div>
            <div class="ci-text">+1 (787) 785-1818</div>
          </a>
          <a href="mailto:elvin@ruizsantoni.com" class="contact-item reveal">
            <div class="ci-icon"><i class="fa-solid fa-envelope"></i></div>
            <div class="ci-text">elvin@ruizsantoni.com</div>
          </a>
        </div>

        <div class="social-links reveal">
          <a href="https://web.facebook.com/ruizsantoniseguros" target="_blank" class="social-link" title="Facebook">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
          <a href="https://www.instagram.com/topfinancialgrouppr/" target="_blank" class="social-link" title="Instagram">
            <i class="fa-brands fa-instagram"></i>
          </a>
          <a href="https://wa.me/17877851818" target="_blank" class="social-link" title="WhatsApp">
            <i class="fa-brands fa-whatsapp"></i>
          </a>
        </div>
      </div>

      <!-- FORMULARIO FUNCIONAL -->
      <div class="contact-form-wrap reveal">
        <div id="formContent">
          <div class="form-title">Solicita tu consulta gratuita</div>
          <div class="form-subtitle">Sin costo · Sin compromiso · Respuesta en 24 horas</div>

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
            <div class="form-row">
              <div class="form-group">
                <label>Fecha de Nacimiento</label>
                <input type="date" id="birthdate" name="birthdate" required
                  min="1924-01-01"
                  max="<?php echo date('Y-m-d', strtotime('-1 years')); ?>"
                  onchange="calcularEdad(this.value)"/>
              </div>
              <div class="form-group">
                <label>Edad</label>
                <input type="number" id="edad" name="edad" placeholder="Tu edad" min="1" max="100" required readonly style="background:rgba(255,255,255,0.04);cursor:default;"/>
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
              <i class="fa-regular fa-calendar"></i> Solicitar mi consulta gratis
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="footer-logo">
    <img src="assets/logo.png" alt="Elvin Ruiz Santoni Logo">
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

<script>
// --- Scroll reveal
const reveals = document.querySelectorAll('.reveal');
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry, i) => {
    if (entry.isIntersecting) {
      setTimeout(() => entry.target.classList.add('visible'), i * 80);
    }
  });
}, { threshold: 0.1 });
reveals.forEach(el => observer.observe(el));

// --- Slider
const track = document.getElementById('track');
const cards = track.querySelectorAll('.testimonio-card');
let current = 0;
let perView = window.innerWidth < 700 ? 1 : window.innerWidth < 1000 ? 2 : 3;
const total = Math.ceil(cards.length / perView);
function buildDots() {
  const dotsEl = document.getElementById('dots');
  dotsEl.innerHTML = '';
  for (let i = 0; i < total; i++) {
    const d = document.createElement('div');
    d.className = 'dot' + (i === current ? ' active' : '');
    d.onclick = () => goTo(i);
    dotsEl.appendChild(d);
  }
}
function goTo(n) {
  current = Math.max(0, Math.min(n, total - 1));
  const cardW = cards[0].offsetWidth + 24;
  track.style.transform = 'translateX(-' + (current * perView * cardW) + 'px)';
  buildDots();
}
function slide(dir) { goTo(current + dir); }
window.addEventListener('resize', () => {
  perView = window.innerWidth < 700 ? 1 : window.innerWidth < 1000 ? 2 : 3;
  goTo(0);
});
buildDots();
setInterval(() => slide(1), 5000);

// --- Mobile menu
function toggleMenu() {
  const links = document.querySelector('.nav-links');
  links.classList.toggle('mobile-open');
}
document.querySelectorAll('.nav-links a').forEach(a => {
  a.addEventListener('click', () => {
    document.querySelector('.nav-links').classList.remove('mobile-open');
  });
});

// --- Edad
function calcularEdad(fechaNac) {
  if (!fechaNac) return;
  const hoy = new Date();
  const nac = new Date(fechaNac);
  let edad = hoy.getFullYear() - nac.getFullYear();
  const mesActual = hoy.getMonth();
  const mesNac = nac.getMonth();
  if (mesActual < mesNac || (mesActual === mesNac && hoy.getDate() < nac.getDate())) {
    edad--;
  }
  document.getElementById('edad').value = edad;
}

// --- Modal
function cerrarModal() {
  const modal = document.getElementById('successModal');
  if (modal) {
    modal.style.transition = 'opacity 0.25s ease';
    modal.style.opacity = '0';
    setTimeout(() => modal.remove(), 260);
  }
}
document.addEventListener('click', function(e) {
  const modal = document.getElementById('successModal');
  if (modal && e.target === modal) cerrarModal();
});
document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') cerrarModal();
});

// --- Footer year
document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>
