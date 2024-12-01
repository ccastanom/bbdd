<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}


if (isset($_GET['codigo_mantenimiento'])) {
  try {
    $codigo_mantenimiento = intval($_GET['codigo_mantenimiento']);

    $query_key = "delete_mantenimiento";
    $query = getQuery($query_key, $queries);

    $stmt = $pdo->prepare($query);
    $data = [
      ":codigo_mantenimiento"=> $codigo_mantenimiento,
    ];

    if ($stmt->execute($data)) {
      echo "<script>alert('Registro de mantenimiento eliminado con éxito'); window.location.href='../index.php';</script>";
    } else {
      echo "<script>alert('Error al eliminar el registro de mantenimiento'); window.location.href='../index.php';</script>";
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>