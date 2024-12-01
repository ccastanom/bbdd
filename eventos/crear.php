<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $codigo_evento = $_POST['codigo_evento'];
    $tipo_evento = $_POST['tipo_evento'];
    $descripcion_evento = $_POST['descripcion_evento'];
    $fecha_evento = $_POST['fecha_evento'];
    $recordatorio_evento = $_POST['recordatorio_evento'];
    $id_usuario = $_POST['id_usuario'];

    // Validar los datos (opcional)
    if (empty($codigo_evento) || 
        empty($tipo_evento) || 
        empty($descripcion_evento) || 
        empty($fecha_evento) ||
        empty($recordatorio_evento) ||
        empty($id_usuario)) || {
        echo "Por favor, completa todos los campos.";
    } else {

        // validar si usuario que crea el evento existe
        $query_key = "get_inmueble";
        $query = getQuery($query_key, $queries);

        $data = [
            ":codigo_inmueble" => $codigo_inmueble,
        ];

        $stm = $pdo->prepare($query);
        $stm->execute($data);

        $resultado = $stm->fetch(PDO::FETCH_ASSOC);
        
        if (empty($resultado) == false) {
            $data = [
                ":codigo_mantenimiento" => $codigo_mantenimiento,
                ":descripcion_mantenimiento" => $descripcion_mantenimiento,
                ":fecha_mantenimiento"=> $fecha_mantenimiento,
                ":estado_mantenimiento"=> $estado_mantenimiento,
                ":responsable_mantenimiento"=> $responsable_mantenimiento,
                ":id_usuario"=> $id_usuario,
                ":codigo_inmueble"=> $codigo_inmueble
            ];

            // obtener una consulta dinamica
            $query_key = "create_mantenimiento";
            $query = getQuery($query_key, $queries);

            $stm = $pdo->prepare($query);
            $stm->execute($data);
            
            echo "<script>
                alert('¡La solicitud de mantenimiento se creo con exito!');
                window.location.href = '../index.php';
            </script>";
            exit;
        } else {
            echo "<script>
                alert('¡El inmueble no existe!');
                window.location.href = '../index.php';
            </script>";
            exit;
        }
    }
} else {
    echo "Método no permitido.";
}
?>
