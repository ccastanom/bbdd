<!DOCTYPE html>
<html lang="es">
<?php include './componentes/head.php'?>
<body>
  <?php include './componentes/menu.php'; ?>

  <main>

     <!-- Sección para Crear Mantenimiento-->
    <section>
        <div class="d-flex justify-content-center pt-3">
          <h2>Registro de Mantenimiento</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="row g-3" action="mantenimiento/crear.php" method="POST">
            <div class="col-12">
              <label for="codigo_mantenimiento" class="form-label">Codigo Mantenimiento</label>
              <input type="number" class="form-control" id="codigo_mantenimiento" placeholder="Escribe el codigo de mantenimiento" name="codigo_mantenimiento" required>
            </div>
            <div class="col-12">
              <label for="descripcion_mantenimiento" class="form-label">Descripcion</label>
              <input type="text" class="form-control" id="descripcion_mantenimiento" placeholder="Detalla el tipo de mantenimiento" name="descripcion_mantenimiento" required>
            </div>
            <div class="col-md-12">
              <label for="id_usuario" class="form-label">Documento</label>
              <input type="number" class="form-control" id="id_usuario" name="id_usuario" required>
            </div>
            <div class="col-md-6">
              <label for="fecha_mantenimiento" class="form-label">Fecha</label>
              <input type="date" class="form-control" id="fecha_mantenimiento" name="fecha_mantenimiento" required>
            </div>
            <div class="col-md-6">
              <label for="estado_mantenimiento" class="form-label">Estado</label>
              <input type="text" class="form-control" id="estado_mantenimiento" name="estado_mantenimiento" required>
            </div>
            <div class="col-md-6">
              <label for="responsable_mantenimiento" class="form-label">Responsable</label>
              <input type="text" class="form-control" id="responsable_mantenimiento" name="responsable_mantenimiento" required>
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
