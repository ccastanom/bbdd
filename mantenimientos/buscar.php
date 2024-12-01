<?php
$queries = include './db/queries.php';
$pdo = include './db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if (isset($_GET['codigo_mantenimiento']) && $_GET['codigo_mantenimiento'] !== '') {
  try {
    // Búsqueda
    $codigo_mantenimiento = $_GET['codigo_mantenimiento'];
    $data = [
      ":codigo_mantenimiento" => $codigo_mantenimiento,
    ];
    $query_key = "get_mantenimiento";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute($data);

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['codigo_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['descripcion_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['fecha_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['estado_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['responsable_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['id_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['codigo_inmueble']) . "</td>
          <td class='d-flex justify-content-center'>
            <a href='./mantenimientos/eliminar.php?codigo_mantenimiento={$fila['codigo_mantenimiento']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar esta solicitud?\")'><i class='fas fa-trash'></i></a>
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
    $query_key = "get_mantenimientos";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute();

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['codigo_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['descripcion_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['fecha_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['estado_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['responsable_mantenimiento']) . "</td>
          <td>" . htmlspecialchars($fila['id_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['codigo_inmueble']) . "</td>
          <td class='d-flex justify-content-center'>
              <a href='editar-mantenimiento.php?codigo_mantenimiento={$fila['codigo_mantenimiento']}' class='btn btn-warning btn-sm' style='margin-right: 8px'><i class='fas fa-pen'></i></a>
              <a href='./mantenimientos/eliminar.php?codigo_mantenimiento={$fila['codigo_mantenimiento']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar esta solicitud?\")'><i class='fas fa-trash'></i></a>
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