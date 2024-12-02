<?php
$queries = include './db/queries.php';
$pdo = include './db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

function mostrarEventos($stm) {
    // Mostrar resultados
    if ($stm->rowCount() > 0) {
        $total = $stm->rowCount();
        echo "<script>
            document.getElementById('total_records').textContent = 'Se econtraron: $total registros'    
        </script>";
      while ($fila = $stm->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
          <td>" . htmlspecialchars($fila['codigo_evento']) . "</td>
          <td>" . htmlspecialchars($fila['tipo_evento']) . "</td>
          <td>" . htmlspecialchars($fila['descripcion_evento']) . "</td>
          <td>" . htmlspecialchars($fila['fecha_evento']) . "</td>
          <td>" . htmlspecialchars($fila['id_usuario']) . "</td>
          <td class='d-flex justify-content-center'>
            <a href='./eventos/eliminar.php?codigo_evento={$fila['codigo_evento']}' class='btn btn-danger btn-sm' onclick='return confirm(\"¿Estás seguro de eliminar esta solicitud?\")'><i class='fas fa-trash'></i></a>
          </td>
        </tr>";
      }
    } else {
      echo "<tr><td colspan='7' class='text-center'>No se encontraron resultados.</td></tr>";
    }
}

if (isset($_GET['codigo_evento']) && $_GET['codigo_evento'] !== '') {
  try {
    // Búsqueda
    $codigo_evento = $_GET['codigo_evento'];
    $data = [
      ":codigo_evento" => $codigo_evento,
    ];
    $query_key = "get_evento";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute($data);

    // Mostrar resultados
    mostrarEventos($stm);
  } catch (PDOException $e) {
    echo "<tr><td colspan='7' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
  }
} else if((isset($_GET['fecha_inicio']) && $_GET['fecha_inicio'] !== '') || (isset($_GET['fecha_final']) && $_GET['fecha_final'] !== '')) {
    $fecha_inicio = $_GET['fecha_inicio'] ? $_GET['fecha_inicio'] : '2024-01-01';
    $fecha_final = $_GET['fecha_final'] ? $_GET['fecha_final'] : '2025-12-31';

    $query_key = "get_eventos_por_fechas";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $data = [
      ":fecha_inicio" => $fecha_inicio,
      ":fecha_final" => $fecha_final,
    ];
    $stm->execute($data);

    mostrarEventos($stm);
} else {
  try {
    $query_key = "get_eventos";
    $query = getQuery($query_key, $queries);
    $stm = $pdo->prepare($query);
    $stm->execute();

    // Mostrar resultados
    mostrarEventos($stm);
  } catch (PDOException $e) {
    echo "<tr><td colspan='7' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
  }
}
?>