<!DOCTYPE html>
<html lang="es">
<?php include './componentes/head.php'?>
<body>
  <?php include './componentes/menu.php'; ?>

  <main>

     <!-- Sección para buscar Mantenimiento-->
    <section>
        <div class="d-flex justify-content-center pt-3">
          <h2>Buscar Evento</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="d-flex" role="search" action="buscar-evento.php" method="GET">
            <input class="form-control me-2" type="search" placeholder="Ingresa el codigo de mantenimiento" name="codigo_evento" aria-label="Search">
            <input class="form-control me-2" type="date" name="fecha_inicio" aria-label="Search" value="<?= isset($_GET['fecha_inicio']) ? $_GET['fecha_inicio'] : null ?>" >
            <input class="form-control me-2" type="date" name="fecha_final" aria-label="Search" value="<?= isset($_GET['fecha_final']) ? $_GET['fecha_final'] : null ?>" >
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
          <div class="card mt-3">
            <div id="total_records" class="card-body d-flex justify-content-center">
              Registros listados
            </div>
          </div>
          <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Tipo</th>
                        <th>Descripcion</th>
                        <th>Fecha</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'eventos/buscar.php' ?>
                </tbody>
            </table>
          </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
