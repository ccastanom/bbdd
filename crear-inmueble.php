<!DOCTYPE html>
<html lang="es">
<?php include './componentes/head.php'?>
<body>
  <?php include './componentes/menu.php'; ?>

  <main>

     <!-- Sección para registrar inmuebles-->
    <section>
        <div class="d-flex justify-content-center pt-3">
          <h2>Registro de Inmuebles</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="row g-3" action="inmuebles/crear.php" method="POST">
            <div class="col-12">
              <label for="codigo_inmueble" class="form-label">Codigo del inmueble</label>
              <input type="number" class="form-control" id="codigo_inmueble" placeholder="Escribe el codigo del inmueble" name="codigo_inmueble" required>
            </div>
            <div class="col-12">
              <label for="id_usuario" class="form-label">Documento del usuario</label>
              <input type="number" class="form-control" id="id_usuario" placeholder="Escribe tu documento" name="id_usuario" required>
            </div>
            <div class="col-md-6">
              <label for="descripcion_inmueble" class="form-label">Descripcion del inmueble</label>
              <input type="text" class="form-control" id="descripcion_inmueble" name="descripcion_inmueble" required>
            </div>
            <div class="col-md-6">
              <label for="estado_inmueble" class="form-label">Estado del inmueble</label>
              <input type="text" class="form-control" id="estado_inmueble" name="estado_inmueble">
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
