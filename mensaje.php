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
  echo "<script>
    function mostrarMensaje() {
      alert('Mensaje enviado con éxito, nuestro equipo se pondrá en contacto a la brevedad');
    }
    mostrarMensaje();
    </script>";
  // Redirigir al usuario de vuelta a la página HTML
  header("Location: contact.html");
} else {
  echo "<script>
    function mostrarMensaje() {
      alert('Hubo un error al enviar tu mensaje, por favor vuelve a intentarlo');
    }
    mostrarMensaje();
    </script>";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

