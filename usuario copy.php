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
      <a href="usuario.php" class="selected">Usuarios</a>
      <a href="#form-registro-inmueble">Inmuebles</a>
      <a href="#form-pago">Pagos</a>
      <a href="#form-reserva">Reservas</a>
      <a href="#form-mensaje">Chat</a>
      <a href="#form-evento">Eventos</a>
      <a href="#form-documento">Documentos</a>
      <a href="#form-mantenimiento">Mantenimiento</a>
      <a href="#form-permiso">Permisos</a>
      <a href="#form-reporte">Reportes</a>
      <a href="#form-rol">Roles</a>
      <a href="#form-visita">Visitas</a>

    </nav>
  </header>

  <main>

     <!-- Sección para registrar Usuario-->
    <section id="form-registro-usuario" class="form-section">
        <h2>Registro de Usuario</h2>
        <form action="usuarios/crear.php" method="POST" style="display: flex; flex-direction: column">
            <label for="id_usuario">Código Usuario:</label>
            <input type="number" id="id_usuario" name="id_usuario" required />
        
            <label for="nombre_usuario">Nombre del Usuario:</label>
            <input type="text" id="nombre_usuario" name="nombre_usuario" required />

            <label for="telefono_usuario">Telefono del Usuario:</label>
            <input type="number" id="telefono_usuario" name="telefono_usuario" required />
        
            <label for="correo_usuario">Email:</label>
            <input type="email" id="correo_usuario" name="correo_usuario" required />

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required />

            <label for="direccion_usuario">Direccion:</label>
            <input type="direccion_usuario" id="direccion_usuario" name="direccion_usuario" required />
        
            <label for="codigo_rol">Rol:</label>
            <select id="codigo_rol" name="codigo_rol" required>
                <option value="1">Administrador</option>
                <option value="2">Residente</option>
            </select>
        
            <button type="submit" style="width: 100%">Registrar Usuario</button>
        </form>
    </section>

</body>
</html>
