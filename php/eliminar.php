<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario_id'])) {
    echo "
        <script>
            alert('❌ No has iniciado sesión.');
            window.location.href = '../login.html';
        </script>
    ";
    exit();
}

$usuario_id = $_SESSION['usuario_id'];
$sql = "DELETE FROM usuarios WHERE id=$usuario_id";

if ($conn->query($sql) === TRUE) {
    session_destroy();
    echo "
        <script>
            alert('✅ Tu cuenta ha sido eliminada correctamente.');
            window.location.href = '../login.html';
        </script>
    ";
    exit();
} else {
    echo "
        <script>
            alert('❌ Error al eliminar la cuenta. Inténtalo de nuevo.');
            window.location.href = '../html/perfil.php';
        </script>
    ";
}

$conn->close();
?>
