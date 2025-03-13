<?php
include 'conexion.php';

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$carrera = $_POST['carrera'];
$contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

mysqli_set_charset($conn, "utf8");

$sql = "INSERT INTO usuarios (nombre, correo, telefono, carrera, contraseña) VALUES ('$nombre', '$correo', '$telefono', '$carrera', '$contraseña')";

if ($conn->query($sql) === TRUE) {
    echo "
        <script>
            alert('✅ Registro exitoso. Serás redirigido al inicio de sesión.');
            window.location.href = '../login.html';
        </script>
    ";
} else {
    echo "<script>alert('❌ Error al registrar: " . $conn->error . "');</script>";
}

$conn->close();
?>
