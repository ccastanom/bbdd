<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $id_usuario = $_GET['documento'];
    $correo_usuario = $_POST['correo_usuario'];
    $direccion_usuario = $_POST['direccion_usuario'];
    $telefono_usuario = $_POST['telefono_usuario'];
    $codigo_rol = $_POST['codigo_rol'];
    $nombre_usuario = $_POST['nombre_usuario'];

    // Validar los datos (opcional)
    if (empty($nombre_usuario) || 
        empty($correo_usuario) || 
        empty($direccion_usuario) ||
        empty($codigo_rol) ||
        empty($telefono_usuario) ||
        empty($id_usuario)) {
        echo "Por favor, completa todos los campos.";
    } else {

        $query_key = "get_user";
        $query = getQuery($query_key, $queries);

        $data = [
            ":id_usuario" => $id_usuario,
        ];

        $stm = $pdo->prepare($query);
        $stm->execute($data);

        $resultado = $stm->fetch(PDO::FETCH_ASSOC);
        
        if (empty($resultado) == false) {
            $data = [
                ":nombre_usuario" => $nombre_usuario,
                ":correo_usuario" => $correo_usuario,
                ":direccion_usuario"=> $direccion_usuario,
                ":telefono_usuario"=> $telefono_usuario,
                ":codigo_rol"=> $codigo_rol,
                ":id_usuario"=> $id_usuario
            ];

            // obtener una consulta dinamica
            $query_key = "update_user";
            $query = getQuery($query_key, $queries);

            $stm = $pdo->prepare($query);
            $stm->execute($data);
            
            echo "<script>
                alert('¡El usuario se edito con exito!');
                window.location.href = '../buscar-usuario.php';
            </script>";
            exit;
        } else {
            echo "<script>
                alert('¡El usuario no existe!');
                window.location.href = '../buscar-usuario.php';
            </script>";
            exit;
        }
    }
} else {
    echo "Método no permitido.";
}
?>
