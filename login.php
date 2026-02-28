<?php
session_start();
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['usuario_usu'];
    $pass = $_POST['password_usu'];

    // 1. Buscamos al usuario por su nombre
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario_usu = ?");
    $stmt->execute([$user]);
    $usuario = $stmt->fetch();

    // 2. Verificamos si existe y si la contraseña coincide con el hash encriptado
    if ($usuario && password_verify($pass, $usuario['password_usu'])) {
        $_SESSION['id_usu'] = $usuario['id_usu'];
        $_SESSION['rol'] = $usuario['rol'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.<br>";
        echo "<a href='login.html'>Volver a intentar</a>";
    }
}
?>