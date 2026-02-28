<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de Grupos</title>
</head>
<body>
    <h2>Crear nuevo grupo</h2>
    <form action="guardar_grupo.php" method="POST">
        Responsable: 
        <select name="id_usu" required>
            <option value="">-- Selecciona --</option>
            <?php
            $consulta = $conn->query("SELECT id_usu, usuario_usu FROM usuarios WHERE rol != 'admin'");
            while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='".$row['id_usu']."'>".$row['usuario_usu']."</option>";
            }
            ?>
        </select><br>
        <br>
        Grupo: <input type="text" name="grupo_gpo" required><br>
        <br>
        <button type="submit">Crear grupo</button>
    </form>
    <br>
    <a href="dashboard.php">Volver al inicio</a>
</body>
</html>