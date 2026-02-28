<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_usu = $_POST['id_usu'];
    $grupo = $_POST['grupo_gpo'];

    $check = $conn->prepare("SELECT id_usu FROM usuarios WHERE id_usu = ?");
    $check->execute([$id_usu]);

    if ($check->rowCount() > 0) {
        $stmt = $conn->prepare("INSERT INTO grupo (id_usu, grupo_gpo) VALUES (?, ?)");
        $stmt->execute([$id_usu, $grupo]);
        echo "Grupo creado correctamente.<br>";
    } else {
        echo "Error, el ID de Usuario no existe.<br>";
    }

    echo "<br><a href='dashboard.php'><button type='button'>Continuar al panel</button></a>";
}
?>
