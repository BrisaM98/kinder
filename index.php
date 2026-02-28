<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de Personal</title>
</head>
<body>
    <h2>Registrar Maestra</h2>

    <form action="guardar.php" method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="maestra" required><br><br>

        <label>Correo:</label><br>
        <input type="email" name="correo" required><br><br>

        <label>Celular:</label><br>
        <input type="tel" name="cel" required><br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>