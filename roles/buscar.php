<?php
$queries = include './db/queries.php';
$pdo = include './db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if (isset($_GET['codigo_rol']) && $_GET['codigo_rol'] !== '') {
  try {
    // Búsqueda
    $codigo_rol = $_GET['codigo_rol'];
    $data = [
      ":codigo_rol" => $codigo_rol,
    ];
    $query_key = "get_rol";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute($data);

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['codigo_rol']) . "</td>
          <td>" . htmlspecialchars($fila['descripcion_rol']) . "</td>
          <td class='d-flex justify-content-center'>
              <a href='editar-rol.php?codigo_rol={$fila['codigo_rol']}' class='btn btn-warning btn-sm' style='margin-right: 8px'><i class='fas fa-pen'></i></a>
              <a href='./roles/eliminar.php?codigo_rol={$fila['codigo_rol']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'><i class='fas fa-trash'></i></a>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='3' class='text-center'>No se encontraron resultados.</td></tr>";
    }
  } catch (PDOException $e) {
    echo "<tr><td colspan='3' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
  }
} else {
  try {
    $query_key = "get_roles";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute();

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['codigo_rol']) . "</td>
          <td>" . htmlspecialchars($fila['descripcion_rol']) . "</td>
          <td class='d-flex justify-content-center'>
              <a href='editar-rol.php?codigo_rol={$fila['codigo_rol']}' class='btn btn-warning btn-sm' style='margin-right: 8px'><i class='fas fa-pen'></i></a>
              <a href='./roles/eliminar.php?codigo_rol={$fila['codigo_rol']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'><i class='fas fa-trash'></i></a>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='3' class='text-center'>No se encontraron resultados.</td></tr>";
    }
  } catch (PDOException $e) {
    echo "<tr><td colspan='3' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
  }
}
?>