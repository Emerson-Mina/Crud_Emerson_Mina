<?php
session_start();
include 'conexion.php';

$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];

$sql = "SELECT * FROM usuarios WHERE correo='$correo'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    
    if (password_verify($contraseña, $usuario['contraseña'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        echo "
            <script>
                alert('✅ Inicio de sesión exitoso. Redirigiendo...');
                window.location.href = '../html/perfil.html';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('❌ Contraseña incorrecta. Inténtalo de nuevo.');
                window.location.href = '../login.html';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('❌ Usuario no encontrado. Verifica tu correo e inténtalo de nuevo.');
            window.location.href = '../login.html';
        </script>
    ";
}

$conn->close();
?>
