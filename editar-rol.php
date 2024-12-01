<?php
$queries = include './db/queries.php';
$pdo = include './db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

$query_key = "get_rol";
$query = getQuery($query_key, $queries);

$stm = $pdo->prepare($query);

if (isset($_GET['codigo_rol']) && $_GET['codigo_rol'] !== '') {
  try {
    // Búsqueda
    $codigo_rol = $_GET['codigo_rol'];
    $data = [
      ":codigo_rol" => $codigo_rol,
    ];
    $stm->execute($data);

    // Mostrar resultados
    if ($stm->rowCount() > 0) {
      $fila = $stm->fetch(PDO::FETCH_ASSOC);
      $codigo_rol = $fila["codigo_rol"];
      $descripcion_rol = $fila["descripcion_rol"];
    } else {
      header("Location: 404.php");
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
} else {
    header("Location: 404.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<?php include './componentes/head.php'?>
<body>
  <?php include './componentes/menu.php'; ?>
  <main>

     <!-- Sección para registrar roles-->
     <section id="form-registro-usuario">
        <div class="d-flex justify-content-center pt-3">
          <h2>Registro de Roles</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="row g-3" action="roles/guardar.php" method="POST">
            <div class="col-12">
              <label for="codigo_rol" class="form-label">Codigo del rol</label>
              <input type="number" class="form-control" id="codigo_rol" name="codigo_rol" required value="<?= htmlspecialchars($codigo_rol)?>">
            </div>
            <div class="col-12">
              <label for="descripcion_rol" class="form-label">Descripcion</label>
              <input type="text" class="form-control" id="descripcion_rol" placeholder="Escribe el nombre del rol" name="descripcion_rol" required value="<?= htmlspecialchars($descripcion_rol)?>">
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
