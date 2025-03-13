<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(["error" => "No autorizado"]);
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$sql = "SELECT nombre, correo, telefono, carrera FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

$stmt->close();
$conn->close();

echo json_encode($usuario);
?>
