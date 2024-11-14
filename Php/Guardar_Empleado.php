<?php
// Incluir la configuración de la base de datos
include '../Config/info.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar si se ha enviado el nombre del empleado
    if (isset($_POST['nombre_empleado']) && !empty($_POST['nombre_empleado'])) {
        $nombre_empleado = $_POST['nombre_empleado'];

        // Preparar la consulta SQL para insertar el nombre del empleado
        $sql = "INSERT INTO empleados (nombre_empleado) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $nombre_empleado);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Si se guarda correctamente, redirigir o mostrar un mensaje de éxito
            header('Location: MenuUsuario.php?success=1');
        } else {
            // Si hay un error, mostrar el mensaje de error
            echo "Error al guardar el nombre del empleado: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "El nombre del empleado no puede estar vacío.";
    }
}
