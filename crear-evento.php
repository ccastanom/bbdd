<!DOCTYPE html>
<html lang="es">
<?php include './componentes/head.php'?>
<body>
  <?php include './componentes/menu.php'; ?>

  <main>

     <!-- Sección para crear un usuario-->
    <section>
        <div class="d-flex justify-content-center pt-3">
          <h2>Registro de evento</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="row g-3" action="eventos/crear.php" method="POST">
            <div class="col-12">
              <label for="codigo_evento" class="form-label">Codigo del evento</label>
              <input type="number" class="form-control" id="codigo_evento" placeholder="Escribe el codigo del evento" name="codigo_evento" required>
            </div>
            <div class="col-12">
              <label for="tipo_evento" class="form-label">Tipo evento</label>
              <input type="text" class="form-control" id="tipo_evento" placeholder="Escribe el tipo de evento" name="tipo_evento" required>
            </div>
            <div class="col-md-6">
              <label for="descripcion_evento" class="form-label">Descripcion evento</label>
              <input type="texto" class="form-control" id="descripcion_evento" name="descripcion_evento" required>
            </div>
            <div class="col-md-6">
              <label for="fecha_evento" class="form-label">Fecha evento</label>
              <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required>
            </div>
            <div class="col-md-6">
              <label for="id_usuario" class="form-label">Documento usuario</label>
              <input type="number" class="form-control" id="id_usuario" name="id_usuario" required>
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
