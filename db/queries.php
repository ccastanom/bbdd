<?php
return [
    "create_user" => "INSERT INTO usuario (id_usuario, nombre_usuario, password, correo_usuario, telefono_usuario, direccion_usuario, codigo_rol) VALUES (:id_usuario, :nombre_usuario, :password, :correo_usuario, :telefono_usuario, :direccion_usuario, :codigo_rol)",
    "get_user" => "SELECT descripcion_rol, nombre_usuario, u.codigo_rol as codigo_rol, id_usuario, correo_usuario, telefono_usuario, direccion_usuario  FROM usuario u INNER JOIN rol r ON r.codigo_rol = u.codigo_rol WHERE id_usuario = :id_usuario",
    "get_users" => "SELECT descripcion_rol, nombre_usuario, u.codigo_rol as codigo_rol, id_usuario, correo_usuario, telefono_usuario, direccion_usuario  FROM usuario u INNER JOIN rol r ON r.codigo_rol = u.codigo_rol",
    "update_user" => "UPDATE usuario SET nombre_usuario = :nombre_usuario, correo_usuario = :correo_usuario, telefono_usuario = :telefono_usuario, direccion_usuario = :direccion_usuario, codigo_rol = :codigo_rol WHERE id_usuario = :id_usuario",
    "delete_user" => "DELETE FROM usuario WHERE id_usuario = :id_usuario",
    "create_rol" => "INSERT INTO rol (codigo_rol, descripcion_rol) VALUES (:codigo_rol, :descripcion_rol)",
    "update_rol" => "UPDATE rol SET descripcion_rol = :descripcion_rol WHERE codigo_rol = :codigo_rol",
    "get_rol" => "SELECT * FROM rol WHERE codigo_rol = :codigo_rol",
    "get_roles" => "SELECT * FROM rol",
    "delete_rol" => "DELETE FROM rol WHERE codigo_rol = :codigo_rol",
    "get_inmueble" => "SELECT * FROM inmueble WHERE codigo_inmueble = :codigo_inmueble",
    "get_inmuebles" => "SELECT * FROM inmueble",
    "create_inmueble" => "INSERT INTO inmueble (id_usuario, codigo_inmueble, descripcion_inmueble, estado_inmueble) VALUES (:id_usuario, :codigo_inmueble, :descripcion_inmueble, :estado_inmueble)",
    "update_inmueble" => "UPDATE inmueble SET id_usuario = :id_usuario, codigo_inmueble = :codigo_inmueble, descripcion_inmueble = :descripcion_inmueble, estado_inmueble = :estado_inmueble WHERE codigo_inmueble = :codigo_inmueble",
    "delete_inmueble" => "DELETE FROM inmueble WHERE codigo_inmueble = :codigo_inmueble"
]
?>