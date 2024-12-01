<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}


if (isset($_GET['documento'])) {
  try {
    $id_usuario = intval($_GET['documento']);

    $query_key = "delete_user";
    $query = getQuery($query_key, $queries);

    $stmt = $pdo->prepare($query);
    $data = [
      ":id_usuario"=> $id_usuario,
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