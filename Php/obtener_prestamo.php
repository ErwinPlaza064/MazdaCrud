<?php
include '../Config/info.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM prestamos WHERE id = ?");
    $stmt->bind_param("i", $id); // Asumiendo que el ID es un número entero
    $stmt->execute();
    $result = $stmt->get_result();
    $prestamo = $result->fetch_assoc(); // Usando fetch_assoc() para obtener el resultado

    if ($prestamo) 
    {
        echo json_encode($prestamo);
    } 
    else 
    {
        echo json_encode(['error' => 'Préstamo no encontrado']);
    }
}
else 
{
    echo json_encode(['error' => 'ID no proporcionado']);
}