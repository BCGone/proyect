<?php
$host = "localhost";     // Servidor (localhost si es XAMPP)
$usuario = "root";       // Usuario por defecto en XAMPP
$contrasena = "";        // Sin contraseña por defecto
$basedatos = "bcg";  // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";
?>

<?php

session_start();


if (!isset($_SESSION['user_id'])) {
  die("❌ Acceso denegado.");
}

$new_username = $_POST['new_username'];
$user_id = $_SESSION['user_id'];

$sql = "UPDATE usuarios SET username = '$new_username' WHERE id = $user_id";

if ($conn->query($sql) === TRUE) {
  $_SESSION['username'] = $new_username;
  echo "✅ Nombre de usuario actualizado a '$new_username'.";
} else {
  echo "❌ Error al actualizar: " . $conn->error;
}

$conn->close();
?>

<?php
session_start();


if (!isset($_SESSION['user_id'])) {
  die("❌ Acceso denegado.");
}

$user_id = $_SESSION['user_id'];

$sql = "DELETE FROM usuarios WHERE id = $user_id";

if ($conn->query($sql) === TRUE) {
  session_destroy();
  echo "✅ Cuenta eliminada correctamente.";
} else {
  echo "❌ Error al eliminar: " . $conn->error;
}

$conn->close();
?>
