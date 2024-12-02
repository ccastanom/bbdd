<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $codigo_visita = $_POST['codigo_visita'];
    $nombre_visita = $_POST['nombre_visita'];
    $fecha_visita = $_POST['fecha_visita'];
    $motivo_visita = $_POST['motivo_visita'];
    $codigo_reporte = $_POST['codigo_reporte'] ? $_POST['codigo_reporte'] : NULL;
    $codigo_inmueble = $_POST['codigo_inmueble'];

    // Validar los datos (opcional)
    if (empty($codigo_visita) || 
        empty($nombre_visita) || 
        empty($fecha_visita) || 
        empty($motivo_visita) ||
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
                ":codigo_visita" => $codigo_visita,
                ":nombre_visita" => $nombre_visita,
                ":fecha_visita"=> $fecha_visita,
                ":motivo_visita"=> $motivo_visita,
                ":codigo_reporte"=> $codigo_reporte,
                ":codigo_inmueble"=> $codigo_inmueble
            ];

            // obtener una consulta dinamica
            $query_key = "create_visita";
            $query = getQuery($query_key, $queries);

            $stm = $pdo->prepare($query);
            $stm->execute($data);
            
            echo "<script>
                alert('¡La solicitud de visita se creo con exito!');
                window.location.href = '../index.php';
            </script>";
            exit;
        } else {
            echo "<script>
                alert('¡El inmueble que desea visitar no existe!');
                window.location.href = '../index.php';
            </script>";
            exit;
        }
    }
} else {
    echo "Método no permitido.";
}
?>
