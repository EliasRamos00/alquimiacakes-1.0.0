<?php
// Incluir el archivo de conexión
require_once "php/conexion.php";

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$telefono = $_POST['telefono'];

$sql = "INSERT INTO personas (nombre, correo, password, telefono) VALUES ('$nombre', '$email', '$contraseña', '$telefono')";
if (mysqli_query($conn, $sql)) {
  // Redirigir al usuario de vuelta a la página HTML
  header("Location: login.html");
} else {
  echo "Error al guardar datos: " . mysqli_error($conn);
}
  

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
