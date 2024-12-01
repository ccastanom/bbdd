<?php
$queries = include '../db/queries.php';
$pdo = include '../db/conexion.php';

function getQuery($key, $queries) {
    return $queries[$key] ?? null; // Devuelve la consulta o null si no existe
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $codigo_rol = $_POST['codigo_rol'];
    $descripcion_rol = $_POST['descripcion_rol'];

    // Validar los datos (opcional)
    if (empty($codigo_rol) || 
        empty($descripcion_rol)) {
        echo "Por favor, completa todos los campos.";
    } else {

        // validar si el usuario existe
        $query_key = "get_rol";
        $query = getQuery($query_key, $queries);

        $data = [
            ":codigo_rol" => $codigo_rol,
        ];

        $stm = $pdo->prepare($query);
        $stm->execute($data);

        $resultado = $stm->fetch(PDO::FETCH_ASSOC);
        
        if (empty($resultado) == false) {
            $data = [
                ":codigo_rol" => $codigo_rol,
                ":descripcion_rol" => $descripcion_rol
            ];

            // obtener una consulta dinamica
            $query_key = "update_rol";
            $query = getQuery($query_key, $queries);

            $stm = $pdo->prepare($query);
            $stm->execute($data);

            echo "<script>
                alert('¡El rol se edito con exito!');
                window.location.href = '../index.php'
            </script>";
            exit;
        } else {
            echo "<script>
                alert('¡El rol no existe!');
                window.location.href = '../index.php'
            </script>";
            exit;
        }
    }
} else {
    echo "Método no permitido.";
}
?>