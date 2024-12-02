<?php
$queries = include './db/queries.php';
$pdo = include './db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if (isset($_GET['codigo_visita']) && $_GET['codigo_visita'] !== '') {
  try {
    // Búsqueda
    $codigo_visita = $_GET['codigo_visita'];
    $data = [
      ":codigo_visita" => $codigo_visita,
    ];
    $query_key = "get_visita";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute($data);

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['codigo_visita']) . "</td>
          <td>" . htmlspecialchars($fila['nombre_visita']) . "</td>
          <td>" . htmlspecialchars($fila['fecha_visita']) . "</td>
          <td>" . htmlspecialchars($fila['motivo_visita']) . "</td>
          <td>" . htmlspecialchars($fila['codigo_reporte']) . "</td>
          <td>" . htmlspecialchars($fila['codigo_inmueble']) . "</td>
          <td class='d-flex justify-content-center'>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='7' class='text-center'>No se encontraron resultados.</td></tr>";
    }
  } catch (PDOException $e) {
    echo "<tr><td colspan='7' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
  }
} else {
  try {
    $query_key = "get_visitas";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute();

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['codigo_visita']) . "</td>
          <td>" . htmlspecialchars($fila['nombre_visita']) . "</td>
          <td>" . htmlspecialchars($fila['fecha_visita']) . "</td>
          <td>" . htmlspecialchars($fila['motivo_visita']) . "</td>
          <td>" . htmlspecialchars($fila['codigo_reporte']) . "</td>
          <td>" . htmlspecialchars($fila['codigo_inmueble']) . "</td>
          <td class='d-flex justify-content-center'>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='7' class='text-center'>No se encontraron resultados.</td></tr>";
    }
  } catch (PDOException $e) {
    echo "<tr><td colspan='7' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
  }
}
?>