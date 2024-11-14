<?php
session_start();  
require 'config.php';  

    if (isset($_SESSION['usuario'])) 
    {
        $usuario = $_SESSION['usuario'];
    }
    else 
    {
        $usuario = "Invitado";
    }

$server_name = gethostname();
$local_ip = gethostbyname(gethostname());
$connection_status = $conn ? "Conectado" : "Error al conectar";

