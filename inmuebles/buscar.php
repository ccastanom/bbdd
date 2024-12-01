<?php
$queries = include './db/queries.php';
$pdo = include './db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if (isset($_GET['codigo_inmueble']) && $_GET['codigo_inmueble'] !== '') {
  try {
    // Búsqueda
    $codigo_inmueble = $_GET['codigo_inmueble'];
    $data = [
      ":codigo_inmueble" => $codigo_inmueble,
    ];
    $query_key = "get_inmueble";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute($data);

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['codigo_inmueble']) . "</td>
          <td>" . htmlspecialchars($fila['id_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['descripcion_inmueble']) . "</td>
          <td>" . htmlspecialchars($fila['estado_inmueble']) . "</td>
          <td class='d-flex justify-content-center'>
              <a href='editar-inmueble.php?documento={$fila['codigo_inmueble']}' class='btn btn-warning btn-sm' style='margin-right: 8px'><i class='fas fa-pen'></i></a>
              <a href='./inmuebles/eliminar.php?documento={$fila['codigo_inmueble']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'><i class='fas fa-trash'></i></a>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='5' class='text-center'>No se encontraron resultados.</td></tr>";
    }
  } catch (PDOException $e) {
    echo "<tr><td colspan='5' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
  }
} else {
  try {
    $query_key = "get_inmuebles";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute();

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['codigo_inmueble']) . "</td>
          <td>" . htmlspecialchars($fila['id_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['descripcion_inmueble']) . "</td>
          <td>" . htmlspecialchars($fila['estado_inmueble']) . "</td>
          <td class='d-flex justify-content-center'>
              <a href='editar-inmueble.php?codigo_inmueble={$fila['codigo_inmueble']}' class='btn btn-warning btn-sm' style='margin-right: 8px'><i class='fas fa-pen'></i></a>
              <a href='./inmuebles/eliminar.php?codigo_inmueble={$fila['codigo_inmueble']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'><i class='fas fa-trash'></i></a>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='5' class='text-center'>No se encontraron resultados.</td></tr>";
    }
  } catch (PDOException $e) {
    echo "<tr><td colspan='5' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
  }
}
?>