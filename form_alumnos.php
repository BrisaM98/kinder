<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de Alumnos</title>
</head>
<body>
    <h2>Registrar alumno</h2>
    <form action="guardar_alumno.php" method="POST">
        Grupo: 
        <select name="id_gpo" required>
            <option value="">-- Selecciona --</option>
            <?php
            $consulta = $conn->query("SELECT id_gpo, grupo_gpo FROM grupo");
            while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='".$row['id_gpo']."'>".$row['grupo_gpo']."</option>";
            }
            ?>
        </select><br>
        <br>
        Nombre: <input type="text" name="nombre_alu" required><br>
        <br>
        Apellidos: <input type="text" name="apellidos_alu" required><br>
        <br>
        <button type="submit">Guardar alumno</button>
    </form>
    <br>
    <a href="dashboard.php">Volver al inicio</a>
</body>
</html>