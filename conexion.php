<?php
$host     = "sql306.infinityfree.com"; 
$db_name  = "if0_41161012_kinder";     
$username = "if0_41161012";          
$password = "ufLGscSGdRzmMF";   

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>