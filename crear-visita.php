<!DOCTYPE html>
<html lang="es">
<?php include './componentes/head.php'?>
<body>
  <?php include './componentes/menu.php'; ?>

  <main>

     <!-- Sección para Crear Visita-->
    <section>
        <div class="d-flex justify-content-center pt-3">
          <h2>Registro de Visitantes</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="row g-3" action="visita/crear.php" method="POST">
            <div class="col-12">
              <label for="codigo_visita" class="form-label">Codigo visita</label>
              <input type="number" class="form-control" id="codigo_visita" placeholder="Escribe el codigo de visita" name="codigo_visita" required>
            </div>
            <div class="col-12">
              <label for="nombre_visita" class="form-label">Nombre visita</label>
              <input type="text" class="form-control" id="nombre_visita" placeholder="Escribe el nombre del visitante" name="nombre_visita" required>
            </div>
            <div class="col-md-12">
              <label for="fecha_visita" class="form-label">Fecha</label>
              <input type="date" class="form-control" id="fecha_visita" name="fecha_visita" required>
            </div>
            <div class="col-md-6">
              <label for="motivo_visita" class="form-label">Motivo de visita</label>
              <input type="text" class="form-control" id="motivo_visita" name="motivo_visita" required>
            </div>
            <div class="col-md-6">
              <label for="codigo_reporte" class="form-label">Codigo reporte</label>
              <input type="number" class="form-control" id="codigo_reporte" name="codigo_reporte" required>
            </div>
            <div class="col-md-6">
              <label for="codigo_inmueble" class="form-label">Codigo Inmueble</label>
              <input type="number" class="form-control" id="codigo_inmueble" name="codigo_inmueble" required>
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
