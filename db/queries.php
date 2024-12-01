<?php
return [
    "create_user" => "INSERT INTO usuario (id_usuario, nombre_usuario, password, correo_usuario, telefono_usuario, direccion_usuario, codigo_rol) VALUES (:id_usuario, :nombre_usuario, :password, :correo_usuario, :telefono_usuario, :direccion_usuario, :codigo_rol)",
    "get_user" => "SELECT descripcion_rol, nombre_usuario, id_usuario, correo_usuario, telefono_usuario, direccion_usuario  FROM usuario u INNER JOIN rol r ON r.codigo_rol = u.codigo_rol WHERE id_usuario = :id_usuario",
    "get_users" => "SELECT * FROM usuario",
    "update_user" => "UPDATE usuario SET nombre_usuario = :nombre_usuario, password = :password, correo_usuario = :correo_usuario, telefono_usuario = :telefono_usuario, direccion_usuario = :direccion_usuario, codigo_rol = :codigo_rol WHERE id_usuario = :id_usuario",
    "delete_user" => "DELETE usuario WHERE id_usuario = :id_usuario",
    "create_rol" => "INSERT INTO rol (codigo_rol, descripcion_rol) VALUES (:codigo_rol, :descripcion_rol)",
    "get_rol" => "SELECT * FROM rol WHERE codigo_rol = :codigo_rol",
    "get_roles" => "SELECT * FROM rol"
]
?>