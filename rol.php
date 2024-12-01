<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plataforma de Gestión Residencial</title>
  <link rel="stylesheet" href="./css/styles.css" />
</head>
<body>
  <header>
    <div class="logo-container">
      <img src="images/logo.png" alt="Logo Residencial" class="logo" />
      <h1>Plataforma de Gestión Residencial</h1>
    </div>
    <nav>
      <a href="usuario.php">Usuarios</a>
      <a href="inmueble.php">Inmuebles</a>
      <a href="pago.php">Pagos</a>
      <a href="reserva.php">Reservas</a>
      <a href="mensaje.php">Chat</a>
      <a href="evento.php">Eventos</a>
      <a href="documento.php">Documentos</a>
      <a href="mantenimiento.php">Mantenimiento</a>
      <a href="permiso.php">Permisos</a>
      <a href="reporte.php">Reportes</a>
      <a href="rol.php" class="selected">Roles</a>
      <a href="visita.php">Visitas</a>
    </nav>
  </header>

  <main>

     <!-- Sección para registrar Usuario-->
    <section id="form-rol" class="form-section">
        <h2>Registro de roles</h2>
        <form action="roles/crear.php" method="POST" style="display: flex; flex-direction: column">
            <label for="codigo_rol">Código Rol:</label>
            <input type="number" id="codigo_rol" name="codigo_rol" required />
        
            <label for="descripcion_rol">Descipcion del rol:</label>
            <input type="text" id="description_rol" name="descripcion_rol" required />
        
            <button type="submit" style="width: 100%">Registrar Usuario</button>
        </form>
    </section>

</body>
</html>
