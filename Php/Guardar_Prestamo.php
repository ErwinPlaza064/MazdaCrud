<?php
include '../Config/info.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_empleado = $_POST['nombre_empleado'];
    $numero_folio = $_POST['numero_folio'];
    $fecha_prestamo = $_POST['fecha_prestamo'];
    $fecha_entrega = $_POST['fecha_entrega'];
    $entregado = $_POST['entregado'];
    $descripcion = $_POST['descripcion'];
    $cantidad = $_POST['cantidad'];

    if (empty($nombre_empleado) || empty($numero_folio) || empty($fecha_prestamo) || empty($fecha_entrega) || empty($cantidad)) {
        // Si algún campo obligatorio está vacío, mostramos el mensaje de error
        $error_message = "Por favor, complete todos los campos obligatorios.";
        // Redirigimos al formulario con el mensaje de error
        $_SESSION['error_message'] = $error_message;
        header("Location: MenuUsuario.php");
        exit(); // Aseguramos que el script se detenga
    }

    $sql = "INSERT INTO prestamos (nombre_empleado, numero_folio, fecha_prestamo, fecha_entrega, entregado, descripcion_herramienta, cantidad) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die('Error en la preparación de la consulta: ' . $conn->error);
    }

    // Asociamos los valores con los placeholders (tipos: s = string, i = integer)
    $stmt->bind_param("ssssssi", $nombre_empleado, $numero_folio, $fecha_prestamo, $fecha_entrega, $entregado, $descripcion, $cantidad);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Prestamo Registrado Correctamente.";
        header("Location: MenuUsuario.php");

    } else {
        echo "Error al guardar los datos: " . $conn->error;
    }

    $stmt->close();  // Cerramos el statement
}

