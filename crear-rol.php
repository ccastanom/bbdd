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
          <form class="row g-3" action="roles/crear.php" method="POST">
            <div class="col-12">
              <label for="codigo_rol" class="form-label">Codigo del rol</label>
              <input type="number" class="form-control" id="codigo_rol" name="codigo_rol">
            </div>
            <div class="col-12">
              <label for="descripcion_rol" class="form-label">Descripcion</label>
              <input type="text" class="form-control" id="descripcion_rol" placeholder="Escribe el nombre del rol" name="descripcion_rol">
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
