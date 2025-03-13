<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.html");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$carrera = $_POST['carrera'];

$sql = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', carrera='$carrera' WHERE id=$usuario_id";
if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('✅ Datos actualizados correctamente.');
            window.location.href = '../html/perfil.html';
          </script>";
} else {
    echo "<script>
            alert('❌ Error al actualizar: " . $conn->error . "');
            window.location.href = '../html/perfil.html';
          </script>";
}
?>
