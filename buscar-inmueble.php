<!DOCTYPE html>
<html lang="es">
<?php include './componentes/head.php'?>
<body>
  <?php include './componentes/menu.php'; ?>

  <main>

     <!-- Sección para registrar Usuario-->
    <section id="form-registro-usuario">
        <div class="d-flex justify-content-center pt-3">
          <h2>Buscar inmuebles</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="d-flex" role="search" action="buscar-inmueble.php" method="GET">
            <input class="form-control me-2" type="search" placeholder="Ingresa el codigo del inmueble" name="codigo_inmueble" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
          <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Usuario</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'inmuebles/buscar.php' ?>
                </tbody>
            </table>
        </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
