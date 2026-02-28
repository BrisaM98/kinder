<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registrar Usuarios</title>
</head>
<body>
    <h2>Crear cuenta de docente</h2>
    <form action="guardar_usuario.php" method="POST">
        Usuario: <input type="text" name="usuario_usu" required><br>
        <br>
        Contraseña: <input type="password" name="password_usu" required><br>
        <br>
        <input type="hidden" name="rol" value="docente"> 
        <button type="submit">Crear maestro</button>
    </form>
    <br>
    <a href="dashboard.php">Volver al inicio</a>
</body>
</html>