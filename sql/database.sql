CREATE DATABASE sistema_login CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sistema_login;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    correo VARCHAR(100) UNIQUE NOT NULL,
    telefono VARCHAR(15),
    carrera VARCHAR(100),
    contraseña VARCHAR(255) NOT NULL
);
