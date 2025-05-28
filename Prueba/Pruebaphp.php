<?php
$host = "localhost";     
$usuario = "root";       
$contrasena = "";        
$basedatos = "bcg";      

$conn = new mysqli($host, $usuario, $contrasena, $basedatos);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        echo "<h2>✅ Bienvenido, " . htmlspecialchars($user['username']) . "</h2>";
        echo "<a href='../index.html'><button>Ir a la página principal</button></a>";
    } else {
        echo "<h2>❌ Contraseña incorrecta.</h2>";
        echo "<a href='prueba.html'><htmlbutton>Volver a intentar</button></a>";
    }
} else {
    echo "<h2>❌ Usuario no encontrado.</h2>";
    echo "<a href='prueba.html'><button>Volver a intentar</button></a>";
}

$conn->close();
?>
