<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $id_usuario = $_POST['id_usuario'];
    $estado_inmueble = $_POST['estado_inmueble'];
    $descripcion_inmueble = $_POST['descripcion_inmueble'];
    $codigo_inmueble = $_POST['codigo_inmueble'];

    // Validar los datos (opcional)
    if (empty($estado_inmueble) || 
        empty($codigo_inmueble) || 
        empty($descripcion_inmueble) || 
        empty($id_usuario)) {
        echo "Por favor, completa todos los campos.";
    } else  {
        // validar si el usuario existe
        $query_key = "get_user";
        $query = getQuery($query_key, $queries);

        $data = [
            ":id_usuario" => $id_usuario,
        ];

        $stm = $pdo->prepare($query);
        $stm->execute($data);

        $usuario = $stm->fetch(PDO::FETCH_ASSOC);
        
        if (empty($usuario) == false) {
            // validar si el usuario existe
            $query_key = "get_inmueble";
            $query = getQuery($query_key, $queries);

            $data = [
                ":codigo_inmueble" => $codigo_inmueble,
            ];

            $stm = $pdo->prepare($query);
            $stm->execute($data);

            $inmueble = $stm->fetch(PDO::FETCH_ASSOC);
            if(empty($inmueble)) {
                $data = [
                    ":descripcion_inmueble" => $descripcion_inmueble,
                    ":estado_inmueble" => $estado_inmueble,
                    ":codigo_inmueble" => $codigo_inmueble,
                    ":id_usuario"=> $id_usuario
                ];
                
                // obtener una consulta dinamica
                $query_key = "create_inmueble";
                $query = getQuery($query_key, $queries);
                
                $stm = $pdo->prepare($query);
                $stm->execute($data);
                
                echo "<script>
                alert('¡El inmueble se creo con exito!');
                window.location.href = '../index.php';
                </script>";
                exit;
            } else {
                echo "<script>
                alert('¡El inmueble ya existe!');
                window.location.href = '../crear-inmueble.php';
                </script>";
            exit;
            }
        } else {
            echo "<script>
                alert('¡El usuario no existe!');
                window.location.href = '../crear-inmueble.php';
            </script>";
            exit;
        }
    }
} else {
    echo "Método no permitido.";
}
?>
