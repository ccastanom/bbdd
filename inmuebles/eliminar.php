<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}


if (isset($_GET['codigo_inmueble'])) {
  try {
    $codigo_inmueble = intval($_GET['codigo_inmueble']);

    $query_key = "delete_inmueble";
    $query = getQuery($query_key, $queries);

    $stmt = $pdo->prepare($query);
    $data = [
      ":codigo_inmueble"=> $codigo_inmueble,
    ];

    if ($stmt->execute($data)) {
      echo "<script>alert('Registro eliminado con éxito'); window.location.href='../index.php';</script>";
    } else {
      echo "<script>alert('Error al eliminar el registro'); window.location.href='../index.php';</script>";
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
}
?>