<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $_POST['usuario_usu'];
    $pass = $_POST['password_usu'];
    $rol  = $_POST['rol'];

    // ENCRIPTACIÓN: Creamos el hash de la contraseña
    $pass_encriptada = password_hash($pass, PASSWORD_DEFAULT);

    $checkUser = $conn->prepare("SELECT id_usu FROM usuarios WHERE usuario_usu = ?");
    $checkUser->execute([$user]);

    if ($checkUser->rowCount() > 0) {
        echo "Error: El nombre de usuario '$user' no esta disponible.<br>";
        echo "<a href='form_usuarios.php'>Intentar de nuevo</a>";
    } else {
        // Guardamos el HASH, no la contraseña real
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario_usu, password_usu, rol) VALUES (?, ?, ?)");
        if ($stmt->execute([$user, $pass_encriptada, $rol])) {
            echo "Cuenta creada con exito.<br>";
            echo "<a href='form_personal.php'>Siguiente: Registrar personal</a>";
        } else {
            echo "Error al procesar la solicitud.";
        }
    }
}
?>