<?php
$queries = include './db/queries.php';
$pdo = include './db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

$query_key = "get_user";
$query = getQuery($query_key, $queries);

$stm = $pdo->prepare($query);

if (isset($_GET['documento']) && $_GET['documento'] !== '') {
  try {
    // Búsqueda
    $id_usuario = $_GET['documento'];
    $data = [
      ":id_usuario" => $id_usuario,
    ];
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
              <a href='editar.php?id={$fila['id_usuario']}' class='btn btn-warning btn-sm' style='margin-right: 8px'><i class='fas fa-pen'></i></a>
              <a href='eliminar.php?id={$fila['id_usuario']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar este registro?\")'><i class='fas fa-trash'></i></a>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='4' class='text-center'>No se encontraron resultados.</td></tr>";
    }
  } catch (PDOException $e) {
    echo "<tr><td colspan='4' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
  }
} else {
  echo "<tr><td colspan='4' class='text-center'>Escribe algo para buscar.</td></tr>";
}
?>