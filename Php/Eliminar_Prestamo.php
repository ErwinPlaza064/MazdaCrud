<?php
include '../Config/info.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['folio'])) {
        $folio = $_POST['folio'];

        $sql = "DELETE FROM prestamos WHERE numero_folio = ?";
        
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param('s', $folio);
        
            if ($stmt->execute()) 
            {
                header("Location: MenuUsuario.php"); 
                exit();
            } 
            else 
            {

                echo "Error al eliminar el préstamo.";
            }

            $stmt->close();
        } 
        else 
        {
            echo "Error al preparar la consulta.";
        }
    }
}

