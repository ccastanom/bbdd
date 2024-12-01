<!DOCTYPE html>
<html lang="es">
<?php include './componentes/head.php'?>
<body>
  <?php include './componentes/menu.php'; ?>

  <main>

     <!-- Sección para registrar Usuario-->
    <section>
        <div class="d-flex justify-content-center pt-3">
          <h2>Registro de Usuario</h2>
        </div>
        <div class="p-5 m-5 border">
          <form class="row g-3" action="usuarios/crear.php" method="POST">
            <div class="col-12">
              <label for="nombre_usuario" class="form-label">Nombre del usuario</label>
              <input type="text" class="form-control" id="nombre_usuario" placeholder="Escribe tu nombre" name="nombre_usuario" required>
            </div>
            <div class="col-12">
              <label for="id_usuario" class="form-label">Documento</label>
              <input type="number" class="form-control" id="id_usuario" placeholder="Escribe tu documento" name="id_usuario" required>
            </div>
            <div class="col-md-6">
              <label for="correo_usuario" class="form-label">Correo usuario</label>
              <input type="email" class="form-control" id="correo_usuario" name="correo_usuario" required>
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="col-md-6">
              <label for="direccion_usuario" class="form-label">Direccion</label>
              <input type="text" class="form-control" id="direccion_usuario" name="direccion_usuario" required>
            </div>
            <div class="col-md-4">
              <label for="codigo_rol" class="form-label">Codigo rol</label>
              <select id="codigo_rol" class="form-select" name="codigo_rol" required>
              <?php include './usuarios/listar-roles.php'; ?>
              </select>
            </div>
            <div class="col-md-2">
              <label for="telefono_usuario" class="form-label">Telefono</label>
              <input type="text" class="form-control" id="telefono_usuario" name="telefono_usuario" required>
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
