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
      $fila = $stm->fetch(PDO::FETCH_ASSOC);
      $nombre_usuario = $fila["nombre_usuario"];
      $id_usuario = $fila["id_usuario"];
      $direccion_usuario = $fila["direccion_usuario"];
      $telefono_usuario = $fila["telefono_usuario"];
      $correo_usuario = $fila["correo_usuario"];
      $codigo_rol = $fila["codigo_rol"];
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

     <!-- Sección para registrar Usuario-->
    <section id="form-registro-usuario">
        <div class="d-flex justify-content-center pt-3">
          <h2>Edicion de Usuario</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="row g-3" action="usuarios/guardar.php?documento=<?= htmlspecialchars($id_usuario) ?>" method="POST">
            <div class="col-12">
              <label for="nombre_usuario" class="form-label">Nombre del usuario</label>
              <input type="text" class="form-control" id="nombre_usuario" placeholder="Escribe tu nombre" name="nombre_usuario" value="<?= htmlspecialchars($nombre_usuario) ?>">
            </div>
            <div class="col-12">
              <label for="id_usuario" class="form-label">Documento</label>
              <input type="number" class="form-control" id="id_usuario" placeholder="Escribe tu documento" name="id_usuario" value="<?= htmlspecialchars($id_usuario) ?>" disabled>
            </div>
            <div class="col-md-6">
              <label for="correo_usuario" class="form-label">Correo usuario</label>
              <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" value="<?= htmlspecialchars($correo_usuario) ?>">
            </div>
            <div class="col-md-6">
              <label for="direccion_usuario" class="form-label">Direccion</label>
              <input type="text" class="form-control" id="direccion_usuario" name="direccion_usuario" value="<?= htmlspecialchars($direccion_usuario) ?>">
            </div>
            <div class="col-md-4">
              <label for="codigo_rol" class="form-label">Codigo rol</label>
              <select id="codigo_rol" class="form-select" name="codigo_rol">
              <?php 
                $query_key = "get_roles";
                $query = getQuery($query_key, $queries);
                
                $stm = $pdo->prepare($query);
                $stm->execute();
                
                while( $fila = $stm->fetch(PDO::FETCH_ASSOC)) {
                  $selected = $codigo_rol == $fila["codigo_rol"] ? 'selected' : '';
                  echo "<script>
                        console.log('$selected');
                    </script>";
                  echo "<option value='" . $fila["codigo_rol"] . "' ". $selected .">" . htmlspecialchars($fila["descripcion_rol"]) . "</option>";
                }
              ?>
              </select>
            </div>
            <div class="col-md-2">
              <label for="telefono_usuario" class="form-label">Telefono</label>
              <input type="text" class="form-control" id="telefono_usuario" name="telefono_usuario" value="<?= htmlspecialchars($telefono_usuario) ?>">
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
