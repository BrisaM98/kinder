<?php
session_start();
if (!isset($_SESSION['id_usu'])) { header("Location: login.html"); exit(); }
$rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Panel Principal</title>
</head>
<body>
    <h1>Panel de Control (Rol: <?php echo $rol; ?>)</h1>
    
    <?php if ($rol == 'admin'): ?>
        <form action="form_usuarios.php"><button type="submit">Registrar usuario</button></form><br>
        <form action="form_personal.php"><button type="submit">Registrar personal</button></form><br>
        <form action="form_grupos.php"><button type="submit">Registrar grupo</button></form><br>
    <?php endif; ?>

    <form action="form_alumnos.php"><button type="submit">Registrar alumno</button></form><br>
    
    <hr>
    <form action="logout.php"><button type="submit">Cerrar sesion</button></form>
</body>
</html>