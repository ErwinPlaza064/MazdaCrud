<?php
include '../Config/info.php';

if (isset($_GET['folio'])) {
    $folio = $_GET['folio'];

    // Consultar los datos del préstamo
    $sql = "SELECT * FROM prestamos WHERE numero_folio = ?";
    $stmt = $conn->prepare($sql);  // $conn es una instancia de MySQLi
    $stmt->bind_param('s', $folio);  // 's' significa que el parámetro es de tipo string
    $stmt->execute();
    $result = $stmt->get_result();  // Obtenemos el resultado
    $row = $result->fetch_assoc();  // Asociamos el resultado
    

    if ($row) {
        // Devolver los datos del préstamo en formato JSON
        echo json_encode([
            'success' => true,
            'nombre_empleado' => htmlspecialchars($row['nombre_empleado']),
            'numero_folio' => htmlspecialchars($row['numero_folio']),
            'fecha_prestamo' => htmlspecialchars($row['fecha_prestamo']),
            'fecha_entrega' => htmlspecialchars($row['fecha_entrega']),
            'descripcion_herramienta' => htmlspecialchars($row['descripcion_herramienta']),
            'cantidad' => htmlspecialchars($row['cantidad'])
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No folio provided.']);
}
?>
