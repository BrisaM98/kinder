<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de Personal</title>
</head>
<body>
    <h2>Registrar datos de personal</h2>
    <form action="guardar_personal.php" method="POST">
        Usuario: 
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
        Nombre: <input type="text" name="maestra_per" required><br>
        <br>
        Correo: <input type="email" name="correo_per" required><br>
        <br>
        Telefono: <input type="tel" name="cel_per" required><br>
        <br>
        <button type="submit">Guardar personal</button>
    </form>
    <br>
    <a href="dashboard.php">Volver al inicio</a>
</body>
</html>