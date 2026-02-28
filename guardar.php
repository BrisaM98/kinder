<?php
ob_start(); 
include 'conexion.php'; 

// Verificamos que los datos vengan del formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['maestra'], $_POST['correo'], $_POST['cel'])) {
    
    $maestra = $_POST['maestra'];
    $correo  = $_POST['correo'];
    $cel     = $_POST['cel'];

    // Preparamos la consulta para la tabla 'personal' que vimos en tu phpMyAdmin
    $stmt = $conn->prepare("INSERT INTO personal (maestra, correo, cel) VALUES (?, ?, ?)");

    if ($stmt === false) {
        die("X Error en la consulta SQL.");
    }

    if (headers_sent($file, $line)) {
        die("Headers ya enviados en $file línea $line");
    }

    // Ejecutamos la inserción de datos
    if ($stmt->execute([$maestra, $correo, $cel])) {
        ob_end_clean();
        // Te regresa al formulario después de guardar
        header("Location: index.php");
        exit(); 
    } else {
        $error = $stmt->errorInfo();
        echo "Error al ejecutar: " . $error[2];
    }

} else {
    echo "Acceso denegado o faltan datos.";
}
?>