<?php
// Incluir el archivo de conexión
require_once "php/conexion.php";

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['correo'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

// Insertar datos en la base de datos
$sql = "INSERT INTO mensajes (nombre, correo, asunto, mensaje) VALUES ('$nombre', '$email', '$asunto', '$mensaje')";
if (mysqli_query($conn, $sql)) {
  // Redirigir al usuario de vuelta a la página HTML
  header("Location: contact.html");
} else {
  echo "Error al guardar datos: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
