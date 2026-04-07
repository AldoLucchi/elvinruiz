<?php
session_start();

// ============================================================
// CONFIGURACIÓN 
// ============================================================
$destinatario = "aldolucchi1993@gmail.com";
$asunto_base  = "Nuevo mensaje desde tu web";
$remitente    = "noreply@ruizsantoni.com";
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
    header('Location: index.php');
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['status'] = '<span style="color:#e74c3c;">⚠️ El correo electrónico no es válido.</span>';
    header('Location: index.php');
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
.header h1 { color: #d4af37; font-size: 20px; margin: 0; }
.body { padding: 28px 32px; }
.field { margin-bottom: 16px; }
.label { font-size: 12px; color: #999; }
.value { font-size: 15px; color: #222; }
.footer { background: #f9f9f9; padding: 16px; text-align: center; font-size: 12px; color: #aaa; }
</style>
</head>
<body>
<div class='container'>
<div class='header'>
<h1>Nuevo Lead</h1>
</div>
<div class='body'>
<div class='field'><div class='label'>Nombre</div><div class='value'>{$nombre_completo}</div></div>
<div class='field'><div class='label'>Fecha de Nacimiento</div><div class='value'>{$birthdate}</div></div>
<div class='field'><div class='label'>Edad</div><div class='value'>{$edad}</div></div>
<div class='field'><div class='label'>Teléfono</div><div class='value'>{$phone}</div></div>
<div class='field'><div class='label'>Email</div><div class='value'>{$email}</div></div>
<div class='field'><div class='label'>Interés</div><div class='value'>{$interest}</div></div>
<div class='field'><div class='label'>Mensaje</div><div class='value'>" . (empty($message) ? 'Sin mensaje' : $message) . "</div></div>
</div>
<div class='footer'>Enviado el {$fecha_envio}</div>
</div>
</body>
</html>
";

// Headers del email
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: {$remitente}\r\n";
$headers .= "Reply-To: {$email}\r\n";

// Enviar
$enviado = mail($destinatario, $asunto_base . " — " . $nombre_completo, $cuerpo, $headers);

if ($enviado) {
    $_SESSION['status_ok']    = true;
    $_SESSION['modal_nombre'] = $fname;
} else {
    $_SESSION['status'] = '<span style="color:#e74c3c;">⚠️ Error al enviar. Intenta nuevamente.</span>';
}

header('Location: index.php');
exit;
?>