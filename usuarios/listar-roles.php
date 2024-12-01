<?php 
$queries = include './db/queries.php';
$pdo = include './db/conexion.php';

function getQuery($key, $queries) {
  return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

$query_key = "get_roles";
$query = getQuery($query_key, $queries);

$stm = $pdo->prepare($query);
$stm->execute();

while( $fila = $stm->fetch(PDO::FETCH_ASSOC)) {
  echo "<option value='" . $fila["codigo_rol"] . "'>" . htmlspecialchars($fila["descripcion_rol"]) . "</option>";
}
?>