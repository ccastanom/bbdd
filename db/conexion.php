<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "condominios";
// Crear conexión
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;
?>
