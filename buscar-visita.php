<!DOCTYPE html>
<html lang="es">
<?php include './componentes/head.php'?>
<body>
  <?php include './componentes/menu.php'; ?>

  <main>

     <!-- Sección para buscar Visitante-->
    <section>
        <div class="d-flex justify-content-center pt-3">
          <h2>Buscar Visitante</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="d-flex" role="search" action="buscar-visitante.php" method="GET">
            <input class="form-control me-2" type="search" placeholder="Ingresa el codigo de visita" name="codigo_visita" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
          <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Motivo</th>
                        <th>Cod_Reporte</th>
                        <th>Cod_Inmueble</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'visitas/buscar.php' ?>
                </tbody>
            </table>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>