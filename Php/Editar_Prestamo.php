<?php
include '../Config/info.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_prestamo = $_POST['id_prestamo'];
    $nombre_empleado = $_POST['nombre_empleado'];
    $numero_folio = $_POST['numero_folio'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $entregado = $_POST['entregado'];
    $descripcion_herramienta = $_POST['descripcion_herramienta'];
    $cantidad = $_POST['cantidad'];

    $sql = "UPDATE prestamos SET nombre_empleado = ?, numero_folio = ?, fecha_prestamo = ?, fecha_entrega = ?, entregado = ?, descripcion_herramienta = ?, cantidad = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre_empleado, $numero_folio, $fecha_prestamo, $fecha_entrega, $entregado, $descripcion_herramienta, $cantidad, $id_prestamo]);

    // Redirige de vuelta a la página principal o muestra un mensaje de éxito
    header("Location: MenuUsuario.php");
    exit();
}
