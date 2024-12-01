<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $codigo_mantenimiento = $_POST['codigo_mantenimiento'];
    $descripcion_mantenimiento = $_POST['descripcion_mantenimiento'];
    $fecha_mantenimiento = $_POST['fecha_mantenimiento'];
    $estado_mantenimiento = $_POST['estado_mantenimiento'];
    $responsable_mantenimiento = $_POST['responsable_mantenimiento'];
    $id_usuario = $_POST['id_usuario'];
    $codigo_inmueble = $_POST['codigo_inmueble'];

    // Validar los datos (opcional)
    if (empty($codigo_mantenimiento) || 
        empty($descripcion_mantenimiento) || 
        empty($fecha_mantenimiento) || 
        empty($estado_mantenimiento) ||
        empty($responsable_mantenimiento) ||
        empty($id_usuario) ||
        empty($codigo_inmueble)) {
        echo "Por favor, completa todos los campos.";
    } else {

        // validar si el inmueble existe
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
