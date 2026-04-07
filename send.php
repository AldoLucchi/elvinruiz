<?php
session_start();

// ============================================================
//  CONFIGURACIÓN  
// ============================================================
$destinatario = "elvin@ruizsantoni.com";       // Email donde llegan los leads
$asunto_base  = "Nuevo mensaje desde tu web";     // Asunto del correo
$remitente    = "noreply@ruizsantoni.com";      // Debe ser del mismo dominio del hosting
// ============================================================

// Solo acepta POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Sanitizar entradas
function limpiar($valor) {
    return htmlspecialchars(strip_tags(trim($valor)));
}

$fname     = limpiar($_POST['fname']     ?? '');
$lname     = limpiar($_POST['lname']     ?? '');
$birthdate = limpiar($_POST['birthdate'] ?? '');
$edad      = limpiar($_POST['edad']      ?? '');
$phone     = limpiar($_POST['phone']     ?? '');
$email     = limpiar($_POST['email']     ?? '');
$interest  = limpiar($_POST['interest']  ?? '');
$message   = limpiar($_POST['message']   ?? '');

// Validación mínima
if (empty($fname) || empty($phone) || empty($email)) {
    $_SESSION['status'] = '<span style="color:#e74c3c;">⚠️ Por favor completa los campos requeridos.</span>';
    header('Location: index.php#contacto');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['status'] = '<span style="color:#e74c3c;">⚠️ El correo electrónico no es válido.</span>';
    header('Location: index.php#contacto');
    exit;
}

// Construir el cuerpo del email (HTML)
$nombre_completo = $fname . ' ' . $lname;
$fecha_envio     = date('d/m/Y H:i');

$cuerpo = "
<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 20px; }
    .container { background: #ffffff; max-width: 560px; margin: 0 auto; border-radius: 10px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,0.1); }
    .header { background: #111111; padding: 28px 32px; text-align: center; }
    .header h1 { color: #d4af37; font-size: 20px; margin: 0; letter-spacing: 1px; }
    .header p { color: rgba(255,255,255,0.5); font-size: 13px; margin: 6px 0 0; }
    .body { padding: 28px 32px; }
    .field { margin-bottom: 18px; border-bottom: 1px solid #f0f0f0; padding-bottom: 14px; }
    .field:last-child { border-bottom: none; margin-bottom: 0; }
    .label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.08em; color: #999; margin-bottom: 4px; }
    .value { font-size: 15px; color: #222; }
    .footer { background: #f9f9f9; padding: 16px 32px; text-align: center; font-size: 12px; color: #aaa; border-top: 1px solid #eee; }
    .badge { display: inline-block; background: #d4af37; color: #111; font-size: 11px; font-weight: 700; padding: 3px 10px; border-radius: 20px; margin-bottom: 16px; }
  </style>
</head>
<body>
  <div class='container'>
    <div class='header'>
      <h1>Elvin Ruiz Santoni</h1>
      <p>Tu Aliado de Seguros — Nuevo Lead</p>
    </div>
    <div class='body'>
      <div class='badge'>🎯 Nuevo prospecto</div>
      <div class='field'>
        <div class='label'>Nombre completo</div>
        <div class='value'>{$nombre_completo}</div>
      </div>
      <div class='field'>
        <div class='label'>Fecha de Nacimiento</div>
        <div class='value'>{$birthdate}</div>
      </div>
      <div class='field'>
        <div class='label'>Edad</div>
        <div class='value'>{$edad} años</div>
      </div>
      <div class='field'>
        <div class='label'>Teléfono / WhatsApp</div>
        <div class='value'>{$phone}</div>
      </div>
      <div class='field'>
        <div class='label'>Correo electrónico</div>
        <div class='value'>{$email}</div>
      </div>
      <div class='field'>
        <div class='label'>Interés</div>
        <div class='value'>{$interest}</div>
      </div>
      <div class='field'>
        <div class='label'>Mensaje</div>
        <div class='value'>" . (empty($message) ? '<em style="color:#bbb;">Sin mensaje</em>' : $message) . "</div>
      </div>
    </div>
    <div class='footer'>
      Enviado el {$fecha_envio} desde ruizsantoni.com
    </div>
  </div>
</body>
</html>
";

// Headers del email
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: {$nombre_completo} <{$remitente}>\r\n";
$headers .= "Reply-To: {$email}\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Enviar
$enviado = mail($destinatario, $asunto_base . " — " . $nombre_completo, $cuerpo, $headers);

if ($enviado) {
    $_SESSION['status'] = '<span style="color:#2ecc71;">✅ ¡Gracias, ' . $fname . '! Recibimos tu solicitud. Te contactaremos pronto.</span>';
} else {
    $_SESSION['status'] = '<span style="color:#e74c3c;">⚠️ Hubo un problema al enviar. Por favor escríbenos directamente a <a href="mailto:elvin@ruizsantoni.com">elvin@ruizsantoni.com</a></span>';
}

header('Location: index.php#contacto');
exit;
?>