<?php
$queries = include './db/queries.php';
$pdo = include './db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if (isset($_GET['documento']) && $_GET['documento'] !== '') {
  try {
    // Búsqueda
    $id_usuario = $_GET['documento'];
    $data = [
      ":id_usuario" => $id_usuario,
    ];
    $query_key = "get_user";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute($data);

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>{$fila['id_usuario']}</td>
          <td>" . htmlspecialchars($fila['nombre_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['correo_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['telefono_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['direccion_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['descripcion_rol']) . "</td>
          <td class='d-flex justify-content-center'>
              <a href='editar-usuario.php?documento={$fila['id_usuario']}' class='btn btn-warning btn-sm' style='margin-right: 8px'><i class='fas fa-pen'></i></a>
              <a href='./usuarios/eliminar.php?documento={$fila['id_usuario']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'><i class='fas fa-trash'></i></a>
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
    $query_key = "get_users";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute();

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['id_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['nombre_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['correo_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['telefono_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['direccion_usuario']) . "</td>
          <td>" . htmlspecialchars($fila['descripcion_rol']) . "</td>
          <td class='d-flex justify-content-center'>
              <a href='editar-usuario.php?documento={$fila['id_usuario']}' class='btn btn-warning btn-sm' style='margin-right: 8px'><i class='fas fa-pen'></i></a>
              <a href='./usuarios/eliminar.php?documento={$fila['id_usuario']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'><i class='fas fa-trash'></i></a>
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