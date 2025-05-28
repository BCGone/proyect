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

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO usuarios (username, email, password) 
        VALUES ('$username', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "✅ Usuario registrado con éxito. <a href='prueba.html'>Iniciar sesión</a>";
} else {
  echo "❌ Error: " . $conn->error;
}

$conn->close();
?>