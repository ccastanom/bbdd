<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}


if (isset($_GET['codigo_evento'])) {
  try {
    $codigo_evento = intval($_GET['codigo_evento']);

    $query_key = "delete_evento";
    $query = getQuery($query_key, $queries);

    $stmt = $pdo->prepare($query);
    $data = [
      ":codigo_evento"=> $codigo_evento,
    ];

    if ($stmt->execute($data)) {
      echo "<script>alert('Registro de evento eliminado con éxito'); window.location.href='../index.php';</script>";
    } else {
      echo "<script>alert('Error al eliminar el registro de evento'); window.location.href='../index.php';</script>";
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>