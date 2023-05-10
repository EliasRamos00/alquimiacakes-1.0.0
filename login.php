<?php
session_start();
require_once "php/conexion.php";
$user = $_POST['email'];
$pass = $_POST['password'];

try {
    // Crear una sentencia preparada para evitar inyecciones SQL
    $stm = $conn->prepare("SELECT * FROM personas WHERE correo = ? AND password = ?");
    $stm->bind_param("ss", $user, $pass);
    $stm->execute();

    // Verificar que el usuario y la contraseña son correctos
    $result = $stm->get_result();
    if ($row = $result->fetch_assoc()) {
        $_SESSION['sessionOn'] = true;
        $_SESSION['user'] = $row['nombre']; // Asignar el nombre de usuario desde la consulta
        header('Location: index.html');
        exit();
    } else {
        $_SESSION['sessionOn'] = false;
        session_destroy();
        header('Location: index.php?error=Datos incorrectos');
        exit();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
$conn->close();
?>

