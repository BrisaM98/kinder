<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // datos del alumnbo
    $id_gpo = $_POST['id_gpo'];
    $nombre = $_POST['nombre_alu'];
    $apellidos = $_POST['apellidos_alu'];

    // verificar el grupo
    $checkGrupo = $conn->prepare("SELECT id_gpo FROM grupo WHERE id_gpo = ?");
    $checkGrupo->execute([$id_gpo]);

    if ($checkGrupo->rowCount() > 0) {
        // el grupo existe
        $stmt = $conn->prepare("INSERT INTO alumnos (id_gpo, nombre_alu, apellidos_alu) VALUES (?, ?, ?)");
        
        if ($stmt->execute([$id_gpo, $nombre, $apellidos])) {
            echo "Alumno guardado correctamente.<br>";
            echo "<a href='dashboard.php'>Volver al panel de control</a>";
        } else {
            echo "Error al registrar el alumno.";
        }
    } else {
        // si el grupo no existe
        echo "Error: El grupo seleccionado no es valido.<br>";
        echo "<a href='form_alumnos.php'>Intentar de nuevo</a>";
    }
}
?>
