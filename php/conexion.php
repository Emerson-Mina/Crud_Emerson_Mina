<?php
$servidor = "172.2"; //IP del contenedor de Docker de Mysql o  use localhost
$usuario = "root";
$clave = "";
$base_de_datos = "sistema_login";

$conn = new mysqli($servidor, $usuario, $clave, $base_de_datos);
$conn->set_charset("utf8mb4");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
