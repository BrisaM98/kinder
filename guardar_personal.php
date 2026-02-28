<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usu = $_POST['id_usu'];
    $maestra = $_POST['maestra_per'];
    $correo = $_POST['correo_per'];
    $cel = $_POST['cel_per'];

    $check = $conn->prepare("SELECT id_usu FROM usuarios WHERE id_usu = ?");
    $check->execute([$id_usu]);

    if ($check->rowCount() > 0) {
        $stmt = $conn->prepare("INSERT INTO personal (id_usu, maestra_per, correo_per, cel_per) VALUES (?, ?, ?, ?)");
        $stmt->execute([$id_usu, $maestra, $correo, $cel]);
        echo "Personal registrado correctamente.<br>";
    } else {
        echo "Error, el ID de Usuario no existe.<br>";
    }

    echo "<br><a href='dashboard.php'><button type='button'>Continuar al Panel</button></a>";
}
?>
