<?php
session_start();
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username']; 
    $contraseña = $_POST['password'];

    if (empty($usuario) || empty($contraseña)) {
        $_SESSION['error_message'] = "Por favor ingresa un usuario y contraseña.";
        header("Location: ../index.php");
        exit();
    }

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql); 
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) 
        {
            $usuario_db = $resultado->fetch_assoc();

            if ($contraseña === $usuario_db['contraseña']) {
                $_SESSION['usuario_id'] = $usuario_db['id'];
                $_SESSION['usuario'] = $usuario_db['usuario'];

                header("Location: ../Php/MenuPrincipal.php");
                exit();
            } 
            else 
            {
                $_SESSION['error_message'] = "Contraseña incorrecta.";
                header("Location: ../index.php");
                exit();
            }
        } 
        else 
        {
            $_SESSION['error_message'] = "El usuario no existe.";
            header("Location: ../index.php");
            exit();
        }
}
